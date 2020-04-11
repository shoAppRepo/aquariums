<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=[
        'aquarium_id',
    ];
    
   //水族館
    public function aquarium()
    {
        return $this->belongsTo(Aquarium::class);
    }
}
