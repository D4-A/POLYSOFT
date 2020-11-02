<?php

namespace App\Http\Controllers;

use App\Creneau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreneauxController extends Controller
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
        $creneaux = DB::table('creneaus')
                  ->join('users','users.id','creneaus.user_id')
                  ->select('users.name as user_name','creneaus.*')
                  ->get();
        return view('creneaux/index',[
            'creneaux' => $creneaux
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creneaux/create');
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
            'start_time' => 'required',
            'end_time' => 'required',
            'ouvert' => 'required'
         ]);
        $creneau= new Creneau();
        $creneau->name = $request->name;
        $creneau->user_id = Auth::id();
        $creneau->start_time = $request->start_time;
        $creneau->end_time = $request->end_time;
        $creneau->ouvert = $request->ouvert == 'true' ? 1 : 0;
        $creneau->save();
        return redirect('creneaux');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Creneau  $creneau
     * @return \Illuminate\Http\Response
     */
    public function show(Creneau $creneau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Creneau  $creneau
     * @return \Illuminate\Http\Response
     */
    public function edit(Creneau $creneau)
    {
        $creneau= Creneau::find($creneau->id);
        return view('creneaux/edit', [
            'creneau' => $creneau
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Creneau  $creneau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creneau $creneau)
    {
        $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'ouvert' => 'required'
         ]);
        
        $creneau->user_id = Auth::id();
        $creneau->name = $request->name;
        $creneau->start_time = $request->start_time;
        $creneau->end_time = $request->end_time;
        $creneau->ouvert = $request->ouvert == 'true' ? 1 : 0;
        $creneau->save();
        return redirect('creneaux');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Creneau  $creneau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creneau $creneau)
    {
        $creneau->delete();
        return redirect('creneaux');
    }
}
