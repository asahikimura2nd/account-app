<!DOCTYPE html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body class="text-center">
        <header>
            <div class="admin">管理者</div>
            <div style="margin-right: 20px"><a href='{{route('logout')}}'>ログアウト</a></div>
        </header>  
        <main>

            <aside class="sideBar" id="sideBar">
                <div class="sideContents">
                    <div class="hambarger"><img src="{{ asset('images/menu50.png') }}" alt="hambarger" class="menuIcon" id="hambarger"></div>
                    <div class="home">
                        <a href="{{ route('home') }}">
                            <div><img src="{{ asset('images/home50.png') }}" alt="home" class="homeIcon"></div>
                            <div class="items">ホーム</div>
                        </a>
                    </div>
                    <div class="members">
                        <a href="{{ route('showUser') }}">
                            <div><img src="{{ asset('images/component48.png') }}" alt="members" class="membersIcon"></div>
                            <div class="items">会員登録</div>
                        </a>
                    </div>
                    <div class="contact">
                        <a href="{{route('showContacts')}}">
                            <div><img src="{{asset('images/component48.png')}}" alt="contact" class="membersIcon"></div>
                            <div class="items">お問い合わせ一覧</div>
                        </a>
                    </div>
                </div>     
                <div style="margin-top: 200px"></div>
            </aside>
            <div class="@yield('mainContainer')"style="padding-bottom: 100px" id="mainContainer">
                @yield('search')   
                <div class="mainTitle">@yield('style')<h1>@yield('mainTitle')</h1>
                <div>@yield('session')</div>
                <div>@yield('newCreate')</div>
                </div>        
                <div class="backImage" >
                <div class="innerContainer">
                    @yield('content')
                </div>
                </div>
            </div>  
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{asset('js/menu.js')}}"></script>
        <script src="{{asset('js/init.js')}}"></script>
    </body>
</html>