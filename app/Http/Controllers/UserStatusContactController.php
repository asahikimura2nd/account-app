<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class UserStatusContactController extends Controller
{
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
            $contacts = $qb->get();
        }
        $statuses = config('const.statusSearch');
        $jobs = config('const.jobSearch');
        return view('show_contacts',compact('contacts','statuses','jobs','keyword_name','keyword_company','keyword_job','keyword_status'));
    }            
    
    //お問い合わせ編集画面
    public function showEditContact(Contact $contact)
    {
        $statuses = config('status');
        return view('edit_contact_form',compact('contact','statuses'));
    }
    
    //お問い合わせ編集処理
    public function contactEdit(Request $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect()->route('showContacts')->with('flash_message','変更を更新しました。');
    }

    //削除機能
    public function contactDelete(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('showContacts')->with('success','削除しました。');
    }
}
