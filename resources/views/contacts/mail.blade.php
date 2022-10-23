@component('mail::message')
お問い合せいただき誠にありがとうございます。
お問い合わせいただいた内容は下記のとおりです。
ご確認ください。
------------------------------------------------------------

会社名:{{$company}}
氏名:{{$name}}
電話番号:{{$tel}}
メールアドレス:{{$email}}
生年月日:{{$birth_date}}
性別:{{$gender}}
職業:{{$job}}
お問い合わせ内容:{!! nl2br($content) !!}

------------------------------------------------------------
@component('mail::button',['url' => 'www.google.com'])
click here
@endcomponent

もし間違いがある場合は文末の連絡先まで、ご一報ください。
よろしくお願いいたします。

< Laravel学習帳 >
@endcomponent