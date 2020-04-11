<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable = ['content','user_id'];
    
    //ユーザの取得
    public function user()
    {
        return $this->belongsTo(User::class)->withTimestamps();
    }
}
