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
        $gender = config('const.gender');
        $job = config('const.job');    
    return view('contacts.send',compact('contact','gender','job'));
    }    

    //お問い合わせ一覧画面
    public function showContacts()
    {
        $contacts = Contact::where('random_id','!=',null)->paginate(2);
        $contacts->withPath('/show/contacts/');        
        return view('show_contacts',compact('contacts'));
    }        
    
    //お問い合わせ編集画面
    public function showEditContact($random_id)
    {
        $editContact = Contact::where('random_id',$random_id)->first();
        $statuses = config('status');
        return view('edit_contact_form',compact('editContact','statuses'));
    }
    
    //お問い合わせ編集処理
    public function contactEdit(Request $request)
    {
        $contacts= Contact::where('random_id',$request->random_id)->first();
        $contacts->update($request->all());
        return redirect()->route('showContacts',['contacts'=>$contacts])->with('flash_message','変更を更新しました。');
    }

    //削除機能
    public function contactDelete($random_id)
    {
        $contact = Contact::where('random_id',$random_id)->first();
        if ($contact != null){
            $contact->delete();
        return redirect()->route('showContacts')->with('success','削除しました。');
        }
        return redirect()->route('showContacts')->with('success','削除しました。');
    }
}