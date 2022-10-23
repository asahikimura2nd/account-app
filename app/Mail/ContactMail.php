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
    public $company;
    public $name;
    public $tel;
    public $email;
    public $birth_date;
    public $gender;
    public  $job;
    public $content;
    
    public function __construct($company ,$name ,$tel ,$email ,$birth_date ,$gender ,$job ,$content)
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
        return $this
        // ->from('revite@com')->attach('path/to/file')->cc('moreUser')
        ->markdown('contacts.mail');
    }
}
