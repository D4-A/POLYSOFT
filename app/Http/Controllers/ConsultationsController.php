<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\User;
use App\Patient;
use App\Examen;
use App\Payement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $consultations = DB::table('consultations')->get();
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
        $consultation= new Consultation();
        $consultation->user_id = $request->user_id;
        $consultation->patient_id = $request->patient_id;
        $consultation->payement_id = $request->payement_id;
        $consultation->motif = $request->motif;
        $consultation->antecedent = $request->antecedent;
        $consultation->historique = $request->historique;
        $consultation->examen_physique = $request->examen_physique;
        $consultation->hypothese_dia = $request->hypothese_dia;
        $consultation->examen_compl = $request->examen_compl;
        $consultation->traitement = $request->traitement;
        $consultation->save();
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
        $consultation->user_id = $request->user_id;
        $consultation->patient_id = $request->patient_id;
        $consultation->payement_id = $request->payement_id;
        $consultation->motif = $request->motif;
        $consultation->antecedent = $request->antecedent;
        $consultation->historique = $request->historique;
        $consultation->examen_physique = $request->examen_physique;
        $consultation->hypothese_dia = $request->hypothese_dia;
        $consultation->examen_compl = $request->examen_compl;
        $consultation->traitement = $request->traitement;
        $consultation->save();
        return redirect('consultations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultation = Consultation::find($id)->first();
        $consultation->delete();
        return redirect('consultations');
    }
}
