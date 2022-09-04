@extends('common.layout')

@section('title','会員一覧')

@section('mainTitle','会員一覧')

@section('session')
@if (session('member_success'))
{{session('member_success')}}
@endif
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
      {{-- <img class="pen" src="{{asset('images/pen.svg')}}" alt="edit"> --}}
    <tbody>
      
        
        @foreach ($members as $member)
        <tr>             
          <td><a href="{{ route('showEdit',['member_id' => $member->member_id]) }}"><img class="pen" src="{{asset('images/pen.svg')}}" alt="edit"></a></td> 
          <td>{{$member->member_email}}</td> 
          <td> {{$member->member_tel}}</td> 
          <td> {{$member->member_prefectures}}</td> 
          <td>  {{$member->member_city}}</td> 
          <td>  {{$member->member_address_and_building}}</td> 
        </tr>
        @endforeach
            

    </tbody>
  </table>
@endsection