<?php

namespace App\Http\Controllers;

use App\rendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('rendezvous/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rendezvous = new RendezVous();
        $rendezvous->user_id = Auth::id();
 
        $rendezvous->patient_id = $request->patient_id;
        $rendezvous->payement_id = $request->payement_id;
        $rendezvous->creneau_id = $request->creneau_id;
        $rendezvous->title = $request->title;
        $rendezvous->description = $request->description;
        $rendezvous->etat = $request->etat;
        $rendezvous->save();
  
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
        $rendezvous->user_id = Auth::id();
        $rendezvous->patient_id = $request->patient_id;
        $rendezvous->payement_id = $request->payement_id;
        $rendezvous->creneau_id = $request->creneau_id;
        $rendezvous->title = $request->title;
        $rendezvous->description = $request->description;
        $rendezvous->etat = $request->etat;
        $rendezvous->save();

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
