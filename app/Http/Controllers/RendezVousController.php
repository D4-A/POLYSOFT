<?php

namespace App\Http\Controllers;

use App\rendezVous;
use App\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rendezVous = RendezVous::all();
        return view('rendezvous/index',[
            'rendezVous' => $rendezVous
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')
               ->join('fonctions','fonctions.id','users.fonction_id')
               ->select('fonctions.name as fonct_name','users.*')
               ->where('fonctions.name','LIKE','%oct%')
               ->get();
        $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi',
                 'Dimanche'];
        $heures = ['08:00-08:30','08:30-09:00','09:00-09:30','09:30-10:00',
                   '10:00-10:30','10:30-11:00','11:00-11:30','11:30-12:00', '14:00-14:30',
                   '14:30-15:00','15:00-15:30','15:30-16:00','16:00-16:30',
                   '16:30-17:00'];
        return view('rendezvous/create',[
            'users' => $users,
            'days' => $days,
            'heures' => $heures
        ]);
    }
    public function refresh($id)
    {
        if($id === 0)
            return back();
        $medecin = DB::table('users')->where('id',$id)->first();
        $users = DB::table('users')
               ->join('fonctions','fonctions.id','users.fonction_id')
               ->select('fonctions.name as fonct_name','users.*')
               ->where('fonctions.name','LIKE','%oct%')
               ->get();
        $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi',
                 'Dimanche'];
        $heures = ['08:00-08:30','08:30-09:00','09:00-09:30','09:30-10:00',
                   '10:00-10:30','10:30-11:00','11:00-11:30','11:30-12:00', '14:00-14:30',
                   '14:30-15:00','15:00-15:30','15:30-16:00','16:00-16:30',
                   '16:30-17:00'];
        $creneaux = DB::table('creneaus')->where('user_id',$id)
                                         ->where('ouvert',1)
                                         ->get();

        $interval = [];
        if($creneaux !== null){
            foreach($creneaux as $creneau){
                $debut = $creneau->start_time;
                $day = date('D', strtotime(explode(' ',$debut)[0]));
                $fin = $creneau->end_time;
                $debut_fin = substr(explode(' ',$debut)[1],0,5) .'-'. substr(explode(' ',$fin)[1],0,5);
                $interval += [($debut_fin . '-' . $day) => $creneau->id];
            }
        }
        return view('rendezvous/refresh',[
            'days' => $days,
            'heures' => $heures,
            'interval' => $interval,
            'users' => $users,
            'medecin' => $medecin
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'payement_id' => 'required',
            'creneau_id' => 'required',
         ]);
        $ispayementInConsultation = Consultation::where('payement_id',$request->payement_id)
                                  ->first();
        if($ispayementInConsultation !== null){
            return back()->with('error','La facture a ete utilise');
        }
        $creneau = \App\Creneau::find($request->creneau_id)->first();
        $creneau->ouvert = 0;
        $creneau->save();

        $rendezvous = new RendezVous();

        $rendezvous->user_id = Auth::id();
        $rendezvous->patient_id = $request->patient_id;
        $rendezvous->payement_id = $request->payement_id;
        $rendezvous->creneau_id = $request->creneau_id;
        $rendezvous->description = $request->description;
        $rendezvous->etat = 'pending';

        try{
            $rendezvous->save();
        }catch(\Exception $e){
            switch($e->errorInfo[1]){
            case 1452:
                $found_patient = preg_match('/patient/',$e->errorInfo[2]);
                if($found_patient === 1)
                    $message = 'Le patient n\'existe pas';
                $found_pay = preg_match('/pay/',$e->errorInfo[2]);
                if($found_pay === 1)
                    $message = 'Le payement n\'existe pas';
                $found_cren = preg_match('/cren/',$e->errorInfo[2]);
                if($found_cren === 1)
                    $message = 'Le creneau n\'existe pas';
                return back()->with('error',$message);
            case 1062:
                return back()->with('error','La facture a ete utilise');
            default:
                return back()->with('error',$e->getMessage());
            }
        }
  
        return redirect('rendezVous');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function show(rendezVous $rendezVous)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rendezvous = RendezVous::find($id);
        return view('rendezvous/edit', [
            'rendezvous' => $rendezvous
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rendezVous $rendezvous)
    {
        $request->validate([
            'patient_id' => 'required',
            'payement_id' => 'required',
            'creneau_id' => 'required',
            'description' => 'required',
            'etat' => 'required'
         ]);
        
        $rendezvous->user_id = Auth::id();
        $rendezvous->patient_id = $request->patient_id;
        $rendezvous->payement_id = $request->payement_id;
        $rendezvous->creneau_id = $request->creneau_id;
        $rendezvous->description = $request->description;
        $rendezvous->etat = $request->etat;
       try{
            $rendezvous->save();
       }catch(\Exception $e){
           switch($e->errorInfo[1]){
           case 1452:
               $found_patient = preg_match('/patient/',$e->errorInfo[2]);
               if($found_patient === 1)
                   $message = 'Le patient n\'existe pas';
               $found_pay = preg_match('/pay/',$e->errorInfo[2]);
               if($found_pay === 1)
                   $message = 'Le payement n\'existe pas';
               $found_cren = preg_match('/cren/',$e->errorInfo[2]);
               if($found_cren === 1)
                   $message = 'Le creneau n\'existe pas';
                return back()->with('error',$message);
           case 1062:
               $found_pay = preg_match('/pay/',$e->errorInfo[2]);
               if($found_pay === 1)
                   $message = 'Le payement deja utilise';
               $found_cren = preg_match('/cren/',$e->errorInfo[2]);
               if($found_cren === 1)
                   $message = 'Le creneau deja pris';
               return back()->with('error',$message);
           default:
               return back()->with('error','Une erreur est survenu');
            }
       }

        return redirect('rendezVous');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rendezvous = RendezVous::find($id);
        $rendezvous->delete();
        return redirect('rendezVous');
    }
}
