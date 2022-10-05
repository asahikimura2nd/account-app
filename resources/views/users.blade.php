@extends('common.layout')

@section('title','会員一覧')

@section('mainTitle','会員一覧')

@section('session')
    <div class="session">
        @if (session('success'))
            {{session('success')}}
        @endif
    </div>

@endsection

@section('content') 
    <table>
        <thead>
            <tr >
            <th>編集</th>
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
                <td><a href="{{ route('showEdit',['member_id' => $member->member_id]) }}"><img class="pen" src="{{asset('images/pen.svg')}}" alt="edit"></a></td> 
                <td>{{$member->email}}</td> 
                <td>{{$member->tel}}</td> 
                <td>{{$member->prefectures}}</td> 
                <td>{{$member->city}}</td> 
                <td>{{$member->address_and_building}}</td> 
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection