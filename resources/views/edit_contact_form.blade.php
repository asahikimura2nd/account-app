@extends('common.layout')

@section('title','お問い合わせ編集')

@section('mainTitle','お問い合わせ編集')

@section('mainContainer','mainContainer')

@section('content')
    <form class="editForm" action="{{ route('contactEdit',['id',$editContact->id])}}" method="POST">
        @csrf
        ステータス : 
        <input type="hidden" name="id" value='{{ $editContact->id }}'>
        <select class='status' name="status">
					@foreach($statuses as $key => $value)
						<option value="{{ $key }}" {{ $editContact->status == $key ? 'selected' : '' }}>{{ $value }}</option>
					@endforeach
        </select>
        <br>
        お問い合わせ内容
        <br>
        {!! nl2br( $editContact->content ) !!}
        <br>
        <label for="remarks">備考<br>
        <textarea class="remarks" name="remarks" id="remarks" cols="30" rows="10">{{old('remarks',$editContact->remarks)}}</textarea>  
        </label>
        <br>
        <div style="font-size:24px;">お問い合わせ情報</div>
        <br>
        氏名：{{ $editContact->name }}
        <br>
        電話番号：{{ $editContact->tel }}
        <br>
        メールアドレス：{{ $editContact->email }}
        <br>
        生年月日：{{ $editContact->birth_date }}
        <br>
        性別：{{ $editContact->gender_type }}
        <br>
        職業：{{$editContact->job_type}}
        <br>
        <input class="submit" type="submit" value="登録する">
    </form>
@endsection