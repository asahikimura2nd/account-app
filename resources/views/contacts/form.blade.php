<!doctype html>
<html>

<head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    {{-- bootstrap使用 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>お問い合わせ</title>
</head>

<body> 

    <header>
        <div class="container-fluid">
            <div class=" width-100% bg-primary text-white d-flex align-items-center justify-content-center"  style="height:50px">お問い合わせフォームヘッダー</div>
        </div>    
    </header>
    <div class="mb-5 "></div>

    <main>
        <div class="container-fluid justify-content-center" >
        <form action="{{ route('confirm') }}" method="POST">
            @csrf
            
            <input type="hidden" name="user_random_id" value="{{Str::random(30);}}">

            <div class="form-group row">
                <label for="user_company" class="col-sm-4 col-form-label"><div type="button" class="btn btn-success" >必須</div>会社名</label>
                <div class="col-sm-5">
                    <input  class="form-control" type="text" name="user_company"  id="user_company" value="{{old("user_company")}}" placeholder="株式会社〇〇" > 
                </div>
            </div>
                    
            @if($errors->has('user_company'))
             <div class="text-danger">{{ $errors->first('user_company')}}</div>
            @endif
        
            <div class="mb-5 "></div>             
        
            <div class="form-group row">
                <label for="user_name" class="col-sm-4 col-form-label"><div type="button" class="btn btn-success">必須</div>氏名</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="user_name" id="user_name" placeholder="山田 太郎" value="{{old("user_name")}}">
                </div>
            </div>

            @if($errors->has('user_name'))
                <div class="text-danger">{{$errors->first('user_name')}}</div>
            @endif   
          
            <div class="mb-5 "></div>
                         
        
            <div class="form-group row">
                <label for="user_tel" class="col-sm-4 col-form-label"><div type="button" class="btn btn-success" >必須</div>電話番号</label>
                <div class="col-sm-5">         
                    <input class="form-control" type="text" name="user_tel" id="tel" placeholder="000-0000-0000" value="{{old("user_tel")}}">
                </div>
            </div>
             @if($errors->has('user_tel'))
                <div class="text-danger">{{$errors->first('user_tel')}}</div>
            @endif
            <div class="mb-5 "></div>           
                    
            <div class="form-group row">
                <label for="user_email" class="col-sm-4 col-form-label"><div type="button" class="btn btn-success">必須</div>メールアドレス</label>
                <div class="col-sm-5">   
                    <input class="form-control" type="text" name="user_email" id="user_email" placeholder="example@gmail.com" value="{{old("user_email")}}">
                </div>
            </div>

             @if($errors->has('user_email'))
                <div class="text-danger">{{$errors->first('user_email')}}</div>
            @endif
            <div class="mb-5 "></div>         
                
             <div class="form-group row">
                <label for="user_birth_date" class="col-sm-4 col-form-label"><div type="button" class="btn btn-success" placeholder="yyyy/mm/dd">必須</div>生年月日</label>
                <div class="col-sm-5">
                    <input class="form-control" type="date" name="user_birth_date" id="user_birth_date" value="{{old("user_birth_date")}}">
                </div>
            </div>

            @if($errors->has('user_birth_date'))
                <div class="text-danger">{{$errors->first('user_birth_date')}}</div>
            @endif
            <div class="mb-5 "></div>

            <div type="button" class="btn btn-success col-form-label">必須</div> 性別
            <label for="hidden" class="col-sm-4 col-form-label"></label>
            <div class="form-check-inline ">
                <input class="form-check-input " type="radio" name="user_gender" id="user_gender" value="男" {{old('user_gender') === '男' ? 'checked':''}}>
                <label class="form-check-label " for="user_gender">男</label>
            </div>
            <div class="form-check-inline col-sm-2 col-form-label">
                <input class="form-check-input" type="radio" name="user_gender" id="user_gender" value="女" {{ old('user_gender') === '女' ? 'checked' : '' }}>
                <label class="form-check-label" for="user_gender">女</label>
            </div>
        
             @if($errors->has('user_gender'))
                <div class="text-danger">{{$errors->first('user_gender')}}</div>
            @endif
            <div class="mb-5 "></div>
            <div class="col-sm-2 col-form-label" ></div>


            
            <div type="button" class="btn btn-success col-form-label">必須</div> 職業
            <div class="col-sm-2 col-form-label" ></div>

                <select name="user_job" class="form-group row form-select col-sm-1 col-form-label" aria-label="職業を選択してください" id="user_job" >
                    <option value="">職業を選択してください</option>
                    <option value="セキュリティエンジニア"  @if(old('user_job') === 'セキュリティエンジニア') selected @endif>セキュリティエンジニア</option>
                    <option value="電気工事士" @if(old('user_job') === '電気工事士') selected @endif>電気工事士</option>
                    <option value="建築士" @if(old('user_job') === '建築士') selected @endif>建築士</option>
                </select>
            
                 @if($errors->has('user_job'))
                    <div class="text-danger">{{$errors->first('user_job')}}</div>
                 @endif
                 <div class="col-sm-2 col-form-label" ></div>
                 <div class="mb-5 "></div>              
               
                
                 <div class="form-group row">
                    <label for="user_content" class="col-sm-4 col-form-label"><div type="button" class="btn btn-success" >必須</div>お問い合わせ内容</label>
                    <div class="col-sm-5"><textarea class="form-control" name="user_content" id="user_content" cols="30" rows="10">{{old('user_content')}} 
                        </textarea>
                    </div>
                </div>

                @if($errors->has('user_content'))
                    <div class="text-danger">{{$errors->first('user_content')}}</div>
                @endif
                    
                <div class="mb-5 "></div>         
                
                <input type="submit" class="btn btn-primary" value="送信する">
                <div class="mb-5"></div>
            </div>
            
        </form>
        </div>
    </main>
    
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>