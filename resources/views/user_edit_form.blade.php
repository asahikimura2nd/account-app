@extends('common.layout')


@section('title','会員編集')
@section('mainTitle','会員編集')
@section('style')
  <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
@endsection

@section('content')
  <h1>会員編集フォーム</h1>
  @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
  @endforeach
    <form action="{{route('editUser', $editMember->member_id)}}" method="POST">
      @csrf
      <input type="hidden" name="member_id" value="{{$editMember->member_id}}">
      {{-- {{dd($editMember->member_id)}} --}}
        <label for="member_company"><button class="inputButton">必須</button>会社名<br>
          <input type="text" name="member_company" id="member_company" value="{{ old('member_company',$editMember->member_company) }}">
        </label>
        <br>
        <label for="member_name_katakana"><button class="inputButton">必須</button>フリガナ<br>
          <input type="text" name="member_name_katakana" id="member_name_katakana" value="{{ old('member_name_katakana',$editMember->member_name_katakana) }}">
        </label>
        <br>
        <label for="member_email"><button class="inputButton">必須</button>メールアドレス<br>
          <input type="email" name="member_email" id="member_email" value="{{ old('member_email',$editMember->member_email) }}">
        </label>
        <br>
        <label for="user_password"><button class="inputButton">必須</button>パスワード<br>
          <input type="password" name="member_password" id="member_password" value="{{ old('member_password',$editMember->member_password) }} " placeholder="8桁以上" >
        </label>
        <br>
        <label for="member_tel"><button class="inputButton">必須</button>電話番号<br>
          <input type="text" name="member_tel" id="member_tel" value="{{ old('member_tel',$editMember->member_tel)}}" placeholder="000-0000-0000">
        </label>
        <br>
        <label for="member_postcode"><button class="inputButton">必須</button>郵便番号<br>
          <input type="text" name="member_postcode" id="member_postcode" value="{{ old('member_postcode',$editMember->member_postcode) }}" placeholder="000-0000">
        </label>
        <br>
        <label for="member_prefectures"><button class="inputButton">必須</button>都道府県<br>
          <input type="text" name="member_prefectures" id="member_prefectures" value="{{ old('member_prefectures',$editMember->member_prefectures) }}">
        </label>
        <br>
        <label for="member_city"><button class="inputButton">必須</button>市区町村<br>
          <input type="text" name="member_city" id="member_city" value="{{ old('member_city',$editMember->member_city) }}">
        </label>
        <br>
        <label for="member_address_and_building"><button class="inputButton">必須</button>番号・アパート名<br>
          <input type="text" name="member_address_and_building" id="member_address_and_building" value="{{ old('member_address_and_building',$editMember->member_address_and_building)}}">
        </label>
        <br>
        <label for="member_content"><button class="inputButton">必須</button>備考欄<br>
          <textarea name="member_content" id="member_content" cols="30" rows="10">{{ old('member_content',$editMember->member_content) }}</textarea>
        </label>
        <br>
        <input type="submit" value="再登録する。">
    </form>

@endsection