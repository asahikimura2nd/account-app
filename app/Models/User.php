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

    protected $table = 'users';

    protected $fillable = [
        //管理者
        //会員一覧
        'member_id',
        'name',
        'email',
        'password',
        'tel',
        'prefectures',
        'city',
        'address_and_building',
        //詳細
        'company',
        'name_katakana',
        'password',
        'postcode',
        'content',
    ];

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
    public function getAuthPassword()
{
    return $this->password;
}
}
