<?php

namespace App\Http\Controllers;
use App\Http\Requests\MemberRequest;
use App\Http\Requests\TestRequest;
use App\Http\Requests\EditMemberRequest;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
        //ホーム
     public function home(){
        return view('home');
    } 
        // 会員一覧画面
    public function users(){
        $members = DB::table('users')->get();
        
    return view('users',["members"=> $members]);
    }
   
    //会員登録
    public function showUser(){
        return view('user_form');
    }

    //会員登録処理
    public function user(MemberRequest $request){
        $attributes = $request ->all();
        // dd($attributes);
        $member = new User;
        $member -> fill($attributes);
        $member -> save();
        return redirect()->route('users')->with('member_success','登録完了しました');
    }

    //会員編集画面
    public function showEdit($member_id){
        // dd($member_id);
        $editMember = User::where('member_id',$member_id)->first();
        // dd($editMember);
        return view('user_edit_form',['editMember'=> $editMember]);
    }
    //会員登録処理(編集)
    
     public function editUser(EditMemberRequest $request){
        // https://qiita.com/sola-msr/items/fac931c72e1c46ae5f0f
        $member = User::where('member_id',$request->member_id)->first();
     
        $member-> update($request->all());
        return redirect()->route('users')->with('member_success','再登録完了しました');
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

        
    /**
     * 
     * お問い合わせ側（user）
     * 
     * 
     */
        public function form(){
            return view('contacts.form');
        } 

        //確認ページ
        public function confirm(TestRequest $request){
            $attributes=$request->all();
            // dd($attributes);
            $forms = new Contact;
            $forms->fill($attributes) ->save();
            // dd($forms);
            return view('contacts.confirm',['forms'=>$forms]);
        }

        // 戻る選択時
        public function formEdit($id){
          $forms = DB::table('contacts')->where('id',$id)->first();
        //   dd($forms);
            return view('contacts.formEdit' , ['forms' => $forms] );
        }


        public function send($id){
            // dd($id);
            $forms = DB::table('contacts')->where('id',$id)->first();
            // dd($forms);
            // $formData->fill($forms)->save();
            // $forms->session()->flush();
            
        return view('contacts.send',['forms'=>$forms]);
    }    
}