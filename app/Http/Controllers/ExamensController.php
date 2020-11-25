<?php

namespace App\Http\Controllers;

use App\Examen;
use App\User;
use App\Consultation;
use App\rendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ExamensController extends Controller
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
        $examens = DB::table('examens')
                 ->join('users','users.id','examens.user_id')
		 ->join('paiements', 'paiements.id','examens.payment_id')
                 ->select('paiements.id as payment_id','users.name as user_name','examens.*')
                 ->get();
        return view('examens/index', [
            'examens' => $examens
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('examens/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('files');
        $cons_id = $request->get('consultation_id');
	$payment_id = $request->get('payment_id');
	$chech_if_pay_used_in_cons = Consultation::where('paiement_id',$request->payment_id)
                                  ->first();
	$chech_if_pay_used_in_rendzvous = rendezVous::where('paiement_id',$request->payment_id)
                                  ->first();
	
	if(($chech_if_pay_used_in_cons !== null) ||
	   ($chech_if_pay_used_in_rendzvous !== null)){
	   return back()->with('error', 'La facture a ete utilise');
	}	  

	$user_id = Auth::id();
        $nomExamen = $request->get('nom');
        $patient_id = DB::table('consultations')
                    ->where('id',$cons_id)->value('patient_id');
        $paths  = [];
        $fileNotUpload = [];
        foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            $filename = $patient_id .'/'. $cons_id .'/'. $name;
            $file_db = DB::table('examens')->where('consultation_id',$cons_id)->value('files');
            
            if(!Storage::disk('public')->exists('uploads/' . $filename)
               || !strpos($file_db,$filename))
                $paths[]  = $filename;
            else
                $fileNotUpload[] = $name;
        }

        if(count($paths) > 0){
            $pathjoined = join(",",$paths);

            try{
            DB::table('examens')->insert(
                array(
                    'id' => IdGenerator::generate
                    (['table' => 'examens',
                      'length' => 5, 'prefix' => 'EX']),
                    'user_id' => $user_id,
                    'consultation_id' => $cons_id,
		    'payment_id' => $payment_id,
                    'nom_examen' => $nomExamen,
                    'files' => $pathjoined
                ));
            }catch(\Exception $e){
                 switch($e->errorInfo[1]){
            case 1452:
                return back()->with('error','La consulation n\'existe pas');
	    case 1062:
	        return back()->with('error', 'La facture a ete utilise');
            default:
                return back()->with('error','Une erreur est survenu: '. $e->getMessage());
                 }
            }
            foreach($paths as $path){
                $file->storeAs('public/uploads', $path);
            }
        }
        if(count($fileNotUpload) === 0)
            $message = 'files upload successfully';
        elseif(count($fileNotUpload) === 1 and count($paths) === 0)
            $message = 'This file already exist in the store';
        else
            $message = 'success!! expect This files that already exist: '. join(" ",$fileNotUpload);
        return redirect('examens');
    }
    public function ajaxfiles(Request $request){

        $cons_id = $request->cons_id;
        
        $datas = DB::table('examens')->where('consultation_id',$cons_id)->get();
        $files = '';
        foreach($datas as $data){
            $files .= $data->files . ',';
         }
        $files = explode(',',$files);
        unset($files[count($files) - 1]);
        
        return response()->json($files);
    }

    public function edit(Examen $examen)
    {
        $examen = Examen::find($examen->id);

        return view('examens/edit',[
            'examen' => $examen
        ]);
    }

    public function destroy(Examen $examen)
    {
        $path_filename = DB::table('examens')
                         ->where('id',$examen->id)->value('files');
        $datas = explode(',',$path_filename);
        foreach($datas as $data){
            Storage::delete('public/uploads/' . $data);
        }
        $examen->delete();
        return redirect('examens');
    }
}
