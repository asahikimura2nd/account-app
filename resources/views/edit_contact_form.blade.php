@extends('common.layout')

@section('title','会員登録')

@section('content')
  <h1>お問い合わせ編集</h1>

  {{-- @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach --}}
  <form action="{{route('contactEdit')}}" method="POST">
    @csrf
    ステータス
      <select name="status">
        <option value="未対応" @if(old('status')==="未対応") selected @endif>未対応</option>
        <option value="対応中" @if(old('status')==="対応中") selected @endif>対応中</option>
        <option value="対応済み" @if(old('status')==="対応済み") selected @endif>対応済み</option>
    </select>
    <br>
      お問い合わせ内容
      <br>
      {{$editContact->user_content}}
      <br>
      <label for="remarks">備考<br>
        <textarea name="remarks" id="remarks" cols="30" rows="10">{{old('remarks',$editContact->remarks)}}</textarea>  
      </label>
      <br>
      お問い合わせ情報
      氏名：{{$editContact->user_name}}
      <br>
      電話番号：{{$editContact->user_tel}}
      <br>
      メールアドレス：{{$editContact->user_email}}
      <br>
      生年月日：{{$editContact->user_birth_date}}
      <br>
      性別：{{$editContact->user_gender}}
      <br>
      職業：{{$editContact->user_job}}
      <br>
      <input type="submit" value="登録する。">

  </form>
@endsection