<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //userテーブルのカラムを記述
    protected $fillable = [
        'name', 'email', 'password','administorator_flag','aquarium','fish'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //論理削除
    protected $table = 'users';
    protected $dates = ['deleted_at'];
    
    //ユーザのpostsを取得
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    //reviewを取得
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
   //recommendationを取得
    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}
