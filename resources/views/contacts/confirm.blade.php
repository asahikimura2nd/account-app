@extends('common.contactsLayout')
        
@section('title','確認用')

@section('header','確認用ヘッダー')

@section('main')

    <form action="{{route('send')}}" method="POST" style="margin-bottom:100px">
        @csrf
        <input type="hidden" name="status" value="no_response">
        <input type="hidden" name="company" value="{{ $contact->company }}">
        <div class=" mb-5 "><h3 class="font-weight-bold text-center">会社名:{{ $contact->company }}</h3></div>
        <input type="hidden" name="name" value="{{ $contact->name }}">
        <span class="border-top"></span>
        <div class="mb-5"><h3 class="font-weight-bold text-center">氏名:{{ $contact->name }}</h3></div>
        <input type="hidden" name="tel" value="{{ $contact->tel }}">
        <div class="mb-5"><h3 class="font-weight-bold text-center">電話番号:{{ $contact->tel }}</h3></div>
        <input type="hidden" name="email" value="{{ $contact->email }}">
        <div class="mb-5"><h3 class="font-weight-bold text-center">メールアドレス:{{ $contact->email }}</h3></div>
        <input type="hidden" name="birth_date" value="{{ $contact->birth_date }}">
        <div class="mb-5"><h3 class="font-weight-bold text-center">生年月日:{{ $contact->birth_date }}</h3></div>
        <input type="hidden" name="gender" value="{{ $contact->gender }}">
        <div class="mb-5"><h3 class="font-weight-bold text-center">性別:{{ $gender[$contact->gender] }}</h3></div>
        <input type="hidden" name="job" value="{{ $contact->job }}">
        <div class="mb-5"><h3 class="font-weight-bold text-center">職業:{{ $job[$contact->job] }}</h3></div>
        <input type="hidden" name="content" value="{{ $contact->content }}">
        <div class="mb-5"><h3 class="font-weight-bold text-center">お問い合わせ内容:<br>{!! nl2br(($contact->content)) !!}</h3></div>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <input type="submit"  class="btn btn-success col-form-label" value="送信する">
                    <input type="button"  class="btn btn-success col-form-label" onclick="history.back()" value="戻る">
                </div>
            </div>
        </div>
    </form>
@endsection