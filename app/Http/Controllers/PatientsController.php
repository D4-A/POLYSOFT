<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient= new Patient();
        $patient->nom = $request->nom;
        $patient->prenom = $request->prenom;
        $patient->genre = $request->genre;
        $patient->age = $request->age;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $patient->nom = $request->nom;
        $patient->prenom = $request->prenom;
        $patient->genre = $request->genre;
        $patient->age = $request->age;
        $patient->profession = $request->profession;
        $patient->adresse = $request->adresse;
        $patient->tel = $request->tel;
        $patient->email = $request->email;
        $patient->cni = $request->cni;
        $patient->save();
        return redirect('patients');
    }

    /**
     * Remove the specified resource from storage.
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
