<!doctype html>
<html>

<head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    {{-- bootstrap使用 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class=" width-100% bg-primary text-white d-flex align-items-center justify-content-center"  style="height:50px">確認用ヘッダー</div>
        </div>    
        <div class="mb-5 "></div>
    </header>

    <main >
        <div class=" mb-5 "><h3 class="font-weight-bold text-center">会社名:{{$forms->user_company}}</h3></div>
 
        <span class="border-top"></span>
        <div class="mb-5"><h3 class="font-weight-bold text-center">氏名:{{$forms->user_name}}</h3></div>
        <div class="mb-5"><h3 class="font-weight-bold text-center">電話番号:{{$forms->user_tel}}</h3></div>
        <div class="mb-5"><h3 class="font-weight-bold text-center">メールアドレス:{{$forms->user_email}}</h3></div>
        <div class="mb-5"><h3 class="font-weight-bold text-center">生年月日:{{$forms->user_birth_date}}</h3></div>
        <div class="mb-5"><h3 class="font-weight-bold text-center">性別:{{$forms->user_gender}}</h3></div>
        <div class="mb-5"><h3 class="font-weight-bold text-center">職業:{{$forms->user_job}}</h3></div>
        <div class="mb-5"><h3 class="font-weight-bold text-center">お問い合わせ内容:<br>{!! nl2br(($forms->user_content)) !!}</h3></div>
       
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <a href="{{route('send',$forms['id'])}}"><button type="button" class="text-center btn btn-success">送信する</button></a>
                    <a href="{{route('formEdit',$forms->id)}}"><button type="button" class="text-center btn btn-primary">戻る</button></a>
                </div>
            </div>
        </div>
    </main>
    
    <script src="{{ mix('js/app.js') }}"></script>
    <div class="mb-5 "></div>
</body>
</html>


 