<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateMemberRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class NewCreateUserController extends Controller
{
        //新規会員登録
        public function showFirstCreate()
        {
            $prefs = config('pref');
            return view('first_create_form',compact('prefs'));
        }
    
        //新規会員登録処理
        public function firstCreate(CreateMemberRequest $request)
        { 
            $attributes = $request ->all();
            $attributes['password'] = Hash::make('password');
            $user = new User;
            $user->fill($attributes);
            $user->save();
            return redirect()->route('showLogin')->with('success','登録完了しました');
        }    
}
