<?php

namespace App\Http\Controllers;
use App\Http\Requests\TestRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
     //お問い合わせフォーム
    public function form(){
        $contact = new Contact;
        $jobArray = $contact->jobContact();
        return view('contacts.form',compact('jobArray'));
    }

    //確認ページ
    public function confirm(TestRequest $request){
        $attributes = $request->all();
        $contact = new Contact;
        $attributes['user_gender'] = $contact->gender($request->user_gender);
        $attributes['user_job'] = $contact->job($request->user_gender);
        $contact->fill($attributes);
        return view('contacts.confirm',compact('contact'));
    }
    
    public function send(TestRequest $request){
        $attributes = $request->all();
        $contact = new Contact;
        $contact->fill($attributes)->save();    
    return view('contacts.send',compact('contact'));
    }    

    //お問い合わせ一覧画面
    public function showContacts(){
        $contacts = Contact::where('user_random_id','!=',null)->paginate(10);   
        $contacts->withPath('/show/contacts/');        
        return view('show_contacts',['contacts'=>$contacts]);
    }        
    
    //お問い合わせ編集画面
    public function showEditContact($user_random_id){
        $editContact = Contact::where('user_random_id',$user_random_id)->first();
        return view('edit_contact_form',['editContact'=>$editContact]);
    }
    
    //お問い合わせ編集処理
    public function contactEdit(Request $request){
        $contacts= Contact::where('user_random_id',$request->user_random_id)->first();
        $contacts->update($request->all());
        return redirect()->route('showContacts',['contacts'=>$contacts])->with('flash_message','変更を更新しました。');
    }
}