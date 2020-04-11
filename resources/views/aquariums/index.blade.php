@extends('layouts.app')

@section('content')

<div class="row">
    
    <div class="top_image">
    <img src="/images/penguin1.jpeg" style="width:100%;height:100vh"></img>
    </div>
    <div class="top__text-box">
      <h1 class="top__title">Enjoy Aquaria!</h1>
      <div class="top__catchphrase">色々な水族館に出かけよう</div>
    </div>

<div class="main col-sm-12">
    <div class="text-second col-sm-8 mx-auto" style="margin-top:50px">
        <h2>どこの水族館に行く？</h2>
    </div>

<div class="row mx-auto my-5" style="display:flex">
    <div class="col-sm-2">
        <aside class="col-sm-2 mt-5"></aside>
    </div>
    
    <div class="col-sm-8 mx-auto mt-3" style="border:solid 2px #6cb4e4;">
        <ul class="media-list row">
            @if(count($aquariums) > 0)
            @foreach($aquariums as $aquarium)
            <li class="col-sm-3 m-4" style="list-style:none;">
                <div>
                    <img src="/images/icon2.jpeg"></img><a href="{{ route('aquariums.show',['id'=>$aquarium->id]) }}">{{ $aquarium->name }}</a>
                </div>
                <div class="my-2">
                    {!! nl2br(e($aquarium->content)) !!}
                </div>
                
            </li>
            @endforeach
            @else
            <div class="mx-auto text-center">
            <h3>まだ登録されていません。</h3>
            <h3>少々お待ちを。</h3>
            </div>
            @endif
        </ul>
        {{ $aquariums->links('pagination::bootstrap-4') }}
    </div>
    <aside class="col-2 mt-5">
        {!! Form::open(['route' => ['search.index'],'method' => 'get']) !!}
            {!! Form::text('search', null) !!}
            {!! Form::submit('検索',['class' => "btn btn-primary"]) !!}
        {!! Form::close() !!}
        <div class="">
            <h2>ランキング</h2>
        </div>
    </aside>
</div>
</div>
</div>
@endsection