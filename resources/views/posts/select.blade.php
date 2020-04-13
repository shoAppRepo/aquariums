@extends('layouts.app')

@section('content')
<div class="mx-auto wrapper" style="width:500px">
<div class="row mx-auto">
    <div class="mx-auto">
        <h2>{{ $aquarium->name }}</h2>
    </div>
</div>
<div class="row mb-3">
    <div class="col-sm-4" style="margin-top:100px">
        <button type="button" class="btn btn-primary" style="width:200px;height:200px">
            <a href="{{ route('posts.review',['id'=>$aquarium->id]) }}" style="color:white">コメント</a>
        </button>
    </div>
    <div class="offset-sm-3 col-sm-4" style="margin-top:100px">
        <button type="button" class="btn btn-primary" style="width:200px;height:200px">
            <a href="{{ route('posts.recommendation',['id'=>$aquarium->id]) }}" style="color:white">おすすめ生物</a>
        </button>
    </div>
</div>
</div>


@endsection