<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン管理画面</title>
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/signin.css') }}">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="text-center">

    <form class="form-signin" method="POST" action="{{route('login')}}">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">ログインフォーム</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
        <div class="mt-3"></div>
        <a class="text-decoration-none" href="{{route('showFirstCreate')}}">新規会員登録</a>
        <div class="mt-5"></div>
        <button class="btn btn-info"><a class="text-decoration-none" href="{{route('form')}}">お問い合わせ</a></button>
        @if ($errors->any())
            <div class="alert alert-danger">
                <p>認証できません</p>
            </div>
        @endif
    </form>
</body>
</html>