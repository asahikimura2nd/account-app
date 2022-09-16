<?php

namespace App\Http\Controllers;
use App\Http\Requests\TestRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
     //お問い合わせフォーム
        public function form(){
            return view('contacts.form');
        } 

        //確認ページ
        public function confirm(TestRequest $request){
            $attributes=$request->all();
            // dd($attributes);
            $forms = new Contact;
            //一時データ保存（db上に保存はしない）
            $forms = $forms->fill($attributes);
            // dd($forms);
            return view('contacts.confirm',['forms'=>$forms]);
        }
      
        public function send(TestRequest $request){

            $attributes = $request->all();
            $forms = new Contact;
            $forms -> fill($attributes)->save();    
            // $formData->fill($forms)->save();
            // $forms->session()->flush();           
        return view('contacts.send',['forms'=>$forms]);
    }    




        //お問い合わせ一覧画面
        public function showContacts(){
            // https://readouble.com/laravel/6.x/ja/pagination.html
            $contacts = Contact::where('user_random_id','!=',null)->paginate(10);   
            // dd($contacts);
            $contacts->withPath('/show/contacts/');        
            return view('show_contacts',['contacts'=>$contacts]);
            }
            
            //お問い合わせ編集画面
            public function showEditContact($user_random_id){
                // dd($user_random_id);
                $editContact = Contact::where('user_random_id',$user_random_id)->first();
                // dd($editContact);
                return view('edit_contact_form',['editContact'=>$editContact]);
            }
    
            // https://progtext.net/programming/laravel-user-data/
            //お問い合わせ編集処理
            public function contactEdit(Request $request){
                // dd($request->all());
                $contacts= Contact::where('user_random_id',$request->user_random_id)->first();
                // dd($contacts);
                //更新
                $contacts->update($request->all());
                return redirect()->route('showContacts',['contacts'=>$contacts])->with('flash_message','変更を更新しました。');
            }
    
}