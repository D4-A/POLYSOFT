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
        $user_id = Auth::id();
        $creneaux = DB::table('creneaus')
                  ->join('users','users.id','creneaus.user_id')
                  ->select('users.name as user_name','creneaus.*')
                  ->where('users.id',$user_id)
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
    public function transform_time($minute,$heure,$full_time){
        if($minute <= 15){
            $full_time = substr_replace($full_time,'00',-2,2);
        }else if($minute > 15 && $minute <= 45){
            $full_time = substr_replace($full_time,'30',-2,2);
        } else if($minute > 45){
            $full_time = substr_replace($full_time,'00',-2,2);
            $full_time = substr_replace($full_time,(string)$heure + 1,-5,2);
        }
        return $full_time;
    }
    
    public function transform_end_time($full_time){
            $start_h = date('H',strtotime($full_time)); 
            $start_i = date('i',strtotime($full_time));
            
            if($start_i == 00){
                $full_time = substr_replace($full_time,'30',-2,2);
            } else if($start_i == 30){
                $full_time = substr_replace($full_time,'00',-2,2);
                $full_time = substr_replace($full_time,(string)$start_h + 1,-5,2);
            }else{
                dd('lolo');
            }
        return $full_time;
    }
    public function get_inc($start_time,$end_time)
    {
        $i = 0;
        $tmp = $start_time;
        while($tmp != $end_time)
        {
            $i += 1;
            $tmp = self::transform_end_time($tmp);
        }
        return $i;
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'ouvert' => 'required'
         ]);
        $start_h = date('H',strtotime($request->start_time));
        $start_e = date('H',strtotime($request->end_time));

        $start_i = date('i',strtotime($request->start_time));
        $start_ie = date('i',strtotime($request->end_time));

        // Round/ceilling up time 
        $request->start_time = self::transform_time($start_i,$start_h,
                                                    $request->start_time);
        $request->end_time = self::transform_time($start_ie,$start_e,
                                                    $request->end_time);
        //sad to copy this aigain
        $start_h = date('H',strtotime($request->start_time));
        $start_e = date('H',strtotime($request->end_time));
        
        $start_i = date('i',strtotime($request->start_time));
        $start_ie = date('i',strtotime($request->end_time));

        $start_y = date('y',strtotime($request->start_time));
        $start_ye = date('y',strtotime($request->end_time));

        $count = self::get_inc($request->start_time,$request->end_time);
        //dd($count);
        if($count > 1 && $start_ye >= $start_y){
            
            $i = $count;
            
            $temp = null;
            $creneau= new Creneau();
            $creneau->name = $request->name;
            $creneau->user_id = Auth::id();
            $creneau->start_time = $request->start_time;
            $temp = self::transform_end_time($request->start_time);
            $creneau->end_time = $temp;
            $creneau->ouvert = $request->ouvert == 'true' ? 1 : 0;
            $creneau->save();
            
            do
            {
                $creneau= new Creneau();
                $creneau->name = $request->name;
                $creneau->user_id = Auth::id();
                $creneau->start_time = $temp;
                $temp = self::transform_end_time($creneau->start_time);
                $creneau->end_time = $temp;
                $creneau->ouvert = $request->ouvert == 'true' ? 1 : 0;
                $creneau->save();
                $i -= 1;
                $first_pass = false;
            }while($i > 1);
            
        }else if($count == 1 && $start_ie != $start_i && $start_ye >= $start_y)
        {
            $creneau= new Creneau();
            $creneau->name = $request->name;
            $creneau->user_id = Auth::id();
            $creneau->start_time = $request->start_time;
            $creneau->end_time = $request->end_time;
            $creneau->ouvert = $request->ouvert == 'true' ? 1 : 0;
            $creneau->save();
        }else{
            return back()->with("error","L'interval du temps n'est pas valide");
        }
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
