<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Http\Requests\EditMemberRequest;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function showUser($id = null)
    {
        $prefs = config('pref');
        if($id == null){
            return view('user_edit_form', compact('prefs','id'));
        } else {
            $editMember = User::where('id',$id)->first();
            return view('user_edit_form', compact('editMember','prefs','id'));
        }
    }

    //会員登録処理、編集処理
    public function editUser(EditMemberRequest $request, $id = null)
    {
        $attributes = $request->all();
        if($id == null){
            $member = new User;
            $attributes['password'] = Hash::make('password'); 
            // dd($attributes);
            $member->fill($attributes);
            $member->save();   
        } else {
            $password = $request->password;
            if($request->filled('password')){
                $attribute['password'] = Hash::make($password);
            }
            $member = User::find($id);
            $member->update($attribute);
        }
        return redirect()->route('users')->with('success','登録完了しました');
    }

    //削除機能
    public function accountDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users')->with('success','削除しました。');
    }
}