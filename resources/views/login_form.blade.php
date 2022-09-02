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
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
</head>
<body class="text-center">
  
    <form class="form-signin" method="POST" action="{{route('login')}}">
      @csrf
        <h1 class="h3 mb-3 font-weight-normal">ログインフォーム</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="admin_email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        {{-- <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> --}}
        <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        {{-- ログイン失敗 --}}
    @if(session('login_error'))
    <div>{{session('login_error')}}</div>
  @endif
       {{-- 登録成功 --}}
  @if(session('register_success'))
  <div>{{session('register_success')}}</div>
  @endif
        {{-- ログアウト --}}
  @if(session('logout'))
  <div>{{session('logout')}}</div>
  @endif
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
              {{-- 管理者登録画面 --}}
      <a href="{{route('showRegister')}}">新規登録</a>
      <br>
      <br>
      <a href="{{route('form')}}">お問い合わせへ</a> 

  </form>



</body>
</html>