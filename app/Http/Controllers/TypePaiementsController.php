<?php

namespace App\Http\Controllers;

use App\TypePaiement;
use Illuminate\Http\Request;

class TypePaiementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $typePaiements = TypePaiement::all();
        return view('typePaiements/index',[            
            'typePaiements'=> $typePaiements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typePaiements/create');
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
            'name' => 'required',
            'montant' => 'required'
        ]);
        $typePaiement= new TypePaiement();
        $typePaiement->name = $request->name;
        $typePaiement->montant = $request->montant;
        $typePaiement->save();
        return redirect('typePaiements');

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
        $typePaiement= TypePaiement::find($id);
        return view('typePaiements/edit', [
            'typePaiement' => $typePaiement
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypePaiement $typePaiement)
    {
        $request->validate([
            'name' => 'required',
            'montant' => 'required'
        ]);
        $typePaiement->name = $request->name;
        $typePaiement->montant = $request->montant;
        $typePaiement->save();
        return redirect('typePaiements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypePaiement $typePaiement)
    {
        $typePaiement->delete();
        return redirect('typePaiements');
    }
}
