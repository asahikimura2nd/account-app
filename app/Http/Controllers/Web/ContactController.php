<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\ConfirmRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Attribute;

class ContactController extends Controller
{
     //お問い合わせフォーム
    public function form()
    {
        $jobArray = config('const.job');
        return view('contacts.form',compact('jobArray'));
    }

    //確認ページ
    public function confirm(ConfirmRequest $request)
    {
        $attributes = $request->all();
        $contact = new Contact;
        $gender = config('const.gender');
        $job = config('const.job');
        $contact->fill($attributes);
        return view('contacts.confirm',compact('contact','gender','job'));
    }

    //送信ページ
    public function send(ConfirmRequest $request)
    {
        $attributes = $request->all();
        $contact = new Contact;
        $contact->fill($attributes)->save();
        // $request->session()->regenerateToken();
        //メール送信
        Mail::to('faker@mail.com')
        ->send(new ContactMail($attributes['company'],
        $attributes['name'],
        $attributes['tel'],
        $attributes['email'],
        $attributes['birth_date'],
        $attributes['gender'],
        $attributes['job'],
        $attributes['content']));

        $gender = config('const.gender');
        $job = config('const.job');    
        return view('contacts.send',compact('contact','gender','job'));
    }    
}