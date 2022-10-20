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
    <form style="padding-bottom: 100px" action="{{ route('firstCreate') }}" method="POST">
        @csrf
        <label class="newstaff_form" for="company">
        <p class="required-label">必須</p>
        会社名
        <br>
        <input class="input new-input" type="text" name="company" id="company" value="{{ $user->company }}">
        </label>
        @if($errors->has('company'))
            <li class="error_message">{{ $errors->first('company') }}</li>
        @endif
        <br>
        <label class="newstaff_form" for="name_katakana">
        <p class="required-label">必須</p>フリガナ
        <br>
        <input class="input new-input" type="text" name="name_katakana" id="name_katakana" value="{{ old('name_katakana') }}">
        </label>
        @if($errors->has('name_katakana'))
            <li class="error_message">{{ $errors->first('name_katakana') }}</li>
        @endif
        <br>
        <label class="newstaff_form" for="email"><p class="required-label">必須</p>メールアドレス<br>
            <input class="input new-input" type="email" name="email" id="email" value="{{ old('email') }}">
        </label>
        @if($errors->has('email'))
            <li class="error_message">{{ $errors->first('email') }}</li>
        @endif
        <br>
        <label class="newstaff_form" for="password"><p class="required-label">必須</p>パスワード<br>
        <input class="input new-input" type="password" name="password" id="password" value="{{ old('password') }}" placeholder="8桁以上" >
        </label>
        @if($errors->has('password'))
            <li class="error_message">{{ $errors->first('password') }}</li>
        @endif
        <br>
        <label class="newstaff_form" for="tel"><p class="required-label">必須</p>電話番号<br>
        <input  class="input" type="text" name="tel" id="tel" value="{{ old('tel')}}" placeholder="000-0000-0000">
        </label>
        @if($errors->has('tel'))
            <li class="error_message">{{ $errors->first('tel') }}</li>
        @endif
        <br>
        <label class="newstaff_form" for="postcode"><p class="required-label">必須</p>郵便番号<br>
        <input class="input new-input" type="text" name="postcode" id="postcode" value="{{ old('postcode') }}" placeholder="000-0000">
        </label>
        @if($errors->has('postcode'))
            <li class="error_message">{{ $errors->first('postcode') }}</li>
        @endif
        <br>
        <label class="newstaff_form" for="prefectures"><p class="required-label">必須</p>都道府県<br>
        <select class="pref_select" name="prefectures" id="prefectures">
            <option value="">選択してください</option>
            @foreach ($prefs as $key => $value)
                <option value="{{ $key }}" {{ request()->old('prefectures') == $key ? 'selected':'' }}>{{ $value }}</option>
            @endforeach
        </select>
        </label>
        @if($errors->has('prefectures'))
            <li class="error_message">{{ $errors->first('prefectures') }}</li>
        @endif
        <br>
        <label class="newstaff_form" for="city"><p class="required-label">必須</p>市区町村
        <br>
        <input class="input new-input" type="text" name="city" id="city" value="{{ old('city') }}">
        </label>
        @if($errors->has('city'))
            <li class="error_message">{{ $errors->first('city') }}</li>
        @endif
        <br>
        <label class="newstaff_form" for="address_and_building"><div style="padding:12px 0px;"></div>番地・アパート名<br>
        <input class="input new-input" type="text" name="address_and_building" id="address_and_building" value="{{ old('address_and_building')}}">
        </label>
        <br>
        @if($errors->has('address_and_building'))
            <li class="error_message">{{ $errors->first('address_and_building') }}</li>
        @endif
        <label class="newstaff_form" for="content"><div style="padding:12px 0px;"></div>備考欄
        <br>
        <textarea class="input" name="content" id="content" cols="80" rows="6">{{ old('content') }}</textarea>
        </label>
        <br>
        <label class="newstaff_form" for="submit"><input class="submit" type="submit" value="登録する"></label>
    </form>
</body>
</html>
