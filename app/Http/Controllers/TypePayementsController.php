<?php

namespace App\Http\Controllers;

use App\TypePayement;
use Illuminate\Http\Request;

class TypePayementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $typePayements = TypePayement::all();
        return view('typePayements/index',[            
            'typePayements'=> $typePayements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typePayements/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typePayement= new TypePayement();
        $typePayement->name = $request->name;
        $typePayement->montant = $request->montant;
        $typePayement->save();
        return redirect('typePayements');

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
        $typePayement= TypePayement::find($id);
        return view('typePayements/edit', [
            'typePayement' => $typePayement
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypePayement $typePayement)
    {
        $typePayement->name = $request->name;
        $typePayement->montant = $request->montant;
        $typePayement->save();
        return redirect('typePayements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typePayement= TypePayement::find($id);
        $typePayement->delete();
        return redirect('typePayements');
    }
}
