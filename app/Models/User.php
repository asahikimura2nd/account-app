<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Database\Factories\Administration\MemberFactory;
use App\Models\Contact;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     *
     */


    protected $fillable = [
        //管理者
        'admin_email',
        'password',
        //会員一覧
        'member_id',
        'member_name',
        'member_email',
        'member_tel',
        'member_prefectures',
        'member_city',
        'member_address_and_building',
        //詳細
        'member_company',
        'member_name_katakana',
        'member_password',
        'member_postcode',
        'member_content',
        //対応状況
        'status',
        //お問い合わせ備考
        'remarks'
    ];
    
    // https://nogson2.hatenablog.com/entry/2019/09/29/213202
    // https://qiita.com/naoya-11/items/3d9f04f661a572020df0
    // https://biz.addisteria.com/relation_exception/
    
    //Contactモデルと紐づけ
    public function contacts(){
        return $this->hasMany(Contact::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
