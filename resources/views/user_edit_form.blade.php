@extends('common.layout')

@if($user->id == null )
    @section('title','会員作成')
    @section('mainTitle','会員作成')
@else
    @section('title','会員編集')
    @section('mainTitle','会員編集')
@endif 
@section('mainContainer','mainContainer')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
@endsection

@section('content')
    @if($user->id == null)
        <h1>会員作成フォーム</h1>
    @else
        <h1>会員編集フォーム</h1>
    @endif

    <form style="padding-bottom: 100px" action="{{ route('editUser', $user->id) }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id == null ? null : $user->id }}">
        <label for="company"><p class="required-label">必須</p>会社名<br>
            <input type="text" name="company" id="company" value="{{ old('company',$user->company) }}">
        </label>
        @if($errors->has('company'))
            <li class="error_message">{{ $errors->first('company') }}</li>
        @endif
        <br>
        <label for="name_katakana"><p class="required-label">必須</p>フリガナ<br>
            <input type="text" name="name_katakana" id="name_katakana" value="{{ old('name_katakana',$user->name_katakana) }}">
        </label>
        <br>
        @if($errors->has('name_katakana'))
            <li class="error_message">{{ $errors->first('name_katakana') }}</li>
        @endif
        <label for="email"><p class="required-label">必須</p>メールアドレス<br>
            <input type="email" name="email" id="email" value="{{ old('email',$user->email) }}">
        </label>
        @if($errors->has('email'))
            <li class="error_message">{{ $errors->first('email') }}</li>
        @endif
        <br>
        <label for="user_password">
            @if($user->id == null)
                <p class="required-label">必須</p><div>パスワード</div><br>
                <input type="password" name="password" id="password" value="" placeholder="8桁以上" >
            @else   
                <div style="padding:12px 0px;">パスワード</div>
                <input type="password" name="password" id="password" value="{{ old('password') }}" autocomplete="new-password"  placeholder="8桁以上" >
            @endif
        </label>
        @if($errors->has('password'))
            <li class="error_message">{{ $errors->first('password') }}</li>
        @endif
        <br>    
        <label for="tel"><p class="required-label">必須</p>電話番号<br>
            <input type="text" name="tel" id="tel" value="{{ old('tel',$user->tel)}}" placeholder="000-0000-0000">
        </label>
        @if($errors->has('tel'))
            <li class="error_message">{{ $errors->first('tel') }}</li>
        @endif
        <br>
        <label for="postcode"><p class="required-label">必須</p>郵便番号<br>
            <input type="text" name="postcode" id="postcode" value="{{ old('postcode',$user->postcode) }}" placeholder="000-0000">
        </label>
        @if($errors->has('postcode'))
            <li class="error_message">{{ $errors->first('postcode') }}</li>
        @endif
        <br>
        <label for="prefectures"><p class="required-label">必須</p>都道府県<br>        
            <select class="pref_select" name="prefectures" id="prefectures">
                <option value="">選択してください</option>
                @foreach ( $prefs as $key => $value )
                    <option value="{{ $key }}" {{ (request()->old('prefectures') == $key) ? 'selected':'' }}>{{ $value }}</option>
                @endforeach
            </select>
        </label>
        @if($errors->has('prefectures'))
            <li class="error_message">{{ $errors->first('prefectures') }}</li>
        @endif
        <br>
        <label for="city"><p class="required-label">必須</p>市区町村<br>
            <input type="text" name="city" id="city" value="{{ old('city', $user->city) }}">
        </label>
        @if($errors->has('city'))
            <li class="error_message">{{ $errors->first('city') }}</li>
        @endif
        <br>
        <label for="address_and_building"><div style="padding:12px 0px;"></div>番地・アパート名<br>
            <input type="text" name="address_and_building" id="address_and_building" value="{{ old('address_and_building',$user->address_and_building) }}">
        </label>
        @if($errors->has('address_and_building'))
            <li class="error_message">{{ $errors->first('address_and_building') }}</li>
        @endif
        <br>
        <label for="content"><div style="padding:12px 0px;"></div>備考欄<br>
            <textarea name="content" id="content" cols="30" rows="10">{{ old('content',$user->content) }}</textarea>
        </label>
        <br>
        @if($user->id == null)
        <input class="submit" type="submit" value="登録する。">
        @else
            <input class="submit" type="submit" value="再登録する。">
        @endif
    </form>
@endsection