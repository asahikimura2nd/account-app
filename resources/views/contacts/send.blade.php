<!doctype html>
<html>
    <head>
        <meta charset='utf-8' />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        {{-- bootstrap使用 --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>送信</title>
    </head>
    <body>
        <header>
            <div class="container-fluid">
                <div class=" width-100% bg-primary text-white d-flex align-items-center justify-content-center"  style="height:50px">送信ヘッダー</div>
            </div>    
        </header>
        <div><h1 class="font-weight-bold text-center">送信完了しました</h1></div>
        <div class="mb-5 "></div>
        <div><h4 class="font-size-20 text-center">会社名:{{$contact->user_company}}</h4></div>
        <div class="mb-3 "></div>
        <div><h4 class="font-size-20 text-center">氏名:{{$contact->user_name}}</h4></div>
        <div class="mb-3 "></div>
        <div><h4 class="font-size-20 text-center">電話番号:{{$contact->user_tel}}</h4></div>
        <div class="mb-3 "></div>
        <div><h4 class="font-size-20 text-center">メールアドレス:{{$contact->user_email}}</h4></div>
        <div class="mb-3 "></div>
        <div><h4 class="font-size-20 text-center">生年月日:{{$contact->user_birth_date}}</h4></div>
        <div class="mb-3 "></div>
        <div><h4 class="font-size-20 text-center">性別:{{$contact->user_gender}}</h4></div>
        <div class="mb-3 "></div>
        <div><h4 class="font-size-20 text-center">職業:{{$contact->user_job}}</h4></div>
        <div class="mb-3 "></div>
        <div><h4 class="font-size-20 text-center">お問い合わせ内容:<br>{!! nl2br($contact->user_content) !!}</h4></div>
        <div class="mb-3 "></div>
        <div class="container">
        <div class="row">
            <div class="col text-center">
                <a href="{{route('form')}}"><button type="button" class="btn btn-primary">戻る</button></a>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>