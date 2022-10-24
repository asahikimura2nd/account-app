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
    private $method_action_key = 'method_action_key';
     //お問い合わせフォーム
    public function form()
    {
        $action = session()->get($this->method_action_key);
        $is_reload = ($action == '' );

        if( is_null($action) ){
            $reload_text = '初期表示です';
        } else if($is_reload) {
            $reload_text = 'リロードです';
        } else {
            $reload_text = '遷移画面です';
        }
        $jobArray = config('const.job');
        return view('contacts.form',compact('jobArray'));
    }

    //確認ページ
    public function confirm(ConfirmRequest $request)
    {
        
        session()->put($this->method_action_key, '');
        dd(session());
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
        
        session()->put($this->method_action_key, '');
        $attributes = $request->all();
        $contact = new Contact;
        $contact->fill($attributes)->save();
        $request->session()->regenerateToken();
        //メール送信

        // 管理者にメール送信
        $mailable = new ContactMail();
        $mailable->setForm($attributes)->subject('お問い合わせがありました。')->setType('admin');
        Mail::to('kimura@re-vite.com')->send($mailable);

        // ユーザーにメール送信
        $mailable = new ContactMail();
        $mailable->setForm($attributes)->subject('お問い合わせ、ありがとうございます。')->setType('user');
        Mail::to($attributes['email'])->send($mailable);        
        
        // 管理者へ送る本文は「お問合せがありました」,ユーザーへはお問合せの内容
        // 管理者へ送る件名は「お問合せがありました」,ユーザーへの件名は「お問合せありがとうございます」
        $gender = config('const.gender');
        $job = config('const.job');    
        return view('contacts.send',compact('contact','gender','job'));
    }    
}