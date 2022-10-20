@extends('common.layout')

@section('session')
    <div class="session">
        @if (session('success'))
            {{session('success')}}
        @endif
    </div>
@endsection

@section('search')
    <div><h2>検索</h2></div>
    <form action="{{ route('showContacts') }}" method="get">
        
        <div class="searchBar">
            <div class="searchName">
                <div><p class="gap">氏名</p>
                    <div>
                        <label for="name">
                            <input type="text" name="keyword_name" id="name" value="{{ $keyword_name }}">
                        </label>
                    </div>
                </div>
                
                <div><p class="gap">会社名</p>
                    <div>
                        <label for="company">
                            <input type="text" name="keyword_company" id="company" value="{{ $keyword_company }}">
                        </label>
                    </div>
                </div>
                <div ><p class="gap">ステータス</p>
                    <div>
                        <select name="keyword_status" class=".selectWidth">
                            <option value=""></option>
                            @foreach ($statuses as $key => $value)
                                <option value="{{ $key }}" {{ $keyword_status == $key ? 'selected' : '' }}>{{ $value }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div><p class="gap">職業</p>
                    <div>
                        <select name="keyword_job">
                            <option value=""></option>
                            @foreach ($jobs as $key => $value)
                                <option value="{{ $key }}" {{ $keyword_job == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach    
                        </select>
                    </div>
                </div>
                <button class="submitButton" type="submit" value="click" name="on" >検索する</button>
            </div> 
        </div>
    </form>
@endsection

@section('title','お問い合わせ一覧')

@section('mainTitle','お問い合わせ一覧')

@section('mainContainer','mainContactContainer')

@section('session')
    <div class="sessionColor">
        @if (session('flash_message'))
            {{ session('flash_message') }}
        @endif
    </div>      
@endsection

@section('content')
    <table>
        <thead>
            <tr>
            <th>編集</th>
            <th>削除</th>
            <th>ステータス</th>
            <th>会社名</th>
            <th>氏名</th>
            <th>電話番号</th>
            <th>職業</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)    
                <tr>
                    <td> 
                        <a href="{{ route('showEditContact', $contact->id) }}"> 
                        <img class="pen" src="{{asset('images/pen.svg')}}" alt="contact">
                    </a>
                </td>
                <td>
                    <a href="{{ route('contactDelete', $contact->id) }}">
                        <img class="" src="{{ asset('images/delete.svg') }}" alt="delete">
                    </a>
                </td>
                <td> {{ $statuses[$contact->status] }}</td>
                <td> {{ $contact->company }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->tel }} </td>
                <td>{{ $jobs[$contact->job] }} </td> 
                </tr>
            @endforeach  
        </tbody>
    </table>
@endsection