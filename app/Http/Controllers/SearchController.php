<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aquarium;

class SearchController extends Controller
{
    public function index(Request $request){
        
        $query = Aquarium::query();
        $search = $request->input('search');
        
        
        $query->where('name', 'like', '%'.$search.'%')->get();
        $data = $query->orderBy('created_at','desc')->paginate(10);;
        return view('search.index', compact('data', 'search'));
    }
}
