@extends('common.layout')

@section('title','お問い合わせ編集')

@section('mainTitle','お問い合わせ編集')

@section('mainContainer','mainContainer')

@section('content')
    <form class="editForm" action="{{ route('contactEdit', $contact->id) }}" method="POST" style="padding-bottom: 100px">
        @csrf
        ステータス : 
        <input type="hidden" name="id" value='{{ $contact->id }}'>
        <select class='status' name="status">
            @foreach($statuses as $key => $value)
                <option value="{{ $key }}" {{ $contact->status == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
        <br>
        お問い合わせ内容
        <br>
        {!! nl2br( $contact->content ) !!}
        <br>
        <label for="remarks">備考<br>
            <textarea class="remarks" name="remarks" id="remarks" cols="30" rows="10">{{old('remarks',$contact->remarks)}}</textarea>  
        </label>
        <br>
        <div style="font-size:24px;">お問い合わせ情報</div>
        <br>
        氏名：{{ $contact->name }}
        <br>
        電話番号：{{ $contact->tel }}
        <br>
        メールアドレス：{{ $contact->email }}
        <br>
        生年月日：{{ $contact->birth_date }}
        <br>
        性別：{{ $contact->gender_type }}
        <br>
        職業：{{$contact->job_type}}
        <br>
        <input class="submit" type="submit" value="登録する">
    </form>
@endsection