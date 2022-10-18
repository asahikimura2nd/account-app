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
    <div class="sessionError"> 
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>

    <form action="{{ route('editUser', $user->id) }}" method="POST">
        @csrf
        @if($user->id != null)
            <input type="hidden" name="id" value="{{ $user->id }}">
        @endif
        <label for="company"><p class="required-label">必須</p>会社名<br>
            <input type="text" name="company" id="company" value="{{ old('company',$user->company) }}">
        </label>
        <br>
        <label for="name_katakana"><p class="required-label">必須</p>フリガナ<br>
            <input type="text" name="name_katakana" id="name_katakana" value="{{ old('name_katakana',$user->name_katakana) }}">
        </label>
        <br>
        <label for="email"><p class="required-label">必須</p>メールアドレス<br>
            <input type="email" name="email" id="email" value="{{ old('email',$user->email) }}">
        </label>
        <br>
        <label for="user_password">
            @if($user->id == null)
                <p class="required-label">必須</p><span>パスワード</span><br>
            @else
            <div style="padding:12px 60px;">パスワード</div>
            @endif
            <input type="password" name="password" id="password" value="{{ old('password') }}" autocomplete="new-password"  placeholder="8桁以上" >
        </label>
        <br>
        <label for="tel"><p class="required-label">必須</p>電話番号<br>
            <input type="text" name="tel" id="tel" value="{{ old('tel',$user->tel)}}" placeholder="000-0000-0000">
        </label>
        <br>
        <label for="postcode"><p class="required-label">必須</p>郵便番号<br>
            <input type="text" name="postcode" id="postcode" value="{{ old('postcode',$user->postcode) }}" placeholder="000-0000">
        </label>
        <br>
        <label for="prefectures"><p class="required-label">必須</p>都道府県<br>        
            <select class="pref_select" name="prefectures" id="prefectures">
                <option value="">選択してください</option>
                @foreach ( $prefs as $key => $value )
                    <option value="{{ $key }}" {{ ($user->id != null && $user->prefectures == $key) ? 'selected':'' }}>{{ $value }}</option>
                @endforeach
            </select>
        </label>
        <br>
        <label for="city"><p class="required-label">必須</p>市区町村<br>
            <input type="text" name="city" id="city" value="{{ old('city', $user->city) }}">
        </label>
        <br>
        <label for="address_and_building"><p class="required-label">必須</p>番号・アパート名<br>
            <input type="text" name="address_and_building" id="address_and_building" value="{{ old('address_and_building',$user->address_and_building) }}">
        </label>
        <br>
        <label for="content"><p class="required-label">必須</p>備考欄<br>
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