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
        'company',
        'name',
        'tel',
        'email',
        'birth_date',
        'gender',
        'job',
        'content',
        //対応状況
        'status',
        //お問い合わせ備考            
        'remarks',    
    ];

    public function jobContact()
    {
        $jobs = [
            'セキュリティエンジニア' => 'engineer',
            '電気工事士' => 'electricalWorker',
            '建築士' => 'Architect'
        ];
        return $jobs;
    }

    public function getGenderTypeAttribute()
    {
        $gender = [
            'male' => '男性',
            'female' => '女性',
        ];
        return $gender[$this->gender];
    }

    public function getJobTypeAttribute()
    {
        $job = [
            'engineer' => 'セキュリティエンジニア',
            'electricalWorker' => '電気工事士',
            'Architect' => '建築士'
        ];
        return $job[$this->job];
    }

    public function getStatusTypeAttribute()
    {
        $status = [
        'no_response' => '未対応',
        'now_response' => '対応中',
        'responsed' => '対済み',
        ];
        return $status[$this->status];
    }
}