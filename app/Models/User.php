<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     *
     */

    use SoftDeletes;


    protected $table = 'users';

    protected $guarded = [
        'id'
    ];
    // protected $fillable = [
    //     'company',
    //     'name_katakana',
    //     'email',
    //     'password',
    //     'tel',
    //     'postcode',
    //     'prefectures',
    //     'city',
    //     'address_and_building',
    //     'content',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    // protected $date = ['deleted_at'];
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

    public function getPrefecturesTypeAttribute()
    {
        $pref = 
        ['1' => '北海道', 
        '2' => '青森県', 
        '3' => '岩手県', 
        '4' => '宮城県',
        '5' => '秋田県', 
        '6' => '山形県', 
        '7' => '福島県', 
        '8' => '茨城県',
        '9' => '栃木県', 
        '10' => '群馬県', 
        '11' => '埼玉県', 
        '12' => '千葉県',
        '13' => '東京都', 
        '14' => '神奈川県', 
        '15' => '新潟県', 
        '16' => '富山県',
        '17' => '石川県', 
        '18' => '福井県', 
        '19' => '山梨県', 
        '20' => '長野県', 
        '21' => '岐阜県', 
        '22' => '静岡県', 
        '23' => '愛知県', 
        '24' => '三重県',
        '25' => '滋賀県', 
        '26' => '京都府', 
        '27' => '大阪府', 
        '28' => '兵庫県',
        '29' => '奈良県', 
        '30' => '和歌山県', 
        '31' => '鳥取県', 
        '32' => '島根県',
        '33' => '岡山県', 
        '34' => '広島県', 
        '35' => '山口県', 
        '36' => '徳島県',
        '37' => '香川県',
        '38' => '愛媛県',
        '39' => '高知県', 
        '40' => '福岡県',
        '41' => '佐賀県', 
        '42' => '長崎県', 
        '43' => '熊本県', 
        '44' => '大分県',
        '45' => '宮崎県', 
        '46' => '鹿児島県', 
        '47' => '沖縄県'
        ];
        return $pref[$this->prefectures];
    }
    public function updateColumn()
    {
            
        return [
                'company',
                'name_katakana',
                'email',
                'tel',
                'postcode',
                'prefectures',
                'city',
                'address_and_building',
                'content',
            ];
        }
        
    }

