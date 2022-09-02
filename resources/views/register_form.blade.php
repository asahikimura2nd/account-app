<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登録画面</title>
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/signin.css') }}">

    <!-- CSS only -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
</head>
<body class="text-center">

    <form class="form-signin" method="POST" action="{{route('register')}}">
      @csrf
        <input type="hidden" name="member_id" value="{{null}}">
        <h1 class="h3 mb-3 font-weight-normal">管理者登録フォーム</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="admin_email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <label for="inputPassword" class="sr-only">ConfirmPassword</label>
        <input type="password" id="inputPassword" name="confirmPassword" class="form-control" placeholder="ConfirmPassword" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登録</button>

        {{-- @if(session('register_error'))
        <div>{{session('register_error')}}</div>
        @endif --}}
    </form> 
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


</body>
</html>