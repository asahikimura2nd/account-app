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
}
