@extends('common.contactsLayout')
        
@section('title','送信用')

@section('header','送信ヘッダー')

@section('main')
    <div><h1 class="font-weight-bold text-center">送信完了しました</h1></div>
    <div class="mb-5 "></div>
    <div><h4 class="font-size-20 text-center">会社名:{{$contact->company}}</h4></div>
    <div class="mb-3 "></div>
    <div><h4 class="font-size-20 text-center">氏名:{{$contact->name}}</h4></div>
    <div class="mb-3 "></div>
    <div><h4 class="font-size-20 text-center">電話番号:{{$contact->tel}}</h4></div>
    <div class="mb-3 "></div>
    <div><h4 class="font-size-20 text-center">メールアドレス:{{$contact->email}}</h4></div>
    <div class="mb-3 "></div>
    <div><h4 class="font-size-20 text-center">生年月日:{{$contact->birth_date}}</h4></div>
    <div class="mb-3 "></div>
    <div><h4 class="font-size-20 text-center">性別:{{$gender[$contact->gender]}}</h4></div>
    <div class="mb-3 "></div>
    <div><h4 class="font-size-20 text-center">職業:{{$job[$contact->job]}}</h4></div>
    <div class="mb-3 "></div>
    <div><h4 class="font-size-20 text-center">お問い合わせ内容:<br>{!! nl2br($contact->content) !!}</h4></div>
    <div class="mb-3 "></div>
    <div class="container">
    <div class="row">
        <div class="col text-center">
            <a href="{{route('form')}}"><button type="button" class="btn btn-primary">戻る</button></a>
        </div>
    </div>
@endsection
