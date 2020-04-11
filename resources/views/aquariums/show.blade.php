@extends('layouts.app')

@section('content')
<div class="auth">
<div class="aquarium_introduction row">
    <div class="card offset-sm-1 col-sm-4">
        <div class="card-header">
            <h3 class="card-title">{{ $aquarium->name }}</h3>
        </div>
        <div class="card-body">
            
            @if($images)
            <div id="pictures">
            @foreach ($images as $image)
                <carousel>
                    <slide><span class="labe"></span><img src="{{ $image->image_path }}"></span></slide>
                </carousel>
            @endforeach
            </div>
            @else
            <div style="width:300px;height:300px;background-color:#CCFFFF;display:flex;justify-content:center;align-items:center">
                <p style="font-size:30px">No Image</p>
            </div>
            @endif
        </div>
        <div class="card-body">
            <p>{{ $aquarium->content }}</p>
        </div>
    </div>
    
    <div class="offset-sm-2 col-sm-4">
        <table class="table table-bordered">
            <tr>
                <td>営業時間</td>
                <td>{{ $aquarium->hour }}</td>
            </tr>
            <tr>
                <td>料金</td>
                <td>{{ $aquarium->admission }}</td>
            </tr>
            <tr>
                <td>住所</td>
                <td>{{ $aquarium->address }}</td>
            </tr>
            <tr>
                <td>URL</td>
                <td>{{ $aquarium->url }}</td>
            </tr>
            <tr>
                <td>ショー</td>
                <td>{{ $aquarium->show }}</td>
            </tr>
        </table>
    </div>
    <!--管理者のみ表示-->
    @if(Auth::check())
        @if(Auth::user()->administrator_flag == 1)
            <button type="button" class="offset-sm-1 mt-2 btn btn-primary" style="width:80px" >
                <a href="{{ route('aquariums.edit',['id'=>$aquarium->id]) }}" style="color:white">編集</a>
            </button>
        @endif
    @endif
    
    @if(Auth::check())
        <button type="button" class="offset-sm-5 mt-2 btn btn-primary" style="width:80px" >
            <a href="{{ route('posts.select',['id'=>$aquarium->id]) }}" style="color:white">投稿</a>
        </button>
    @endif
</div>

<div class="row">
    <div class="col-sm-8 mx-auto mt-3">
        @include('commons.navtabs', ['aquarium' => $aquarium])
        @if (count($reviews) > 0)
            @include('commons.reviews',['reviews'=>$reviews])
        @endif
    </div>
</div>
</div>

@endsection