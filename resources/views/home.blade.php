@extends('common.layout')
<link rel="stylesheet" href="home.css">

@section('title','ホーム')
@section('main','Home')
@yield('content')  
@section('newCreate')
<div><a href="{{route('showUser')}}">新規作成</a></div>
@endsection

@section('content')

  <div class="item"><h2>会員登録</h2></div>
  <div><h2><a href="{{route('users')}}">会員一覧</a></h2></div>     
  {{-- <div>お問い合わせ一覧</div>
  <div><a href="{{route('showContacts')}}">お問い合わせ一覧</a></div>   --}}
@endsection

          
          