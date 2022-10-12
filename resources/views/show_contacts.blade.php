@extends('common.layout')

@section('session')
    <div class="session">
        @if (session('success'))
            {{session('success')}}
        @endif
    </div>
@endsection

@section('search')
    <form action="{{ route('showContacts') }}" method="get">
        <div class="searchBar">
            <div><h2>検索</h2></div>
            <div class="searchName">
                <div>氏名
                    <div>
                        <label for="name">
                            <input type="text" name="keyword_name" id="name" value="{{ $keyword_name }}">
                        </label>
                    </div>
                </div>
                <div>会社名
                    <div>
                        <label for="company">
                            <input type="text" name="keyword_company" id="company" value="{{ $keyword_company }}">
                        </label>
                    </div>
                </div>
                <div>ステータス
                    <div>
                        <select name="keyword_status">
                            @foreach ($statuses as $key => $value)
                                <option value="{{ $key }}" >{{ $value }} </option>
                                {{-- {{ $edit->status == $key ? 'selected' : '' }} --}}
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>職業
                    <div>
                        <select name="keyword_job">
                            @foreach ($jobs as $key => $value)
                            <option value="{{ $key }}" >{{ $value }}</option>
                            {{-- {{ $contacts->job == $key ? 'selected' : '' }} --}}
                        @endforeach    
                        </select>
                    </div>
                </div>
                <input type="submit" value="検索する" name='on'>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)    
                <tr>
                    <td> 
                        <a href="{{ route('showEditContact',['id' => $contact->id]) }}"> 
                        <img class="pen" src="{{asset('images/pen.svg')}}" alt="contact">
                    </a>
                </td>
                <td>
                    <a href="{{ route('contactDelete',['id' => $contact->id]) }}">
                        <img class="" src="{{ asset('images/delete.svg') }}" alt="delete">
                    </a>
                </td>
                <td> {{ $contact->status_type }}</td>
                <td> {{ $contact->company }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->tel }} </td>
                </tr>
            @endforeach  
        </tbody>  
    </table>
    {{ $contacts->links('vendor.pagination.custom') }}
@endsection