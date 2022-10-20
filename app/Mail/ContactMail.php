<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company, $name, $tel, $email, $birth_date, $gender, $job, $content)
    {
        $this->company = $company;
        $this->name = $name;
        $this->tel = $tel;
        $this->email = $email;
        $this->birth_date = $birth_date;
        $this->gender = $gender;
        $this->job = $job;
        $this->content = $content;       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
        ->subject('タイトル')
        ->view('contacts.send')
        ->with( [
            'company' => $this->company,
            'name' => $this->name,
            'tel' => $this->tel,
            'email' => $this->email,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'job' => $this->job,
            'content' => $this->content       
        ] );
        // return $this->view('send')
        // ->attachData($this->pdf,'send.pdf',[
        //     'mine' => 'application/pdf'
        // ]);

    }
}
