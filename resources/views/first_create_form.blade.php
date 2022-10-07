<!DOCTYPE html>
<html lang="ja">
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
        @endforeach
    </div>

    <form action="{{ route('firstCreate') }}" method="POST">
        @csrf
        <input type="hidden" name="member_id" value="{{ Str::random(30) }}">
        <label for="company"><button class="inputButton">必須</button>会社名<br>
        <input class="input" type="text" name="company" id="company" value="{{ old('company') }}">
        </label>
        <br>
        <label for="name_katakana">
        <button class="inputButton">必須</button>フリガナ
        <br>
        <input class="input" type="text" name="name_katakana" id="name_katakana" value="{{ old('name_katakana') }}">
        </label>
        <br>
        <label for="email"><button class="inputButton">必須</button>メールアドレス<br>
        <input class="input" type="email" name="email" id="email" value="{{ old('email') }}">
        </label>
        <br>
        <label for="password"><button class="inputButton">必須</button>パスワード<br>
        <input class="input" type="password" name="password" id="password" value="{{ old('password') }}" placeholder="8桁以上" >
        </label>
        <br>
        <label for="tel"><button class="inputButton">必須</button>電話番号<br>
        <input  class="input" type="text" name="tel" id="tel" value="{{ old('tel')}}" placeholder="000-0000-0000">
        </label>
        <br>
        <label for="postcode"><button class="inputButton">必須</button>郵便番号<br>
        <input class="input" type="text" name="postcode" id="postcode" value="{{ old('postcode') }}" placeholder="000-0000">
        </label>
        <br>
        <label for="prefectures"><button class="inputButton">必須</button>都道府県<br>
        <select class="pref_select" name="prefectures" id="prefectures">
            <option value="">選択してください</option>
            @foreach ($prefs as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        </label>
        <br>
        <label for="city"><button class="inputButton">必須</button>市区町村
        <br>
        <input class="input" type="text" name="city" id="city" value="{{ old('city') }}">
        </label>
        <br>
        <label for="address_and_building"><button class="inputButton">必須</button>番号・アパート<br>
        <input class="input" type="text" name="address_and_building" id="address_and_building" value="{{ old('address_and_building')}}">
        </label>
        <br>
        <label for="content"><button class="inputButton">必須</button>備考欄
        <br>
        <textarea class="input" name="content" id="content" cols="80" rows="6">{{ old('content') }}</textarea>
        </label>
        <br>
        <label for="submit"><input class="submit" type="submit" value="登録する"></label>
    </form>
</body>
</html>
