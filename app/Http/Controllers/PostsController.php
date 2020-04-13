<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Aquarium;
use App\Review;
use App\Recommendation;
use Auth;
use Storage;
//画像リサイズ用↓
use InterventionImage;

class PostsController extends Controller
{
    
    //投稿選択画面に移動
    public function select($id){
        $aquarium=Aquarium::find($id);
        
        return view('/posts/select',compact('aquarium'));
    }
    
    //コメント投稿画面に移動
    public function review($id){
        $aquarium = Aquarium::find($id);
        $review = new Review;
        
        return view('/posts/review',['aquarium'=>$aquarium],['review'=>$review]);
    }
    
    //おすすめ生物投稿画面に移動
    public function recommendation($id){
        $aquarium = Aquarium::find($id);
        $recommendation = new Recommendation;
        
        return view('/posts/recommendation',['aquarium'=>$aquarium],['recommendation'=>$recommendation]);
    }
    
    //コメント投稿
    public function post_review(Request $request, $id){
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);
        
        $user = Auth::user();
        $aquarium = Aquarium::find($id);
        $review = new Review;
        
        $review->user_id = $user->id;
        $review->aquarium_id = $aquarium->id;
        $review->star = $request->star;
        $review->content = $request->content;
        
        $review->save();
        
        return redirect('aquariums/'.$id.'/show');
        //redirectはviewに無いところに飛ぶため
        //return viewは、viewページとして作成してあるところに飛ぶ
    }
    
    //コメント削除
    public function review_destroy($id){
        $review = Review::find($id);
        
        if(\Auth::id() === $review->user_id){
            $review->delete();
        }
        
        return back();
    }
    
    //おすすめ生物投稿
    public function post_recommendation(Request $request, $id){
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);
        
        $user = Auth::user();
        $aquarium = Aquarium::find($id);
        $recommendation = new Recommendation;
        
        
        $image = $request->file('file');
        //拡張子取得
        $extension = $image->getClientOriginalExtension();
        $name = $image->getClientOriginalName();
        //リサイズしてエンコード
        $imageResize = InterventionImage::make($image)->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
        $imageEncode = $imageResize->encode($extension);
        //url+ファイル名,リサイズした画像,アクセス種類？
        $path = Storage::disk('s3')->put('/recommendation_images/'.$name,(string)$imageEncode,'public');
        $url = Storage::disk('s3')->url('recommendation_images/'.$name);
        //urlがいまいちわからない


        $recommendation->user_id = $user->id;
        $recommendation->aquarium_id = $aquarium->id;
        $recommendation->name = $request->name;
        $recommendation->content = $request->content;
        $recommendation->image_path = $url;
        
        $recommendation->save();
        
        return redirect('aquariums/'.$id.'/recommendations');
        //redirectはviewに無いところに飛ぶため
        //return viewは、viewページとして作成してあるところに飛ぶ
    }
    
    //おすすめ生物削除
    public function recommendation_destroy($id){
        $recommendation = Recommendation::find($id);
        
        if(\Auth::id() === $recommendation->user_id){
            $recommendation->delete();
        }
        
        return back();
    }
}
