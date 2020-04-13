@extends('layouts.app')

@section('content')

    
    <div class="top_image">
    <img src="/images/penguin1.jpeg" style="width:100%;height:100vh">
    </div>
    <div class="top__text-box">
      <h1 class="top__title">Enjoy Aquaria!</h1>
      <div class="top__catchphrase">色々な水族館に出かけよう</div>
    </div>

<div class="main"></div>
    <div class="text-second" style="margin-top:50px;width:100vw">
        <h2>どこの水族館に行く？</h2>
    </div>
    
<!--メインエリア-->
<div class="container">
    <!--検索-->
    <div class="d-flex justify-content-center mt-3">
        {!! Form::open(['route' => ['search.index'],'method' => 'get']) !!}
            {!! Form::text('search', null) !!}
        {!! Form::submit('検索',['class' => "btn btn-primary"]) !!}
        {!! Form::close() !!}
    </div>
    
    <div class="row col-sm-12 mt-2 mx-auto d-flex justify-content-center text-center">
        @if(count($aquariums) > 0)
        @foreach($aquariums as $aquarium)
        <div>
        <a href="{{ route('aquariums.show',['id'=>$aquarium->id]) }}" class="card ml-2 mt-2" style="display:inline-block;height:20rem;width:15rem">
            <div class="card-body">
                <h5 class="card-header" style="font-size:15px">{{ $aquarium->name }}</h5>
                <p class="card-text">{!! nl2br(e($aquarium->content)) !!}</p>
            </div>
        </a>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-2">
        {{ $aquariums->links('pagination::bootstrap-4') }}
    </div>
    @else
    <div class="mx-auto mb-3">
        <h3>まだ登録されていません。</h3>
        <h3>少々お待ちを。</h3>
    </div>
    @endif
</div>
</div>

@endsection