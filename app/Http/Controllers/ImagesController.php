<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Image;
use App\Aquarium;

class ImagesController extends Controller
{


  public function create(Request $request, $id)
  {
      $image = new Image;
      $form = $request->all();
      $aquarium=Aquarium::find($id);
      
      
      //aquariumのidを紐づけ
      
      $image->insert([
            'aquariua_id'=>$aquarium->id,
        ]);

      //s3アップロード開始
      $image = $request->file('image');
      // バケットの`myprefix`フォルダへアップロード
      $path = Storage::disk('s3')->putFile('aquqaiums_images', $image, 'public');
      // アップロードした画像のフルパスを取得
      $image->image_path = Storage::disk('s3')->url($path);

      $image->save();

      return redirect('aquariums/'.$id.'/show');
  }
}
