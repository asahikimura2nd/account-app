<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>新規会員登録</title>
</head>
<body>
  
<div class="sessionError"> 
  @foreach ($errors->all() as $error)
 <li>{{$error}}</li>
@endforeach</div>


  <form action="{{route('firstCreate')}}" method="POST">
    @csrf
    <input type="hidden" name="member_id" value="{{Str::random(30)}}">
      <label for="member_company"><button class="inputButton">必須</button>会社名<br>
        <input class="input" type="text" name="member_company" id="member_company" value="{{ old('member_company') }}">
      </label>
      <br>
      <label for="member_name_katakana">
        <button class="inputButton">必須</button>フリガナ
        <br>
        <input class="input" type="text" name="member_name_katakana" id="member_name_katakana" value="{{ old('member_name_katakana') }}">
      </label>
      <br>
      <label for="member_email"><button class="inputButton">必須</button>メールアドレス<br>
        <input class="input" type="email" name="member_email" id="member_email" value="{{ old('member_email') }}">
      </label>
      <br>
      <label for="member_password"><button class="inputButton">必須</button>パスワード<br>
        <input class="input" type="password" name="member_password" id="member_password" value="{{ old('member_password') }}" placeholder="8桁以上" >
      </label>
      <br>
      <label for="member_tel"><button class="inputButton">必須</button>電話番号<br>
        <input  class="input" type="text" name="member_tel" id="member_tel" value="{{ old('member_tel')}}" placeholder="000-0000-0000">
      </label>
      <br>
      <label for="member_postcode"><button class="inputButton">必須</button>郵便番号<br>
        <input class="input" type="text" name="member_postcode" id="member_postcode" value="{{ old('member_postcode') }}" placeholder="000-0000">
      </label>
      <br>
      <label for="member_prefectures"><button class="inputButton">必須</button>都道府県<br>
        {{-- <input class="input" type="text" name="member_prefectures" id="member_prefectures" value="{{ old('member_prefectures') }}"> --}}
        <select class="pref_select" name="member_prefectures" id="member_prefectures">
          <option value="">選択してください</option>
          @foreach ($prefs as $pref)
          <option value="{{$pref}}">{{$pref}}</option>
          @endforeach
        </select>
      </label>
      <br>
      <label for="member_city"><button class="inputButton">必須</button>市区町村<br>
        <input class="input" type="text" name="member_city" id="member_city" value="{{ old('member_city') }}">
      </label>
      <br>
      <label for="member_address_and_building"><button class="inputButton">必須</button>番号・アパート<br>
        <input class="input" type="text" name="member_address_and_building" id="member_address_and_building" value="{{ old('member_address_and_building')}}">
      </label>
      <br>
      <label for="member_content"><button class="inputButton">必須</button>備考欄<br>
        <textarea class="input" name="member_content" id="member_content" cols="80" rows="6">{{ old('member_content') }}</textarea>
      </label>
      <br>
      <label for="submit"><input class="submit" type="submit" value="登録する"></label>

  </form>

</body>
</html>
