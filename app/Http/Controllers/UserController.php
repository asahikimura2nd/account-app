<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Http\Requests\EditMemberRequest;
use App\Models\User;
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

    //ホーム
    public function home()
    {
        return view('home');
    } 
    // 会員一覧画面
    public function users()
    {
        $members = User::all();
        // $prefNameArray = config('pref');
        return view('users',compact('members'));
    }

    //会員登録
    public function showUser()
    {
        $prefs = config('pref');
        return view('user_form',compact('prefs'));
    }

    //会員登録処理
    public function user(MemberRequest $request)
    {
        $attributes = $request->all();
        $attributes['password'] = Hash::make($request->password);
        $member = new User;
        $member->fill($attributes);
        $member->save();
        return redirect()->route('users')->with('success','登録完了しました');
    }

    //会員編集画面
    public function showEdit($id)
    {
        $editMember = User::where('id',$id)->first();
        $prefs = config('pref');
        return view('user_edit_form',compact('editMember','prefs'));
    }
    
    //会員登録処理(編集)
    public function editUser(EditMemberRequest $request)
    {
        $member = User::where('id',$request->id)->first();
        $member->update($request->all());
        return redirect()->route('users')->with('success','再登録完了しました');
    }
    
    //削除機能
    public function accountDelete($id)
    {
        $user = User::where('id',$id)->first();
        if ($user != null){
            $user->delete();
        return redirect()->route('users')->with('success','削除しました。');
        }
        return redirect()->route('users')->with('success','削除しました。');
    }
}