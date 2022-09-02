<!doctype html>
<html>

<head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
{{-- データの形で->演算子が使用できるか検討する。 --}}
    <div><h1>送信完了しました</h1></div>
    
    <div>会社名:{{$forms['user_company']}}</div>
    <div>氏名:{{$forms['user_name']}}</div>
    <div>電話番号:{{$forms['user_tel']}}</div>
    <div>メールアドレス:{{$forms['user_email']}}</div>
    <div>生年月日:{{$forms['user_birth_date']}}<</div>
    <div>性別:{{$forms['user_gender']}}<</div>
    <div>職業:{{$forms['user_job']}}<</div>
    <div>お問い合わせ内容:<br>{{$forms['user_content']}}<</div>
    {{-- <a href="{{route('send')}}"><button type="button" class="btn btn-primary">送信する。</button></a> --}}
    <a href="{{route('form')}}"><button type="button" class="btn btn-primary">戻る</button></a>
    
    <script src="{{ mix('js/app.js') }}"></script>
    
</body>
</html>


 