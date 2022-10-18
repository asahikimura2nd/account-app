<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * 
     * お問い合わせ側(user)
     * 
     */
    protected $guarded = [
        'id'
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
            'responsed' => '対応済み',
        ];
        return $status[$this->status];
    }
}