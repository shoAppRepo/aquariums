<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    
    protected $fillable=[
        'name'
    ];
    //水族館を取得を取得
    public function aquariums()
    {
        return $this->hasMany(Aquarium::class);
    }
}
