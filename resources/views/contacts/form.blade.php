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
    
    <form action="{{ route('confirm') }}" method="POST">
    @csrf

    <input type="hidden" name="user_random_id" value="{{Str::random(30);}}">
    <div class="container">
        <div class="row">
            <div class="col-md-2 border border-dark ">必須</div>
            <div class="col-md-4 border border-dark">会社名</div>
            <div class="col-md-6 border border-dark"><input type="text" name="user_company" id="user_company">
                @if($errors->has('user_company'))
                <div>{{$errors->first('user_company')}}</div>
                @endif
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-2 border border-dark ">必須</div>
            <div class="col-md-4 border border-dark">氏名</div>
            <div class="col-md-6 border border-dark"><input type="text" name="user_name" id="user_name">
                @if($errors->has('user_name'))
                <div>{{$errors->first('user_name')}}</div>
                @endif   
            </div>
                 
        </div>
         <div class="row">
            <div class="col-md-2 border border-dark ">必須</div>
            <div class="col-md-4 border border-dark">電話番号</div>
            <div class="col-md-6 border border-dark"><input type="text" name="user_tel" id="user_name" placeholder="000-0000-0000">
                @if($errors->has('user_tel'))
                <div>{{$errors->first('user_tel')}}</div>
                @endif
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-2 border border-dark ">必須</div>
            <div class="col-md-4 border border-dark">メールアドレス</div>
            <div class="col-md-6 border border-dark"><input type="text" name="user_email" id="user_email">
                @if($errors->has('user_email'))
                <div>{{$errors->first('user_email')}}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 border border-dark ">必須</div>
            <div class="col-md-4 border border-dark">生年月日</div>
            <div class="col-md-6 border border-dark"><input type="date" name="user_birth_date" id="user_birth_date">
                @if($errors->has('user_birth_date'))
                <div>{{$errors->first('user_birth_date')}}</div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 border border-dark ">必須</div>
            <div class="col-md-4 border border-dark">性別</div>
            <div class="col-md-6 border border-dark">
                <label for="gender" class="col-sm-2 col-form-label"><input type="radio" name="user_gender" value="男" id="user_gender">男</label>
                <label for="gender" class="col-sm-2 col-form-label"><input type="radio" name="user_gender" value="女" id="user_gender">女</label>
                @if($errors->has('user_gender'))
                <div>{{$errors->first('user_gender')}}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 border border-dark ">必須</div>
            <div class="col-md-4 border border-dark">職業</div>
            <div class="col-md-6 border border-dark">
                <select name="user_job" id="user_job">
                    <option value="">職業を選択してください</option>
                    <option value="セキュリティエンジニア">セキュリティエンジニア</option>
                    <option value="電気工事士">電気工事士</option>
                    <option value="建築士">建築士</option>
                </select>
                @if($errors->has('user_job'))
                <div>{{$errors->first('user_job')}}</div>
                @endif
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-2 border border-dark ">必須</div>
            <div class="col-md-4 border border-dark">お問い合わせ内容 </div>
             <div class="col-md-6 border border-dark"><textarea name="user_content" id="user_content" cols="30" rows="10"></textarea>
                @if($errors->has('user_content'))
                <div>{{$errors->first('user_content')}}</div>
                @endif
            </div>
        </div>
        
        <input type="submit" value="送信する">
    </div>
    
</form>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>