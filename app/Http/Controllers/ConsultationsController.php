<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\User;
use App\Patient;
use App\Payement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                   ->join('users', 'users.id', 'consultations.user_id')
                   ->join('patients', 'patients.id', 'consultations.patient_id')
                   ->join('payements', 'payements.id', 'consultations.payement_id')
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
        $consultation= new Consultation();
        $consultation->user_id = $request->user_id;
        $consultation->patient_id = $request->patient_id;
        $consultation->payement_id = $request->payement_id;
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
        $examen = null;

        return view('consultations/show',[
            'consultation' => $consultation,
            'patient' => $patient,
            'examen' => $examen
        ]);
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
