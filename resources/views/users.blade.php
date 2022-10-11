@extends('common.layout')

@section('title','会員一覧')

@section('mainTitle','会員一覧')

@section('mainContainer','mainMemberContainer')

@section('newCreate')
	<div class="newCreate"><a href="{{route('showUser')}}">新規作成</a></div>
    <link rel="stylesheet" href="{{ asset('css/home/newCreate.css') }}">
@endsection

@section('session')
    <div class="session">
        @if (session('success'))
            {{session('success')}}
        @endif
    </div>
@endsection

@section('content') 
    <table>
        {{-- {{ dd($prefNameArray) }} --}}
        <thead>
            <tr >
            <th>編集</th>
            <th>削除</th>
            <th>メールアドレス</th>
            <th>電話番号</th>
            <th>都道府県</th>
            <th>市町村</th>
            <th>番地・アパート名</th>
            </tr>
        <thead>
        <tbody>
            @foreach ($members as $member)
                <tr>             
                <td>
                    <a href="{{ route('showEdit',['id' => $member->id]) }}">
                        <img class="pen" src="{{ asset('images/pen.svg') }}" alt="edit">
                    </a>
                </td> 
                <td>
                    <a href="{{ route('accountDelete',['id' => $member->id]) }}">
                        <img class="" src="{{ asset('images/delete.svg') }}" alt="delete">
                    </a>
                </td>
                <td>{{ $member->email }}</td> 
                <td>{{ $member->tel }}</td> 
                <td>{{ $member->prefectures_type }}</td> 
                <td>{{ $member->city }}</td> 
                <td>{{ $member->address_and_building }}</td> 
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection