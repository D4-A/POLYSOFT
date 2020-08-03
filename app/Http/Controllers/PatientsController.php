<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $patients = Patient::all();
        return view('patients/index',[            
            'patients'=> $patients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients/create');
    }

    /**
     * Store a newly created resource in storans_naiss.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'genre' => 'required',
            'ans_naiss' => 'required',
            'profession' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'cni' => 'required',
            'adresse' => 'required'
         ]);
          
        $patient= new Patient();
        $patient->nom = $request->nom;
        $patient->prenom = $request->prenom;
        $patient->genre = $request->genre;
        $patient->ans_naiss = $request->ans_naiss;
        $patient->profession = $request->profession;
        $patient->adresse = $request->adresse;
        $patient->tel = $request->tel;
        $patient->email = $request->email;
        $patient->cni = $request->cni;
        $patient->save();
        return redirect('patients');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient= Patient::find($id);
        return view('patients/edit', [
            'patient' => $patient
        ]);
    }

    /**
     * Update the specified resource in storans_naiss.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'genre' => 'required',
            'ans_naiss' => 'required',
            'profession' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'cni' => 'required',
            'adresse' => 'required'
         ]);
          
        $patient->nom = $request->nom;
        $patient->prenom = $request->prenom;
        $patient->genre = $request->genre;
        $patient->ans_naiss = $request->ans_naiss;
        $patient->profession = $request->profession;
        $patient->adresse = $request->adresse;
        $patient->tel = $request->tel;
        $patient->email = $request->email;
        $patient->cni = $request->cni;
        $patient->save();
        return redirect('patients');
    }

    /**
     * Remove the specified resource from storans_naiss.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient= Patient::find($id);
        $patient->delete();
        return redirect('patients');
    }
}
