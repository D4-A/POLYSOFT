<?php

namespace App\Http\Controllers;

use App\Examen;
use App\User;
use App\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $examens = DB::table('examens')->get();
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
            DB::table('examens')->insert(
                array(
                    'user_id' => $user_id,
                    'consultation_id' => $cons_id,
                    'nom_examen' => $nomExamen,
                    'files' => $pathjoined
                ));
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Examens  $examens
     * @return \Illuminate\Http\Response
     */
    public function show(Examen $examen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Examens  $examens
     * @return \Illuminate\Http\Response
     */
    public function edit(Examen $examen)
    {
        $examen = Examen::find($examen->id);

        return view('examens/edit',[
            'examen' => $examen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Examens  $examens
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examen $examen)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Examens  $examens
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examen = Examen::find($id);
        $path_filename = DB::table('examens')->where('id',$id)->value('files');
        $datas = explode(',',$path_filename);
        foreach($datas as $data){
            Storage::delete('public/uploads/' . $data);
        }
        $examen->delete();
        return redirect('examens');
    }
}
