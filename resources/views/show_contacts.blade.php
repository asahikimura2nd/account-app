@extends('common.layout')

@section('session')
    <div class="session">
        @if (session('success'))
            {{session('success')}}
        @endif
    </div>
@endsection

@section('title','お問い合わせ一覧')

@section('mainTitle','お問い合わせ一覧')

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
                        <a href="{{ route('showEditContact',['random_id' => $contact->random_id]) }}"> 
                        <img class="pen" src="{{asset('images/pen.svg')}}" alt="contact">
                    </a>
                </td>
                <td>
                    <a href="{{ route('contactDelete',['random_id' => $contact->random_id]) }}">
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