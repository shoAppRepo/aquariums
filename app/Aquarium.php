<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aquarium extends Model
{
    protected $fillable = ['name','address','url','content','hour','show','admission'];

    //コメントの取得
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    //おすすめ生物の取得
    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
        //ユーザのpostsを取得
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    //地域の取得
    public function areas()
    {
        return $this->belongsTo(Area::class);
    }
    
    //写真の取得
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
