@extends('common.layout')

@section('title','会員一覧')

@section('content')
  @if (session('member_success'))
    {{session('member_success')}}
  @endif
  
  <table>
    <thead>
    <tr>
      <th>編集</th>
      <th>メールアドレス</th>
      <th>電話番号</th>
      <th>都道府県</th>
      <th>市町村</th>
      <th>番地・アパート名</th>
    </tr>
    <thead>
    <tbody>
      <tr>           
        <td>    
          @foreach ($members as $member)
            <pre>
            <a href="{{ route('showEdit',['member_id' => $member->member_id]) }}">{{$member->member_id}}</a>
            <pre>
            @endforeach
        </td>

        <td>    
          @foreach ($members as $member)
            <pre>
            {{$member->member_email}}
            <pre>
            @endforeach
        </td>
        <td>    
          @foreach ($members as $member)
            <pre>
            {{$member->member_tel}}
            <pre>
            @endforeach
        </td>
        <td>    
          @foreach ($members as $member)
            <pre>
            {{$member->member_prefectures}}
            <pre>
            @endforeach
        </td>
        <td>    
          @foreach ($members as $member)
            <pre>
            {{$member->member_city}}
            <pre>
            @endforeach
        </td>
        <td>    
          @foreach ($members as $member)
            <pre>
            {{$member->member_address_and_building}}
            <pre>
            @endforeach
        </td>
      </tr>
    </tbody>
  </table>
@endsection