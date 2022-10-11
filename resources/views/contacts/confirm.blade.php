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
        <form action="{{route('send')}}" method="POST">
            @csrf
            <input type="hidden" name="status" value="no_response">
            <input type="hidden" name="company" value="{{ $contact->company }}">
            <div class=" mb-5 "><h3 class="font-weight-bold text-center">会社名:{{ $contact->company }}</h3></div>
            <input type="hidden" name="name" value="{{ $contact->name }}">
            <span class="border-top"></span>
            <div class="mb-5"><h3 class="font-weight-bold text-center">氏名:{{ $contact->name }}</h3></div>
            <input type="hidden" name="tel" value="{{ $contact->tel }}">
            <div class="mb-5"><h3 class="font-weight-bold text-center">電話番号:{{ $contact->tel }}</h3></div>
            <input type="hidden" name="email" value="{{ $contact->email }}">
            <div class="mb-5"><h3 class="font-weight-bold text-center">メールアドレス:{{ $contact->email }}</h3></div>
            <input type="hidden" name="birth_date" value="{{ $contact->birth_date }}">
            <div class="mb-5"><h3 class="font-weight-bold text-center">生年月日:{{ $contact->birth_date }}</h3></div>
            <input type="hidden" name="gender" value="{{ $contact->gender }}">
            <div class="mb-5"><h3 class="font-weight-bold text-center">性別:{{ $gender[$contact->gender] }}</h3></div>
            <input type="hidden" name="job" value="{{ $contact->job }}">
            <div class="mb-5"><h3 class="font-weight-bold text-center">職業:{{ $job[$contact->job] }}</h3></div>
            <input type="hidden" name="content" value="{{ $contact->content }}">
            <div class="mb-5"><h3 class="font-weight-bold text-center">お問い合わせ内容:<br>{!! nl2br(($contact->content)) !!}</h3></div>
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <input type="submit"  class="btn btn-success col-form-label" value="送信する">
                        <input type="button"  class="btn btn-success col-form-label" onclick="history.back()" value="戻る">
                    </div>
                </div>
            </div>
        </form>
    </main>
    
    <script src="{{ mix('js/app.js') }}"></script>
    <div class="mb-5 "></div>
</body>
</html>