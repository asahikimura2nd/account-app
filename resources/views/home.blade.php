@extends('common.layout')

@section('title','Home')

@section('mainTitle','Home')

@section('mainContainer','mainContainer')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
@endsection

@section('content')
    <div><h2>会員登録</h2></div>
	<div  class="title"><h2><a href="{{ route('users') }}">会員一覧</a></h2></div>
    <div><h2>お問い合わせ一覧</h2></div>
    <div class="title"><a href="{{ route('showContacts') }}">お問い合わせ一覧</a></div>


@endsection