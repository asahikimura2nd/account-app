@extends('common.userLayout')

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
      <th>ステータス</th>
      <th>会社名</th>
      <th>氏名</th>
      <th>電話番号</th>
    </tr>
  </thead>

    <tbody>

      @foreach ($contacts as $contact)
      <tr>
        <td> <a href="{{ route('showEditContact',['user_random_id' => $contact->user_random_id]) }}"> <img class="pen" src="{{asset('images/pen.svg')}}" alt="edit"></a></td>
        <td> @if($contact->status===null)未対応@endif{{$contact->status}}</td>
        <td> {{$contact->user_company}}</td>
        <td>{{$contact->user_name}}</td>
        <td>{{$contact->user_tel}} </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  

  {{ $contacts->links('vendor/pagination/custom') }}
@endsection