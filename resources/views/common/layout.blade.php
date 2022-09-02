<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body class="text-center">
  <header>
    <div class="admin"><span>管理者：{{Auth::user()->admin_email}}</span>
      <form action="{{route('logout')}}" method="POST" class="logoutForm">
        @csrf
        <button class="logoutButton" type="submit">ログアウト</button>
      </form>
    </div>
  </header>  

  <main>
    <div class="sideBar" id="sideBar" >
      <div>
        <div class="hambarger"><img src="{{asset('images/menu50.png')}}" alt="hambarger" class="menuIcon" id="hambarger"></div>
        <div class="home">
          <a href="{{route('home')}}">
            <div><img src="{{asset('images/home50.png')}}" alt="home" class="homeIcon"></div>
            <div class="items">ホーム</div>
          </a>
        </div>
        
        <div class="members">
            <a href="{{route('showUser')}}">
                <div><img src="{{asset('images/component48.png')}}" alt="members" class="membersIcon"></div>
                <div class="items">会員登録</div>
            </a>
        </div>
      
        <div class="contact">
          <a href="{{route('showContacts')}}"><div><img src="{{asset('images/component48.png')}}" alt="contact" class="membersIcon"></div>
           <div class="items">お問い合わせ一覧</div>
          </a>
        </div>
      </div>
    </div>
 
    <div class="mainContainer" id="mainContainer">   
      <div class="title"><h1>@yield('main')</h1>
        <div class="newCreate">@yield('newCreate')</div>
      </div>      
      
      <div class="backImage">

          <div class="innerContainer">
            <div>@yield('content')  </div>
          </div>
          
      </div>
    </div>  
  </main>


	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{asset('js/menu.js')}}"></script>
</body>
</html>