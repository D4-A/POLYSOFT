<?php

namespace App\Http\Controllers;

use App\Fonction;
use Illuminate\Http\Request;

class FonctionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $fonctions = Fonction::all();
        return view('fonctions/index',[            
            'fonctions'=> $fonctions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fonctions/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fonction= new Fonction();
        $fonction->name = $request->name;
        $fonction->diplome = $request->diplome;
        $fonction->save();
        return redirect('fonctions');

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
        $fonction= Fonction::find($id);
        return view('fonctions/edit', [
            'fonction' => $fonction
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fonction $fonction)
    {
        $fonction->name = $request->name;
        $fonction->diplome = $request->diplome;
        $fonction->save();
        return redirect('fonctions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fonction= Fonction::find($id);
        $fonction->delete();
        return redirect('fonctions');
    }
}
