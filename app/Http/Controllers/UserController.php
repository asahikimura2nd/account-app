<?php

namespace App\Http\Controllers;
use App\Http\Requests\MemberRequest;
use App\Http\Requests\EditMemberRequest;
use App\Models\User;
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
        $prefs = config('pref');
        // dd($pref);
        return view('user_form',compact('prefs'));
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
        $prefs = config('pref');
        return view('user_edit_form',['editMember'=> $editMember,'prefs'=>$prefs]);
    }
    //会員登録処理(編集)
    
     public function editUser(EditMemberRequest $request){
        // https://qiita.com/sola-msr/items/fac931c72e1c46ae5f0f
        $member = User::where('member_id',$request->member_id)->first();
     
        $member-> update($request->all());
        return redirect()->route('users')->with('member_success','再登録完了しました');
     }
 
    
}