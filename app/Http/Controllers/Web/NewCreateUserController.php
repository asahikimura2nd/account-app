<?php

namespace App\Http\Controllers\Web;
use App\Http\Requests\CreateMemberRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class NewCreateUserController extends Controller
{
        //新規会員登録
        public function showFirstCreate(User $user)
        {
            $prefs = config('const.pref');
            return view('first_create_form',compact('user', 'prefs'));
        }
    
        //新規会員登録処理
        public function firstCreate(CreateMemberRequest $request)
        { 
            $attributes = $request ->all();
            $attributes['password'] = Hash::make('password');
            $user = new User;
            dump($user);
            // dd($attributes);
            $user->fill($attributes)->save();
            return redirect()->route('showLogin')->with('success','登録完了しました');
        }    
}
