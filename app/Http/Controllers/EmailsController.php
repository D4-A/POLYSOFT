<?php

namespace App\Http\Controllers;

use App\Email;
use User;
use Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\MailPatient;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = DB::table('users')
                ->join('emails', 'emails.user_id', 'users.id')
                ->get();
        return view('emails/index', [
            'emails' => $emails
        ]);
    }
    public function send(Request $request){
        $examen_id = $request->examen_id;
        $datas = DB::table('examens')->where('id',$examen_id)->get();

        // terrible hack 
        $cons_id = DB::table('examens')->where('id',$examen_id)->value('consultation_id');
        $patient_id = DB::table('consultations')->where('id',$cons_id)->value('patient_id');
        $email = DB::table('patients')->where('id',$patient_id)->value('email');

        $files = [];
        
        foreach($datas as $data){
             $files = explode(',',$data->files);
         }
        return view('emails/send', [
            'files' => $files,
            'examen_id' => $examen_id,
            'email' => $email
        ]);
    }
    public function senddeux(Request $request){

        $user_id = $request->get('user_id');
        $examen_id = $request->get('examen_id');
        $subject = $request->get('subject');
        $email = $request->get('to_email');
        $body = $request->get('body');
        $data = $request->get('filepath2');
        $filejoined = join(",",$data);
        Mail::to($email)->send(new MailPatient(false,$data,$user_id,$subject,$body));
        $email = new Email();
        $email->user_id = $request->get('user_id');
        $email->examen_id = $examen_id;
        $email->subject = $subject;
        $email->body = $body;
        $email->filename = $filejoined;
        $email->save();
        return redirect('emails');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emails/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = DB::table('users')
                  ->where('id',$request->get('user_id'))->value('name');
        $email = $request->get('to_email');
        $subject = $request->get('subject');
        $body = $request->get('body');
        
        Mail::to($email)->send(
            new MailPatient(true,null,$user,$subject,$body));
        $email = new Email();
        $email->user_id = $request->get('user_id');
        $email->subject = $subject;
        $email->body = $body;
        $email->save();
        return redirect('emails');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        //
    }
}