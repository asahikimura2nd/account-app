<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Http\Requests\EditMemberRequest;
use App\Models\User;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //新規会員登録
    public function showFirstCreate()
    {
        $prefs = config('pref');
        return view('first_create_form',compact('prefs'));
    }

    //新規会員登録処理
    public function firstCreate(MemberRequest $request)
    {
        
        $attributes = $request ->all();
        $attributes['password'] = Hash::make($request->password);
        $member = new User;
        $member->fill($attributes);
        $member->save();
        return redirect()->route('showLogin')->with('success','登録完了しました');
    }    

    // 会員一覧画面
    public function users(Request $request)
    {
        $pref = config('const.prefSearch');
        $members = User::all(); 
        $query = $request->query;
        $keyword_company = $query->get('keyword_company');
        $keyword_email = $query->get('keyword_email');
        $keyword_prefectures = $query->get('keyword_prefectures');
        $search = $query->get('on');
        
        if($search == 'click'){
            $qb = User::query();   
            if( $keyword_company ){
                $qb->where('company','like',"%{$keyword_company}%");
            }
            if( $keyword_email ){
                $qb->where('company','like',"%{$keyword_email}%");
            }
            if($keyword_prefectures){
                $qb->where('prefectures',$keyword_prefectures);     
            }
            $members = $qb->get();
        } 
        return view('users', compact('members','pref','keyword_company','keyword_email','keyword_prefectures'));
    }

    //会員登録
    public function showUser(  )
    {
        $prefs = config('pref');
        return view('user_form', compact('prefs'));
    }
    //会員編集画面
    public function showEdit($id = null)
    {
        $editMember = User::where('id',$id)->first();
        $prefs = config('pref');
        return view('user_edit_form', compact('editMember','prefs'));
    }

    //会員登録処理、編集処理
    public function user(MemberRequest $request)
    {
        $attributes = $request->all();
        $attributes['password'] = Hash::make($request->password);
        $member = new User;
        $member->fill($attributes);
        $member->save();
        return redirect()->route('users')->with('success','登録完了しました');
    }



    //会員登録処理(編集)
    public function editUser(EditMemberRequest $request)
    {
        $password = $request->password;
        // dd($password);

        $member = User::where('id',$request->id)->first();
        $hashPassword = $member->password;
        if(password_verify($password,$hashPassword)){
            // dump($password);
            // dump($hashPassword);
            // dd('一致');
        } else {
            // dump($password);
            // dump($hashPassword);
            // dd('不一致');
        }
        // if( Hash::check($request->password, $member->password) ){
        //     $request->password = $member->password;
        //     dd($request->password);    
        // } else {
        //     $request->password = Hash::make($request->password);
        //     dump($request->password);
        // }
        // dd($request->all());
        $member->update();
        return redirect()->route('users')->with('success','再登録完了しました');
    }

    //削除機能
    public function accountDelete($id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        return redirect()->route('users')->with('success','削除しました。');
    }
}



//メモ　上本さん
// <label for="user_password"><button class="inputButton">必須</button>パスワード<br>
//             <input type="password" name="password" id="password" value="" autocomplete="new-password" placeholder="8桁以上" >
// //controller
// $password = $request->password;
//         // dump($password);
//         //パスワードの場合除外
//         if ($request->filled('password')){
//             $password = Hash::make($password);
//             User::where('id',$request->id)->update(['password' => $password]);
//         }