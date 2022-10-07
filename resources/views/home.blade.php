@extends('common.layout')

@section('title','Home')

@section('mainTitle','Home')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
@endsection

@section('newCreate')
	<div class="newCreate"><a href="{{route('showUser')}}">新規作成</a></div>
    <link rel="stylesheet" href="{{ asset('css/home/newCreate.css') }}">
@endsection

@section('content')
    <div><h2>会員登録</h2></div>
	<div  class="title"><h2><a href="{{route('users')}}">会員一覧</a></h2></div>     
@endsection