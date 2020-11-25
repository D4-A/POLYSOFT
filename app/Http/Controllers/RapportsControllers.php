<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Consultation;
use Illuminate\Support\Facades\DB;
use App\Paiement;

class RapportsControllers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
    }
    public function create(Request $request)
    {
        return view('rapports/create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'acteur' => 'required',
            'operation' => 'required',
         ]);

        $acteur = $request->acteur;
        $op = $request->operation;
        $grp = $request->grp;
        $start = $request->start_time;
        $end = $request->end_time;
        switch($acteur)
        {
        case 'patient':
            if($grp == null){
                if ($start == null && $end == null){
                    $patients = Patient::all();
                    return view('patients/index',[            
                        'patients'=> $patients
                    ]);
                }else if($start == null && $end != null){
                    $patients = Patient::whereDate('created_at','<=',$end)->get();
                    return view('patients/index',[            
                        'patients'=> $patients
                        ]);
                }else if($start != null && $end == null){
                    $patients = Patient::whereDate('created_at','>=',$start)->get();
                    return view('patients/index',[            
                        'patients'=> $patients
                        ]);
                }else if($start != null && $end != null){
                    $patients = Patient::whereBetween('created_at',[$start,$end])->get();
                    return view('patients/index',[            
                        'patients'=> $patients
                    ]);
                }
            }else{
                if ($start == null && $end == null){
                    $patients = Patient::where('id',$grp)->get();
                    return view('patients/index',[            
                        'patients'=> $patients
                    ]);
                    
                }else if($start == null && $end != null){
                    $patients = Patient::where('id',$grp)
                              ->whereDate('created_at','<=',$end)->get();
                    return view('patients/index',[            
                        'patients'=> $patients
                    ]);
                }else if($start != null && $end == null){
                    $patients = Patient::where('id',$grp)
                              ->whereDate('created_at','>=',$start)->get();
                    return view('patients/index',[            
                        'patients'=> $patients
                    ]);
                }
            }
            
        case 'medecin':
            if($grp == null){
                if ($start == null && $end == null){
                    $consultations = DB::table('consultations')
                   ->join('users', 'users.id','consultations.user_id')
                   ->join('patients', 'patients.id', 'consultations.patient_id')
                   ->join('paiements', 'paiements.id', 'consultations.paiement_id')
                   ->select('users.name as user_name','patients.nom as patient_name' ,
                   'patients.prenom as patient_prenom','paiements.id as pay_id','consultations.*')
                   ->get();
                    return view('consultations/index',[            
                        'consultations'=> $consultations
                    ]);
                }else if($start == null && $end != null){
                    $consultations = DB::table('consultations')
                   ->join('users', 'users.id','consultations.user_id')
                   ->join('patients', 'patients.id', 'consultations.patient_id')
                   ->join('paiements', 'paiements.id', 'consultations.paiement_id')
                   ->select('users.name as user_name','patients.nom as patient_name' ,
                   'patients.prenom as patient_prenom','paiements.id as pay_id','consultations.*')
                   
                   ->whereDate('created_at','<=',$end)->get();
                    return view('consultations/index',[            
                        'consultations'=> $consultations
                    ]);
                }else if($start != null && $end == null){
                    $consultations = DB::table('consultations')
                   ->join('users', 'users.id','consultations.user_id')
                   ->join('patients', 'patients.id', 'consultations.patient_id')
                   ->join('paiements', 'paiements.id', 'consultations.paiement_id')
                   ->select('users.name as user_name','patients.nom as patient_name' ,
                   'patients.prenom as patient_prenom','paiements.id as pay_id','consultations.*')
                   
                   ->whereDate('created_at','>=',$start)->get();
                    return view('consultations/index',[            
                        'consultations'=> $consultations
                    ]);
                }else if($start != null && $end != null){
$consultations = DB::table('consultations')
                   ->join('users', 'users.id','consultations.user_id')
                   ->join('patients', 'patients.id', 'consultations.patient_id')
                   ->join('paiements', 'paiements.id', 'consultations.paiement_id')
                   ->select('users.name as user_name','patients.nom as patient_name' ,
                   'patients.prenom as patient_prenom','paiements.id as pay_id','consultations.*')
                   ->whereBetween('created_at',[$start,$end])->get();
                    return view('consultations/index',[            
                        'consultations'=> $consultations
                    ]);
                }
            }else{
                if ($start == null && $end == null){
                    $consultations = DB::table('consultations')
                   ->join('users', 'users.id','consultations.user_id')
                   ->join('patients', 'patients.id', 'consultations.patient_id')
                   ->join('paiements', 'paiements.id', 'consultations.paiement_id')
                   ->select('users.name as user_name','patients.nom as patient_name' ,
                   'patients.prenom as patient_prenom','paiements.id as pay_id','consultations.*')
                   
                   ->where('consultations.user_id',$grp)->get();
                    return view('consultations/index',[            
                        'consultations'=> $consultations
                    ]);
                    
                }else if($start == null && $end != null){
                    $consultations = DB::table('consultations')
                   ->join('users', 'users.id','consultations.user_id')
                   ->join('patients', 'patients.id', 'consultations.patient_id')
                   ->join('paiements', 'paiements.id', 'consultations.paiement_id')
                   ->select('users.name as user_name','patients.nom as patient_name' ,
                   'patients.prenom as patient_prenom','paiements.id as pay_id','consultations.*')
                   ->where('consultations.user_id',$grp)
                   ->whereDate('created_at','<=',$end)->get();
                    return view('consultations/index',[            
                        'consultations'=> $consultations
                        ]);
                }else if($start != null && $end == null){
                    $consultations = DB::table('consultations')
                   ->join('users', 'users.id','consultations.user_id')
                   ->join('patients', 'patients.id', 'consultations.patient_id')
                   ->join('paiements', 'paiements.id', 'consultations.paiement_id')
                   ->select('users.name as user_name','patients.nom as patient_name' ,
                   'patients.prenom as patient_prenom','paiements.id as pay_id','consultations.*')
                   ->where('consultations.user_id',$grp)
                   ->whereDate('created_at','>=',$start)->get();
                    return view('consultations/index',[            
                        'consultations'=> $consultations
                    ]);
                }
            }
        case 'caissier':
            if($grp == null){
                    if ($start == null && $end == null){
                        $paiements = DB::table('paiements')
                                   ->join('users','users.id','paiements.user_id')
                                   ->join('patients','patients.id','paiements.patient_id')
                                   ->join('type_paiements','type_paiements.id','paiements.type_paiement_id')
                                   ->select('type_paiements.*','users.name as user_name','patients.*','paiements.*')
                                   ->get();
                        return view('paiements/index',[            
                            'paiements'=> $paiements
                        ]);
                    }else if($start == null && $end != null){
                        $paiements = DB::table('paiements')
                                   ->join('users','users.id','paiements.user_id')
                                   ->join('patients','patients.id','paiements.patient_id')
                                   ->join('type_paiements','type_paiements.id','paiements.type_paiement_id')
                                   ->select('type_paiements.*','users.name as user_name','patients.*','paiements.*')
                                   
                                   ->whereDate('created_at','<=',$end)->get();
                        return view('paiements/index',[            
                            'paiements'=> $paiements
                        ]);
                    }else if($start != null && $end == null){
                        $paiements = DB::table('paiements')
                                   ->join('users','users.id','paiements.user_id')
                                   ->join('patients','patients.id','paiements.patient_id')
                                   ->join('type_paiements','type_paiements.id','paiements.type_paiement_id')
                                   ->select('type_paiements.*','users.name as user_name','patients.*','paiements.*')
                                   ->whereDate('created_at','>=',$start)->get();
                        return view('paiements/index',[            
                            'paiements'=> $paiements
                        ]);
                    }else if($start != null && $end != null){
                        $paiements = DB::table('paiements')
                                   ->join('users','users.id','paiements.user_id')
                                   ->join('patients','patients.id','paiements.patient_id')
                                   ->join('type_paiements','type_paiements.id','paiements.type_paiement_id')
                                   ->select('type_paiements.*','users.name as user_name','patients.*','paiements.*')
                                   ->whereBetween('created_at',[$start,$end])->get();
                        return view('paiements/index',[            
                            'paiements'=> $paiements
                        ]);
                    }
                }else{
                    if ($start == null && $end == null){
                        $paiements = DB::table('paiements')
                   ->join('users','users.id','paiements.user_id')
                   ->join('patients','patients.id','paiements.patient_id')
                   ->join('type_paiements','type_paiements.id','paiements.type_paiement_id')
                   ->select('type_paiements.*','users.name as user_name','patients.*','paiements.*')
                   ->where('user_id',$grp)->get();
                        return view('paiements/index',[            
                            'paiements'=> $paiements
                        ]);
        
                    }else if($start == null && $end != null){
                        $paiements = DB::table('paiements')
                   ->join('users','users.id','paiements.user_id')
                   ->join('patients','patients.id','paiements.patient_id')
                   ->join('type_paiements','type_paiements.id','paiements.type_paiement_id')
                   ->select('type_paiements.*','users.name as user_name','patients.*','paiements.*')
                   ->where('user_id',$grp)
                   ->whereDate('created_at','<=',$end)->get();
                        return view('paiements/index',[            
                            'paiements'=> $paiements
                        ]);
                    }else if($start != null && $end == null){
                        $paiements = DB::table('paiements')
                   ->join('users','users.id','paiements.user_id')
                   ->join('patients','patients.id','paiements.patient_id')
                   ->join('type_paiements','type_paiements.id','paiements.type_paiement_id')
                   ->select('type_paiements.*','users.name as user_name','patients.*','paiements.*')
                   ->where('user_id',$grp)
                   ->whereDate('created_at','>=',$start)->get();
                        return view('paiements/index',[            
                            'paiements'=> $paiements
                        ]);
                    }
                }
        }
    }
}
