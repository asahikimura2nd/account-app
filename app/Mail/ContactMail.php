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
    
    public $attributes = null;
    public $temp = null;
    public $subject = null;
    public $gender = null;
    public $job = null;
    

        // setFormにお問合せの内容を設定して、メールで表示
        // setType 利用するbladeを指定
        
        // 管理者とユーザーに対してメールを送信
        // 管理者へ送る本文は「お問合せがありました」,ユーザーへはお問合せの内容
        // 管理者へ送る件名は「お問合せがありました」,ユーザーへの件名は「お問合せありがとうございます」
        // テキストメール
        public function setForm($attributes)
        {
            $this->attributes = $attributes;

            return $this;
        }

        public function setType($type){
            $this->temp = "contacts.{$type}";
            $this->gender = config('const.gender');
            $this->job = config('const.job'); 
            return $this;
        }

    /**
     * Build the message.
     *
     * @return $this
       */
    public function build()
    {
        // $this->gender = config('const.gender');
        // $this->job = config('const.job'); 

        // dd($this);
        return $this->text($this->temp, [$this->attributes,$this->gender,$this->job]);
    }
}
