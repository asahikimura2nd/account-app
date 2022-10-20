<!DOCTYPE html>
    <html lang="ja">
    <head>
    <meta charset='utf-8' />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
    </head>
    <body >
        <header>
            <div class="container-fluid">
                <div class=" width-100% bg-primary text-white d-flex align-items-center justify-content-center"  style="height:50px">@yield('header')</div>
            </div>    
            <div class="mb-5 "></div>
        </header>  
        <main>
            @yield('main')
        </main>
    </body>
</html>