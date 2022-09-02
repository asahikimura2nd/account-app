@extends('common.layout')

@section('title','会員登録')

@section('content')


  <h1>会員登録フォーム</h1>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
  <form action="{{route('user')}}" method="POST">
    @csrf
    <input type="hidden" name="member_id" value="{{Str::random(30)}}">
      <label for="member_company">会社名：必須<br>
        <input type="text" name="member_company" id="member_company" value="{{ old('member_company') }}">
      </label>
      <br>
      <label for="member_name_katakana">フリガナ：必須<br>
        <input type="text" name="member_name_katakana" id="member_name_katakana" value="{{ old('member_name_katakana') }}">
      </label>
      <br>
      <label for="member_email">メールアドレス：必須<br>
        <input type="email" name="member_email" id="member_email" value="{{ old('member_email') }}">
      </label>
      <br>
      <label for="member_password">パスワード：必須<br>
        <input type="password" name="member_password" id="member_password" value="{{ old('member_password') }}" placeholder="8桁以上" >
      </label>
      <br>
      <label for="member_tel">電話番号：必須<br>
        <input type="text" name="member_tel" id="member_tel" value="{{ old('member_tel')}}" placeholder="000-0000-0000">
      </label>
      <br>
      <label for="member_postcode">郵便番号：必須<br>
        <input type="text" name="member_postcode" id="member_postcode" value="{{ old('member_postcode') }}" placeholder="000-0000">
      </label>
      <br>
      <label for="member_prefectures">都道府県：必須<br>
        <input type="text" name="member_prefectures" id="member_prefectures" value="{{ old('member_prefectures') }}">
      </label>
      <br>
      <label for="member_city">市区町村：必須<br>
        <input type="text" name="member_city" id="member_city" value="{{ old('member_city') }}">
      </label>
      <br>
      <label for="member_address_and_building">番号・アパート：必須<br>
        <input type="text" name="member_address_and_building" id="member_address_and_building" value="{{ old('member_address_and_building')}}">
      </label>
      <br>
      <label for="member_content">備考欄：必須<br>
        <textarea name="member_content" id="member_content" cols="30" rows="10">{{ old('member_content') }}</textarea>
      </label>
      <br>
      <input type="submit" value="登録する。">

  </form>
@endsection