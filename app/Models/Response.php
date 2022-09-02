<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Response extends Model
{
    use HasFactory;
    protected $fillable = [        
        //対応状況
        'status',
        //お問い合わせ備考
        'remarks'];
        
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
