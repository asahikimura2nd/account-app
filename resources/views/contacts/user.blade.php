お問い合わせ内容

------------------------------------------------------------

会社名:{{$attributes['company']}}
氏名:{{$attributes['name']}}
電話番号:{{$attributes['tel']}}
メールアドレス:{{$attributes['email']}}
生年月日:{{$attributes['birth_date']}}
性別:{{$gender[$attributes['gender']]}}
職業:{{$job[$attributes['job']]}}
お問い合わせ内容:{!! nl2br($attributes['content']) !!}

------------------------------------------------------------
