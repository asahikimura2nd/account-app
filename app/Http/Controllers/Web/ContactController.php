<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\ConfirmRequest;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
     //お問い合わせフォーム
    public function form()
    {
        if(session()->has('users')){
            session()->forget('users');
        }
        $jobArray = config('const.job');
        return view('contacts.form',compact('jobArray'));
    }

    //確認ページ
    public function confirm(ConfirmRequest $request)
    {
        if(session()->has('users')){
            session()->forget('users');
            return redirect()->route('form');
        }
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
        if(session()->has('users')){
            session()->forget('users');
            return redirect()->route('form');
        }
        $attributes = $request->all();
        $contact = new Contact;
        $contact->fill($attributes)->save();
        

        try {
            // 管理者にメール送信
            $mailable = new ContactMail();
            $mailable->setForm($attributes)->subject('お問い合わせがありました。')->setType('admin');
            Mail::to('kimura@re-vite.com')->send($mailable);

            // ユーザーにメール送信
            $mailable = new ContactMail();
            $mailable->setForm($attributes)->subject('お問い合わせ、ありがとうございます。')->setType('user');
            Mail::to($attributes['email'])->send($mailable);  
        } catch (\Throwable $th) {
            Log::error($th);
        }
        
        $gender = config('const.gender');
        $job = config('const.job');
        //メール送信後、新しいsession値を保持
        session(['users' => 'send']);
        return view('contacts.send',compact('contact','gender','job'));
    }    
}