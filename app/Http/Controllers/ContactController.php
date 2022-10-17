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
    public function showContacts(Request $request)
    {   
        
        //一覧ページ      
        $contacts = Contact::all();
        //検索ページ
        $query = $request->query;
        $keyword_name = $query->get('keyword_name');
        $keyword_company = $query->get('keyword_company');
        $keyword_status = $query->get('keyword_status');
        $keyword_job = $query->get('keyword_job');
        $search = $query->get('on');
        if ($search == 'click') {
            $qb = Contact::query();
            
            if($keyword_name){
                $qb->where('name','like',"%{$keyword_name}%");
            }
            if(!empty($keyword_company)){
                $qb->where('company','like',"%{$keyword_company}%");
            } 
            if($keyword_status){
                $qb->where('status', $keyword_status);
            }
            if ($keyword_job) {
                $qb->where('job', $keyword_job);
            }
            // $contacts = $qb->paginate(10);
            $contacts = $qb->get();
        }
        $statuses = config('const.statusSearch');
        $jobs = config('const.jobSearch');
        return view('show_contacts',compact('contacts','statuses','jobs','keyword_name','keyword_company','keyword_job','keyword_status'));
    }            
    
    //お問い合わせ編集画面
    public function showEditContact($id)
    {
        $editContact = Contact::where('id',$id)->first();
        $statuses = config('status');
        return view('edit_contact_form',compact('editContact','statuses'));
    }
    
    //お問い合わせ編集処理
    public function contactEdit(Request $request)
    {
        $contacts= Contact::where('id',$request->id)->first();
        $contacts->update($request->all());
        return redirect()->route('showContacts',['contacts'=>$contacts])->with('flash_message','変更を更新しました。');
    }

    //削除機能
    public function contactDelete($id)
    {
        $contact = Contact::where('id',$id)->first();
            $contact->delete();
        return redirect()->route('showContacts')->with('success','削除しました。');
    }
}