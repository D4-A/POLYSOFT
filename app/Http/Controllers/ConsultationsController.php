<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\User;
use App\Patient;
use App\Examen;
use App\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ConsultationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultations = DB::table('consultations')
                   ->join('users', 'users.id','consultations.user_id')
                   ->join('patients', 'patients.id', 'consultations.patient_id')
                   ->join('paiements', 'paiements.id', 'consultations.paiement_id')
                   ->select('users.name as user_name','patients.nom as patient_name' ,
                   'patients.prenom as patient_prenom','paiements.id as pay_id','consultations.*')
                   ->get();
        return view('consultations/index', [
            'consultations' => $consultations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('consultations/create');
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
            'paiement_id' => 'required',
            'historique' => 'required',
            'examen_physique' => 'required',
            'hypothese_dia' => 'required',
            'examen_compl' => 'required',
            'traitement' => 'required'
         ]);
        if($request->rendezvous_id && $request->creneau_id){
            $rendezvous = \App\rendezVous::find($request->rendezvous_id);
            $rendezvous->etat = 'closed';
            $rendezvous->save();
        }
        $consultation= new Consultation();
        $consultation->user_id = Auth::id();
        $consultation->patient_id = $request->patient_id;
        $consultation->paiement_id = $request->paiement_id;
        $consultation->motif = $request->motif;
        $consultation->antecedent = $request->antecedent;
        $consultation->historique = $request->historique;
        $consultation->examen_physique = $request->examen_physique;
        $consultation->hypothese_dia = $request->hypothese_dia;
        $consultation->examen_compl = $request->examen_compl;
        $consultation->traitement = $request->traitement;
        try{
        $consultation->save();
        }catch(\Exception $e){
            switch($e->errorInfo[1]){
            case 1452:
                return back()->with('error','La facture n\'existe pas');
            case 1062:
                return back()->with('error','La facture a ete utilise');
            default:
                return back()->with('error','Une erreur est survenu');
            }
        }
        return redirect('consultations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        $patient = Patient::find($consultation->patient_id)->get();
        $examen = DB::table('examens')->where('consultation_id',$consultation->id)->get();

        $files = '';
        foreach($examen as $ex){
            $files .= $ex->files . ',';
        }
        $files = explode(',',$files);
        unset($files[count($files) - 1]);

        if(count($files) == 0)
            $files = null;
        return view('consultations/show',[
            'consultation' => $consultation,
            'patient' => $patient,
            'files' => $files
        ]);
    }
    public function download($patient,$consultation,$filename){
        $file = 'public/uploads/' . $patient . '/' . $consultation .'/'. $filename;
        return Storage::download($file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        $consultation= Consultation::find($consultation->id);

        return view('consultations/edit', [
            'consultation' => $consultation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
        $request->validate([
            'patient_id' => 'required',
            'paiement_id' => 'required',
            'historique' => 'required',
            'examen_physique' => 'required',
            'hypothese_dia' => 'required',
            'examen_compl' => 'required',
            'traitement' => 'required'
         ]);

        $consultation->user_id = Auth::id();
        $consultation->patient_id = $request->patient_id;
        $consultation->paiement_id = $request->paiement_id;
        $consultation->motif = $request->motif;
        $consultation->antecedent = $request->antecedent;
        $consultation->historique = $request->historique;
        $consultation->examen_physique = $request->examen_physique;
        $consultation->hypothese_dia = $request->hypothese_dia;
        $consultation->examen_compl = $request->examen_compl;
        $consultation->traitement = $request->traitement;
        try{
            $consultation->save();
        }catch(\Exception $e){
            switch($e->errorInfo[1]){
            case 1452:
                return back()->with('error','La facture n\'existe pas');
            case 1062:
                return back()->with('error','La facture a ete utilise');
            default:
                return back()->with('error','Une erreur est survenu');
            }
        }
        return redirect('consultations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        return redirect('consultations');
    }
}
