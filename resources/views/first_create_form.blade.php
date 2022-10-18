<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>新規会員登録</title>
</head>
<body>
    <div class="sessionError"> 
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>

    <form action="{{ route('firstCreate') }}" method="POST">
        @csrf
        <label class="newstaff_form" for="company">
        <p class="required-label">必須</p>
        会社名
        <br>
        <input class="input new-input" type="text" name="company" id="company" value="{{ old('company') }}">
        </label>
        <br>
        <label class="newstaff_form" for="name_katakana">
        <p class="required-label">必須</p>フリガナ
        <br>
        <input class="input new-input" type="text" name="name_katakana" id="name_katakana" value="{{ old('name_katakana') }}">
        </label>
        <br>
        <label class="newstaff_form" for="email"><p class="required-label">必須</p>メールアドレス<br>
            <input class="input new-input" type="email" name="email" id="email" value="{{ old('email') }}">
        </label>
        <br>
        <label class="newstaff_form" for="password"><p class="required-label">必須</p>パスワード<br>
        <input class="input new-input" type="password" name="password" id="password" value="{{ old('password') }}" placeholder="8桁以上" >
        </label>
        <br>
        <label class="newstaff_form" for="tel"><p class="required-label">必須</p>電話番号<br>
        <input  class="input" type="text" name="tel" id="tel" value="{{ old('tel')}}" placeholder="000-0000-0000">
        </label>
        <br>
        <label class="newstaff_form" for="postcode"><p class="required-label">必須</p>郵便番号<br>
        <input class="input new-input" type="text" name="postcode" id="postcode" value="{{ old('postcode') }}" placeholder="000-0000">
        </label>
        <br>
        <label class="newstaff_form" for="prefectures"><p class="required-label">必須</p>都道府県<br>
        <select class="pref_select" name="prefectures" id="prefectures">
            <option value="">選択してください</option>
            @foreach ($prefs as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        </label>
        <br>
        <label class="newstaff_form" for="city"><p class="required-label">必須</p>市区町村
        <br>
        <input class="input new-input" type="text" name="city" id="city" value="{{ old('city') }}">
        </label>
        <br>
        <label class="newstaff_form" for="address_and_building"><p class="required-label">必須</p>番号・アパート<br>
        <input class="input new-input" type="text" name="address_and_building" id="address_and_building" value="{{ old('address_and_building')}}">
        </label>
        <br>
        <label class="newstaff_form" for="content"><p class="required-label">必須</p>備考欄
        <br>
        <textarea class="input" name="content" id="content" cols="80" rows="6">{{ old('content') }}</textarea>
        </label>
        <br>
        <label class="newstaff_form" for="submit"><input class="submit" type="submit" value="登録する"></label>
    </form>
</body>
</html>
