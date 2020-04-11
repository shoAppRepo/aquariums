@extends('layouts.app')

@section('content')

<!--main-->
<div class="row">
    
<div class="top_image">
    <img src="images/garden_eels.jpeg" style="width:100%;height:100vh"></img>
    </div>
    <div class="top__text-box">
      <h1 class="top__title">Enjoy Aquaria!</h1>
      <div class="top__catchphrase">色々な水族館に出かけよう</div>
    </div>

<div class="main">
<div class="text-second col-sm-8 mx-auto" style="margin-top:50px">
    <h2>「{{ $search }}」の検索結果</h2>
</div>
<div class="col-12 wrapper" style="display:flex">
    <aside class="col-2 mt-5">

    </aside>
    <div class="col-8 mx-auto mt-5" style="height:550px;border:solid 1px #000000">
        <ul class="media-list row">
            @if(count($data) > 0)
            @foreach($data as $item)
            <li class="col-sm-3 m-4" style="list-style:none;">
                <div>
                    <img src="/images/icon2.jpeg"></img><a href="{{ route('aquariums.show',['id'=>$item->id]) }}">{{ $item->name }}</a>
                </div>
                <div>
                    {{!! nl2br(e($item->content)) !!}} 
                </div>
                
            </li>
            @endforeach
            @else
            <h3>検索結果は0件です</h3>
            @endif
        </ul>
        {{ $data->links('pagination::bootstrap-4') }}
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