<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Contact extends Model
{
    use HasFactory;
        /**
         * 
         * お問い合わせ側(user)
         * 
         */
    protected $fillable =[
        'user_random_id',
        'user_company',
        'user_name',
        'user_tel',
        'user_email',
        'user_birth_date',
        'user_gender',
        'user_job',
        'user_content',
        //対応状況
        'status',
        //お問い合わせ備考            
        'remarks',    
    ];

    public function jobContact()
    {
        $jobs = [
            'セキュリティエンジニア'=>'engineer',
            '電気工事士'=>'electricalWorker',
            '建築士'=>'Architect'
        ];
        return $jobs;
    }

    public function gender($select)
    {
        if($select === 'male'){
            $select = '男性';
        } else {
            $select = '女性';
        };
        return $select;
    }

    public function job($select)
    {
        if($select === 'engineer'){
            $select = 'セキュリティエンジニア';
        } else if($select === 'electricalWorker') {
            $select = '電気工事士';
        } else {
            $select = '建築士';
        }
        return $select;
    }

    public function status(){
        $status = [
            '未対応'=>'no_response',
            '対応中'=>'now_response',
            '未対済み'=>'responsed',
        ];
        return $status;
    }
}