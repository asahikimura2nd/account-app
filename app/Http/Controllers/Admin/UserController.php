<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditMemberRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // 会員一覧画面
    public function users(Request $request)
    {
        $pref = config('const.prefSearch');
        $users = User::all(); 
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
            $users = $qb->get();
        } 
        return view('users', compact('users','pref','keyword_company','keyword_email','keyword_prefectures'));
    }

    //会員登録
    public function showUser(User $user)
    {
        $prefs = config('pref');
        return view('user_edit_form', compact('user','prefs'));
    }

    //会員処理
    public function editUser(EditMemberRequest $request, User $user)
    {
        $attributes = $request->all();
        if($attributes['password'] == null){
            unset($attributes['password']);
        } else {
            $attributes['password'] = Hash::make($attributes['password']); 
        }
        $user->fill($attributes)->save(); 
        return redirect()->route('users')->with('success','登録完了しました');     
    }

    //削除機能
    public function accountDelete(User $user)
    {
        $user->delete();
        return redirect()->route('users')->with('success','削除しました。');
    }
}