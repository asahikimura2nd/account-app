@extends('common.layout')

@section('title','会員一覧')

@section('mainTitle','会員一覧')

@section('mainContainer','mainContactContainer')


@section('search')
    <div><h2>検索</h2></div>
    <form action="{{ route('users') }}" method="get">
        
        <div class="searchBar">
            <div class="searchName">
                <div><p class="gap">名前</p>
                    <div>
                        <label for="keyword_company">
                            <input type="text" name="keyword_company" id="keyword_company" value="{{ $keyword_company }}">
                        </label>
                    </div>
                </div>
                
                <div><p class="gap">email</p>
                    <div>
                        <label for="keyword_email">
                            <input type="text" name="keyword_email" id="company" value="{{ $keyword_email }}">
                        </label>
                    </div>
                </div>
                <div ><p class="gap">都道府県</p>
                    <div>
                        <select name="keyword_prefectures" class="selectWidth">
                            @foreach ($pref as $key => $value)
                                <option value="{{ $key }}" {{ $keyword_prefectures == $key ? 'selected' : '' }}>{{ $value }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input class="gap-ml" type="submit" value="検索する" name='on'>
            </div> 
        </div>
    </form>
@endsection

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
    {{ $members->links('vendor.pagination.custom') }}
@endsection