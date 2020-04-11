<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
        public function counts($aquarium){
        $count_aquarium_reviews = $aquarium->reviews()->count();
        $count_aquarium_recommendations = $aquarium->recommendations()->count();
        
        return[
            'count_aquarium_reviews'=>$count_aquarium_reviews,
            'count_aquarium_recommendations'=>$count_aquarium_recommendations,
        ];
    }
}
