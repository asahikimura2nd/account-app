@extends('common.layout')

@section('title','お問い合わせ編集')

@section('mainTitle','お問い合わせ編集')

@section('content')
  <form class="editForm" action="{{ route('contactEdit',['user_random_id',$editContact->user_random_id])}}" method="POST">
    @csrf
    <input type="hidden" name= 'user_random_id' value = "{{$editContact->user_random_id}}">
    ステータス : 
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
        <textarea class="remarks" name="remarks" id="remarks" cols="30" rows="10">{{old('remarks',$editContact->remarks)}}</textarea>  
      </label>
      <br>
      <div style="font-size:24px;">お問い合わせ情報</div>
      <br>
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
      <input class="submit" type="submit" value="登録する">
  </form>
@endsection