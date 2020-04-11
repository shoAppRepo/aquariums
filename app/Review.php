<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['content','user_id','aquarium_id','star'];
    
    //ユーザの取得
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //水族館の取得
    public function aquarium()
    {
        return $this->belongsTo(Aquarium::class);
    }
}
