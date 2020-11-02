<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailPatient extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alone,$data,$personel,$subject,$body)
    {
        $this->alone = $alone;
        $this->files = $data;
        $this->personel = $personel;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('emails.mail')
                      ->with('nom',$this->personel)
                      ->with('body', $this->body)
                      ->subject($this->subject);
        if($this->files !== null){
            if($this->alone === false){
                foreach($this->files as $filePath){
                    $email->attach(
                        storage_path('app/public/uploads/' . $filePath));
                }
            }
            else {
                foreach($this->files as $filePath){
                    $email->attachData($filePath, 'name.pdf',[
                        'mime' => 'application/pdf'
                    ]);
                }
            }
        }
        return $email;
    }
}
