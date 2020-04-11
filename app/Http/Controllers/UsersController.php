<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Review;
use App\Recomendation;
use Auth;

class UsersController extends Controller
{   
    //reviews履歴
    public function show($id)
    {
        $user = User::find($id);
        $reviews = $user->reviews()->orderBy('created_at','desc')->paginate(3);
        
        $data=[
            'user'=>$user,
            'reviews'=>$reviews,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show',$data);
    }
    
    //recommendations履歴
    public function recommendations($id)
    {
        $user = User::find($id);
        $recommendations = $user->recommendations()->orderBy('created_at','desc')->paginate(3);
        
        $data=[
            'user'=>$user,
            'recommendatins'=>$recommendations,
        ];
        
        $data += $this->counts($user);
        
        return view('users.recommendation_history',$data);
    }
    
    //退会画面に移動
    public function delete(){
        return view('users.delete');
    }
    
    //退会処理
    public function destroy(){
        $id = Auth::id();
        $user = User::find($id);
        $user->delete();

        return view('users.delete_complete');
    }
}
