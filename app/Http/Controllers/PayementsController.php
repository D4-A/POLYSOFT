<?php

namespace App\Http\Controllers;

use App\Payement;
use App\User;
use App\TypePayement;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payements = DB::table('payements')
                   ->join('users', 'users.id', '=', 'payements.user_id')
                   ->join('patients', 'patients.id', '=', 'payements.patient_id')
                   ->join('type_payements', 'type_payements.id', '=', 'payements.type_payement_id')->get();
        
        return view('payements/index', [
            'payements' => $payements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        $type_payements = TypePayement::all();
        return view('payements/create',[
            'type_payements' => $type_payements]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payement= new Payement();
        $payement->user_id = $request->user_id;
        $payement->patient_id = $request->patient_id;
        $payement->user_id = $request->user_id;
        $payement->type_payement_id = $request->type_payement_id;
        $payement->save();
        return redirect('payements');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payement  $payement
     * @return \Illuminate\Http\Response
     */
    public function show(Payement $payement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payement  $payement
     * @return \Illuminate\Http\Response
     */
    public function edit(Payement $payement)
    {
        $payement= Payement::find($payement->id);
        $type_payement = DB::table('type_payements')->where('id',$payement->type_payement_id)
                                                    ->first();
        $type_payements = TypePayement::all();
        return view('payements/edit', [
            'payement' => $payement,
            'type_payements' => $type_payements,
            'type_payement' => $type_payement
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payement  $payement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payement $payement)
    {
        $payement->user_id = $request->user_id;
        $payement->patient_id = $request->patient_id;
        $payement->type_payement_id = $request->type_payement_id;
        $payement->save();
        return redirect('payements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payement  $payement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payement = Payement::find($id)->first();
        $payement->delete();
        return redirect('payements');
    }
}