@extends('layouts.app')

@section('content')
<div class="auth">
<div class="container">
<div class="row d-flex justify-content-between">
    <div class="card col-sm-5 mt-2">
        <div class="card-header">
            <h3 class="card-title">{{ $aquarium->name }}<span>{{ $avg_star }}</span></h3>
            @if($avg_star == 1)
            <div class="d-flex justify-content-end">
            <i class="fas fa-star"></i>
            </div>
            @elseif($avg_star == 2)
            <div class="d-flex justify-content-end">
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            @elseif($avg_star == 3)
            <div class="d-flex justify-content-end">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            @elseif($avg_star == 4)
            <div class="d-flex justify-content-end">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            @elseif($avg_star == 5)
            <div class="d-flex justify-content-end">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            @else
            <p>評価はまだありません</p>
            @endif
        </div>
        <div class="card-body mx-auto">
            @if(count($images))
            <div id="picture">
                <carousel>
                    @foreach ($images as $image)
                    <slide><span class="label"><img src="{{ $image->image_path }}"></span></slide>
                    @endforeach
                </carousel>
            </div>
            @else
            <div style="width:20rem;height:20rem;background-color:#CCFFFF;text-align:center">
                <p style="font-size:30px">No Image</p>
            </div>
            @endif
            <p>{{ $aquarium->content }}</p>
        </div>
    </div>
    
    <div class="col-sm-4 mt-2">
        <table class="table table-bordered ">
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
</div>

<div class="d-flex justify-content-end">
    <!--管理者のみ表示-->
    @if(Auth::check())
        @if(Auth::user()->administrator_flag == 1)
            <button type="button" class="offset-sm-1 mt-2 ml-3 btn btn-primary" style="width:80px" >
            <a href="{{ route('aquariums.edit',['id'=>$aquarium->id]) }}" style="color:white">編集</a>
            </button>
        @endif
    @endif    
    @if(Auth::check())
    <div class="d-flex justify-content-center">
        <button type="button" class="mt-2 ml-3 btn btn-primary" style="width:80px" >
            <a href="{{ route('posts.select',['id'=>$aquarium->id]) }}" style="color:white">投稿</a>
        </button>
    </div>
    @endif
</div>

<div class="row">
    <div class="col-sm-8 mx-auto mt-3">
        @include('commons.navtabs', ['aquarium' => $aquarium])
        @if (count($recommendations) > 0)
            @include('commons.recommendations',['recommendations' => $recommendations])
        @endif
    </div>
</div>
</div>
</div>

@endsection