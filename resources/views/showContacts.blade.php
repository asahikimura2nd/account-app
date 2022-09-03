@extends('common.layout')

@section('title','お問い合わせ一覧')

@section('content')
@if (session('flash_message'))
      {{ session('flash_message') }}
  @endif

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
      <tr>           
        <td>    
          @foreach ($contacts as $contact)
            <pre>
              {{-- <img class="edit" src="{{asset('images/pen.svg')}}" alt="membersIcon" class="membersIcon"> --}}
            <a href="{{ route('showEditContact',['user_random_id' => $contact->user_random_id]) }}">
              {{ route('showEditContact',['user_random_id' => $contact->user_random_id]) }}
              </a>
            <pre>
            @endforeach
        </td>
        <td>
          @foreach ($contacts as $contact)
            <pre>
              {{$contact->status}}
              @if($contact->status===null)
                未対応
              @endif
            <pre>
            @endforeach
        </td>
        <td>
        @foreach ($contacts as $contact)
        <pre>
          {{$contact->user_company}}
        <pre>
        @endforeach
        </td>
        <td>    
          @foreach ($contacts as $contact)
            <pre>
            {{$contact->user_name}}
            <pre>
            @endforeach
        </td>
        <td>    
          @foreach ($contacts as $contact)
            <pre>
            {{$contact->user_tel}}
          
            <pre>
            @endforeach
        </td>
      </tr>
    </tbody>
  </table>
  

  {{ $contacts->links('vendor/pagination/custom') }}
@endsection