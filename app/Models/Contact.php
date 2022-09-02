<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class Contact extends Model
{
    use HasFactory;
         /**
         * 
         * お問い合わせ側(user)
         * 
         */
        protected $fillable =[
        'user_id',
        // 'response_id',
        'user_random_id',
        'user_company',
        'user_name',
        'user_tel',
        'user_email',
        'user_birth_date',
        'user_gender',
        'user_job',
        'user_content'];
    //参照先モデル（User）への紐付け
        public function user(){
            return $this->belongsTo(User::class);
        }
        protected static function boot()
        {
            parent::boot();
    
        // 保存時user_idをログインユーザーに設定
        // https://qiita.com/yyy752/items/d75f329d04e724e9d714
            self::saving(function($stock) {
                $stock->user_id = Auth::id();
            });
        }
}
