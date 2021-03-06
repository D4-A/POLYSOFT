<?php

namespace App\Http\Controllers;

use App\rendezVous;
use App\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Creneau;
use App\Paiement;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rendezVous = DB::table('rendez_vouses')
                    ->join('patients','patients.id','rendez_vouses.patient_id')
                    ->join('creneaus','creneaus.id','rendez_vouses.creneau_id')
                    ->join('users','users.id','creneaus.user_id')
                    ->select('patients.nom as pat_name','users.name as 
user_name','creneaus.id as creneau_id','rendez_vouses.*')
                    ->get();

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
        return view('rendezvous/create',[
            'users' => $users,
        ]);
    }
    public function actualiser($id)
    {
        $temp = $id;
        $id = substr($id,0,5);
        $week = substr($temp,-16,16);
        $end_week = self::advance(strtotime($week),$week);
        $medecin = DB::table('users')->where('id',$id)->first();
        $users = DB::table('users')
               ->join('fonctions','fonctions.id','users.fonction_id')
               ->select('fonctions.name as fonct_name','users.*')
               ->where('fonctions.name','LIKE','%oct%')
               ->get();
        $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi',
                 'Dimanche'];
        $heures = ['08:00-08:30','08:30-09:00','09:00-09:30','09:30-10:00',
                   '10:00-10:30','10:30-11:00','11:00-11:30','11:30-12:00',
                   '12:00-12:30','12:30-13:00','13:00-13:30','13:30-14:00',
                   '14:00-14:30','14:30-15:00','15:00-15:30','15:30-16:00',
                   '16:00-16:30','16:30-17:00'];
        $creneaux = \App\Creneau::where('user_id',$id)
                  ->where('ouvert',1)
                  ->whereBetween('end_time',
                                 [$week,$end_week])->get();
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
            'medecin' => $medecin,
            'week' => $week
        ]);
    }
    public function advance($full_time,$date_in_string)
    {
        $mois = date('m',$full_time);
        $num_day = date('d',$full_time);
        for($i = 0;$i<7;$i++){
            $num_day += 1;
            if($mois == 11 || $mois == 9 || $mois == 6 || $mois == 4
            )
            {
                if($num_day > 30){
                    $mois += 1;
                    $num_day = 1;
                }
                continue;
            }
            if($mois == 12 || $mois == 10 || $mois == 8 || $mois == 12
               || $mois == 5 || $mois == 3 || $mois == 1)
            {
                if($num_day > 31){
                    $mois += 1;
                    $num_day = 1;
                }
                continue;
            }
            if($mois == 2)
            {
                if($num_day > 29)
                {
                    $mois += 1;
                    $num_day = 1;
                }
                continue;
            }
        }
        if($mois < 10){
            $mois = '0' . $mois;
            $full_time = substr_replace($date_in_string,$mois,-11,2);
        }else{
            $full_time = substr_replace($date_in_string,$mois,-11,2);
        }
        
        if($num_day < 10){
            $num_day = '0' . $num_day;
            $full_time = substr_replace($full_time,$num_day,-8,2);
        }else{
            $full_time = substr_replace($full_time,$num_day,-8,2);
        }
        return $full_time;
    }
    public function refresh(Request $request)
    {
        $medecin = DB::table('users')->where('id',$request->medecin)->first();
        $week = $request->week;
        $end_week = self::advance(strtotime($week),$week);
        
        $users = DB::table('users')
               ->join('fonctions','fonctions.id','users.fonction_id')
               ->select('fonctions.name as fonct_name','users.*')
               ->where('fonctions.name','LIKE','%oct%')
               ->get();
        $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi',
                 'Dimanche'];
        $heures = ['08:00-08:30','08:30-09:00','09:00-09:30','09:30-10:00',
                   '10:00-10:30','10:30-11:00','11:00-11:30','11:30-12:00',
                   '12:00-12:30','12:30-13:00','13:00-13:30','13:30-14:00',
                   '14:00-14:30','14:30-15:00','15:00-15:30','15:30-16:00',
                   '16:00-16:30','16:30-17:00'];
        $creneaux = \App\Creneau::where('user_id',$request->medecin)
                  ->where('ouvert',1)
                  ->whereBetween('end_time',
                                 [$week,$end_week])->get();
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
            'medecin' => $medecin,
            'week' => $week
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
            'paiement_id' => 'required',
            'creneau_id' => 'required',
         ]);
        $ispaiementInConsultation = Consultation::where('paiement_id',$request->paiement_id)
                                  ->first();
        if($ispaiementInConsultation !== null){
            return back()->with('error','La facture a ete utilise');
        }
        $Creneau = \App\Creneau::find($request->creneau_id);
        $Creneau->ouvert = 0;
        $Creneau->save();

        $rendezvous = new RendezVous();

        $rendezvous->patient_id = Paiement::where('id',$request->paiement_id)->value('patient_id');
        $rendezvous->paiement_id = $request->paiement_id;
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
                    $message = 'Le paiement n\'existe pas';
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
    public function cons($id)
    {
        $rendezvous = RendezVous::find($id);
        $rendezvous_id = $rendezvous->id;
        $patient_id = $rendezvous->patient_id;
        $paiement_id = $rendezvous->paiement_id;
        $creneau_id = RendezVous::find($id)->value('creneau_id');
        return view('rendezvous/cons', [
            'patient_id' => $patient_id,
            'paiement_id' => $paiement_id,
            'rendezvous_id' => $rendezvous_id,
            'creneau_id' => $creneau_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rendezVoudd($paiement_id);s  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rendezVous $rendezvous)
    {
        $request->validate([
            'patient_id' => 'required',
            'paiement_id' => 'required',
            'creneau_id' => 'required',
            'description' => 'required',
            'etat' => 'required'
         ]);
        
        $rendezvous->patient_id = $request->patient_id;
        $rendezvous->paiement_id = $request->paiement_id;
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
                   $message = 'Le paiement n\'existe pas';
               $found_cren = preg_match('/cren/',$e->errorInfo[2]);
               if($found_cren === 1)
                   $message = 'Le creneau n\'existe pas';
                return back()->with('error',$message);
           case 1062:
               $found_pay = preg_match('/pay/',$e->errorInfo[2]);
               if($found_pay === 1)
                   $message = 'Le paiement deja utilise';
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
    public function destroy(rendezVous $rendezvous)
    {
        $rendezvous->delete();
        return redirect('rendezVous');
    }
}
