<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//まずはtoppageにとぶ
Route::get('/', function () {
       return view('toppage');
});
    
//会員登録(フォームの取得、登録)
Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');

//ログイン認証
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::get('logout','Auth\LoginController@logout')->name('logout.get');

//退会画面に移動
Route::get('delete','UsersController@delete')->name('user.delete');

//退会処理
Route::delete('destroy','UsersController@destroy')->name('user.destroy');

//水族館新規追加
Route::get('aquariums/area','AreasController@create')->name('aquariums.area');
Route::post('store','AquariaController@store')->name('aquariums.store');

Route::group(['prefix'=>'aquariums/{id}'],function(){
    Route::get('show','AquariaController@show')->name('aquariums.show');
    Route::get('recommendations','AquariaController@recommendations')->name('aquariums.recommendations');
    Route::get('edit','AquariaController@edit')->name('aquariums.edit');
    Route::delete('delete_profile','AquariaController@delete_profile')->name('delete_profile');
    Route::delete('delete_aquarium','AquariaController@delete_aquarium')->name('delete_aquarium');
    Route::post('update','AquariaController@update')->name('aquariums.update');
    Route::post('upload','AquariaController@upload')->name('aquariums.upload');
    Route::get('create','AquariaController@create')->name('aquariums.create');
    Route::get('index','AquariaController@index')->name('aquariums.index');
    //投稿削除↓
    Route::delete('recommendation_destroy','PostsController@recommendation_destroy')->name('recommendation.destroy');
    Route::delete('review_destroy','PostsController@review_destroy')->name('review.destroy');
});




Route::group(['prefix'=>'/posts/{id}'],function(){
    //投稿選択画面
    Route::get('select','PostsController@select')->name('posts.select');
    //コメント投稿画面
    Route::get('review','PostsController@review')->name('posts.review');
    //おすすめ生物投稿画面
    Route::get('recommendation','PostsController@recommendation')->name('posts.recommendation');
    //投稿↓
    Route::post('post_recommendation','PostsController@post_recommendation')->name('post_recommendation');
    Route::post('post_review','PostsController@post_review')->name('post_review');
});

//ユーザ機能
Route::group(['middleware'=>'auth'],function(){
    
    //ユーザページ
    Route::resource('users','UsersController',['only'=>['show','edit','update']]);
    //Post
    Route::resource('Posts','PostsController');

});


//検索
Route::get('search.index','SearchController@index')->name('search.index');

