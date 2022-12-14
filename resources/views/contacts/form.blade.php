@extends('common.contactsLayout')
        
@section('title','お問い合わせ')

@section('header','お問い合わせフォームヘッダー')

@section('main')
    <div class="container-fluid justify-content-center " >
        <form action="{{ route('confirm') }}" method="POST">
            @csrf          
            <input type="hidden" name="status" value="no_response">
            <div class="form-group row">
                <label for="company" class="col-sm-4 col-form-label"><div type="button" class="btn btn-success">必須</div>会社名</label>
                <div class="col-sm-5">
                    <input  class="form-control" type="text" name="company"  id="company" value="{{ old("company") }}" placeholder="株式会社〇〇" > 
                </div>
            </div>        
            @if($errors->has('company'))
                <div class="text-danger">{{ $errors->first('company') }}</div>
            @endif
            <div class="mb-5 "></div>             
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label"><div type="button" class="btn btn-success">必須</div>氏名</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="name" id="name" placeholder="山田 太郎" value="{{ old("name") }}">
                </div>
            </div>
            @if($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
            @endif   
            <div class="mb-5 "></div>                 
            <div class="form-group row">
                <label for="tel" class="col-sm-4 col-form-label"><div type="button" class="btn btn-success" >必須</div>電話番号</label>
                <div class="col-sm-5">         
                    <input class="form-control" type="text" name="tel" id="tel" placeholder="000-0000-0000" value="{{ old("tel") }}">
                </div>
            </div>
            @if($errors->has('tel'))
                <div class="text-danger">{{$errors->first('tel')}}</div>
            @endif
            <div class="mb-5 "></div>                   
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label"><div type="button" class="btn btn-success">必須</div>メールアドレス</label>
                <div class="col-sm-5">   
                    <input class="form-control" type="text" name="email" id="email" placeholder="example@gmail.com" value="{{old("email")}}">
                </div>
            </div>
            @if($errors->has('email'))
                <div class="text-danger">{{$errors->first('email')}}</div>
            @endif
            <div class="mb-5 "></div>         
            <div class="form-group row">
                <label for="birth_date" class="col-sm-4 col-form-label"><div type="button" class="btn btn-success" >必須</div>生年月日</label>
                <div class="col-sm-5">
                    <input class="form-control" placeholder="yyyy/mm/dd" type="text" name="birth_date" id="birth_date" value="{{old("birth_date")}}">
                </div>
            </div>
            @if($errors->has('birth_date'))
                <div class="text-danger">{{$errors->first('birth_date')}}</div>
            @endif
            <div class="mb-5 "></div>
            <label for="gender_m" type="button" class="btn btn-success col-form-label">必須</label> <label for="gender_m">性別</label>
            <label for="hidden" class="col-sm-4 col-form-label"></label>
            <div class="form-check-inline ">
                <input class="form-check-input " type="radio" name="gender" id="gender_m" value="male" {{old('gender') === 'male' ? 'checked':''}}>
                <label class="form-check-label " for="gender_m">男</label>
            </div>
            <div class="form-check-inline col-sm-2 col-form-label">
                <input class="form-check-input" type="radio" name="gender" id="gender_w" value="female" {{ old('gender') === 'female' ? 'checked' : '' }}>
                <label class="form-check-label" for="gender_w">女</label>
            </div>
            @if($errors->has('gender'))
                <div class="text-danger">{{$errors->first('gender')}}</div>
            @endif
            <div class="mb-5 "></div>
            <div class="col-sm-2 col-form-label" ></div>            
            <label for="job" type="button"  class="btn btn-success col-form-label">必須</label> <label for="job">職業</label>
            <div class="col-sm-2 col-form-label" ></div>
                <select name="job" class="form-group row form-select col-sm-1 col-form-label" aria-label="職業を選択してください" id="job" >
                    <option id="job" value="">職業を選択してください</option>
                    @foreach($jobArray as $key => $value)
                        <option value="{{ $key }}" {{ request()->old('job') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @if($errors->has('job'))
                    <div class="text-danger">{{ $errors->first('job') }}</div>
                @endif
                
            <div class="col-sm-2 col-form-label" ></div>
            <div class="mb-5 "></div>              
            <div class="form-group row">
                <label for="content" class="col-sm-4 col-form-label">
                <div type="button" class="btn btn-success" >必須</div>お問い合わせ内容</label>
                <div class="col-sm-5">
                    <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{old('content')}} </textarea>
                </div>
            </div>
            @if($errors->has('content'))
                <div class="text-danger">{{ $errors->first('content') }}</div>
            @endif    
            <div class="mb-5 "></div>         
            <input type="submit" class="btn btn-primary" value="送信する">
            <div class="mb-5 "></div>
            <input type="text" id = 'cal'>
        </form>

    </div>
    <div class="mb-5 "></div>
    <script>
        $('#birth_date').datepicker();
    </script>
@endsection
