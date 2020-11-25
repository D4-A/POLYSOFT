<?php

namespace App\Http\Controllers;

use App\Paiement;
use App\User;
use App\TypePaiement;
use App\Patient;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaiementsController extends Controller
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
        $paiements = DB::table('paiements')
                   ->join('users','users.id','paiements.user_id')
                   ->join('patients','patients.id','paiements.patient_id')
                   ->join('type_paiements','type_paiements.id','paiements.type_paiement_id')
                   ->select('type_paiements.*','users.name as user_name','patients.*','paiements.*')
                   ->get();
        return view('paiements/index', [
            'paiements' => $paiements,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        $type_paiements = TypePaiement::all();
        return view('paiements/create',[
            'type_paiements' => $type_paiements]);
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
            'type_paiement_id' => 'required'
         ]);
        $patient_exist = Patient::find($request->patient_id);
        if($patient_exist == null){
           return back()->with('error', 'Le Patient n\'existe pas');
        }
        $paiement= new Paiement();
        $paiement->user_id = Auth::id();
        $paiement->patient_id = $request->patient_id;
        $paiement->type_paiement_id = $request->type_paiement_id;
        $paiement->save();
        return redirect('paiements');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function edit(Paiement $paiement)
    {
        $type_paiements = TypePaiement::all();
        return view('paiements/edit', [
            'paiement' => $paiement,
            'type_paiements' => $type_paiements
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paiement $paiement)
    {
        $request->validate([
            'patient_id' => 'required',
            'type_paiement_id' => 'required'
         ]);
        $paiement->user_id = Auth::id();
        $paiement->patient_id = $request->patient_id;
        $paiement->type_paiement_id = $request->type_paiement_id;
        $paiement->save();
        return redirect('paiements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paiement $paiement)
    {
        $paiement->delete();
        return redirect('paiements');
    }
}
