@extends('common.layout')

@section('title','会員編集')

@section('mainTitle','会員編集')

@section('mainContainer','mainContainer')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
@endsection

@section('content')
    <h1>会員編集フォーム</h1>
    <div class="sessionError"> 
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>

    <form action="{{ $id == null ? route('editUser') : route('editUser', $editMember->id) }}" method="POST">
        @csrf
        <label for="company"><button class="inputButton">必須</button>会社名<br>
            <input type="text" name="company" id="company" value="{{ $id == null ? old('company') :old('company',$editMember->company) }}">
        </label>
        <br>
        <label for="name_katakana"><button class="inputButton">必須</button>フリガナ<br>
            <input type="text" name="name_katakana" id="name_katakana" value="{{ $id == null ? old('name_katakana'): old('name_katakana',$editMember->name_katakana) }}">
        </label>
        <br>
        <label for="email"><button class="inputButton">必須</button>メールアドレス<br>
            <input type="email" name="email" id="email" value="{{ $id == null ? old('email') : old('email',$editMember->email) }}">
        </label>
        <br>
        <label for="user_password"><button class="inputButton">必須</button>パスワード:再入力してください<br>
            <input type="password" name="password" id="password" value="" autocomplete="new-password"  placeholder="8桁以上" >
        </label>
        <br>
        <label for="tel"><button class="inputButton">必須</button>電話番号<br>
            <input type="text" name="tel" id="tel" value="{{ $id == null ? old('tel') : old('tel',$editMember->tel)}}" placeholder="000-0000-0000">
        </label>
        <br>
        <label for="postcode"><button class="inputButton">必須</button>郵便番号<br>
            <input type="text" name="postcode" id="postcode" value="{{ $id == null ? old('postcode') : old('postcode',$editMember->postcode) }}" placeholder="000-0000">
        </label>
        <br>
        @if($id == null)
            <label for="prefectures"><button class="inputButton">必須</button>都道府県<br>
                <select class="pref_select" name="prefectures" id="prefectures">
                    @foreach ( $prefs as $key => $value )
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </label>
        @else
            <label for="prefectures"><button class="inputButton">必須</button>都道府県<br>        
                <select class="pref_select" name="prefectures" id="prefectures">
                    @foreach ( $prefs as $key => $value )
                        <option value="{{ $key }}" {{ $editMember->prefectures == $key ? 'selected':'' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </label>
        @endif        
        <br>
        <label for="city"><button class="inputButton">必須</button>市区町村<br>
            <input type="text" name="city" id="city" value="{{ $id == null ? old('city') : old('city',$editMember->city) }}">
        </label>
        <br>
        <label for="address_and_building"><button class="inputButton">必須</button>番号・アパート名<br>
            <input type="text" name="address_and_building" id="address_and_building" value="{{ $id == null ? old('address_and_building') : old('address_and_building',$editMember->address_and_building) }}">
        </label>
        <br>
        <label for="content"><button class="inputButton">必須</button>備考欄<br>
            <textarea name="content" id="content" cols="30" rows="10">{{ $id == null ? old('content') : old('content',$editMember->content) }}</textarea>
        </label>
        <br>
        <input class="submit" type="submit" value="再登録する。">
    </form>
@endsection