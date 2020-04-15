<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Area;
use App\Aquarium;
use App\Image;
//画像リサイズ用↓
use InterventionImage;

class AquariaController extends Controller
{
    //水族館取得
    public function index($id){
        $area=Area::find($id);
        $aquariums=$area->aquariums()->orderBy('created_at','desc')->paginate(12);

        return view('aquariums.index',compact('aquariums'));
    }
    
    public function show($id){
        //aquariumsのレビュー取得
        $aquarium = Aquarium::find($id);
        $reviews = $aquarium->reviews()->orderBy('created_at','desc')->paginate(3);
        $avg_star = floor(\App\Review::avg('star'));
        $images = $aquarium->images()->get();
        $stars = $reviews->pluck('star');
        $avg_star = $stars->avg();
        
        
        $data=[
            'aquarium'=>$aquarium,
            'reviews'=>$reviews,
            'images' => $images,
            'avg_star' => $avg_star,
        ];
        
        $data += $this->counts($aquarium);
        
        
        return view('aquariums.show',$data);
        
    }
    
    public function recommendations($id){
        //aquariumsのおすすめ生物取得
        $aquarium = Aquarium::find($id);
        $reviews = $aquarium->reviews()->orderBy('created_at','desc')->paginate(3);
        $recommendations = $aquarium->recommendations()->orderBy('created_at','desc')->paginate(3);
        $images = $aquarium->images()->get();
        
        $stars = $reviews->pluck('star');
        $avg_star = $stars->avg();
        
        $data=[
            'aquarium'=>$aquarium,
            'recommendations'=>$recommendations,
            'images'=>$images,
            'avg_star'=>$avg_star,
        ];
        
        $data += $this->counts($aquarium);
        
        
        return view('aquariums.recommendations',$data,['images'=>$images]);
    }
    
    public function create($id){
        $aquarium=new Aquarium;
        
        return view('aquariums.create',compact('aquarium'));
    }
    
    //水族館の新規追加
    public function store(Request $request){

        
        $aquarium = new Aquarium;
        
        $aquarium->name = $request->name;
        $aquarium->hour = $request->hour;
        $aquarium->admission = $request->admission;
        $aquarium->address = $request->address;
        $aquarium->url = $request->url;
        $aquarium->show = $request->show;
        $aquarium->content = $request->content;
        $aquarium->area_id = $request->area_id;
        
        $aquarium->save();
        
        $id=$aquarium->id;
        
        return redirect('aquariums/'.$id.'/show');
        
    }
    
    public function edit($id){
        $aquarium=Aquarium::find($id);
        $images = $aquarium->images()->get();
        
        return view('aquariums.edit',compact('aquarium'),compact('images'));
    }                                //↑viewに変数名を渡している
    
    //水族館の更新
    public function update(Request $request, $id){
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);
        
        $aquarium=Aquarium::find($id);
        
        $aquarium->update([
            'name'=>$request->name,
            'hour'=>$request->hour,
            'admission'=>$request->admission,
            'address'=>$request->address,
            'url'=>$request->url,
            'show'=>$request->show,
            'content'=>$request->content,
        ]);
        
        return redirect('aquariums/'.$id.'/show');
    }
    
    //編集ページの画像追加
    public function upload(Request $request, $id){
      $image = new Image;
      $form = $request->all();
      $aquarium=Aquarium::find($id);

      //s3アップロード開始
      $post = $request->file('file');
      //拡張子取得
      $extension = $post->getClientOriginalExtension();
      $name = $post->getClientOriginalName();
      //リサイズしてエンコード
      $postResize = InterventionImage::make($post)->resize(300,300)->encode($extension); 
      //url+ファイル名,リサイズした画像,アクセス種類？
      $path = Storage::disk('s3')->put('/aquariums_images/'.$name,(string)$postResize,'public');
      $url = Storage::disk('s3')->url('aquariums_images/'.$name);
      //urlがいまいちわからない
      
      //aquariumのidを紐づけ
      $image->aquarium_id = $aquarium->id;
      $image->image_path = $url;
      
      $image->save();
      
      return back();
    }
    
    //水族館写真削除
    public function delete_profile($id){
        $aquarium=Aquarium::find($id);
        $images = $aquarium->images()->get();
        
        foreach($images as $image){
           $image_id = $image->id;
        }
        
        $image = Image::find($image_id);
        $image->delete();
        
        return back();
    }
    
    /*public function delete_aquarium($id){
        $aquarium = Aquarium::find($id);
        $aquarium->delete();
        
        return redirect('/');
    }*/
    
    public function ranking(){
        $aquariums = Aquarium::all();
        
        foreach($aquariums as $aquarium){
            $reviews = $aquarium->reviews()->get();
            $stars = $reviews->pluck('star');
            $avg_star = $stars->avg();
        }
    }
}