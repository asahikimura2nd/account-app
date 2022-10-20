<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\TestRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
     //お問い合わせフォーム
    public function form()
    {
        $jobArray = config('const.job');
        return view('contacts.form',compact('jobArray'));
    }

    //確認ページ
    public function confirm(TestRequest $request)
    {
        $attributes = $request->all();
        $contact = new Contact;
        $gender = config('const.gender');
        $job = config('const.job');
        $contact->fill($attributes);
        return view('contacts.confirm',compact('contact','gender','job'));
    }

    //送信ページ
    public function send(TestRequest $request)
    {
        $attributes = $request->all();
        $contact = new Contact;
        $contact->fill($attributes)->save();
        $request->session()->regenerateToken();
        // Mail::send(new ContactMail( $attributes['company'], ));
        $gender = config('const.gender');
        $job = config('const.job');    
        return view('contacts.send',compact('contact','gender','job'));
    }    
}