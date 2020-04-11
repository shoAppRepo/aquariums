@extends('layouts.app')

@section('content')
<div class="row">
    <div class="top_image">
    <img src="images/killerwhale2.jpeg" style="width:100%;height:100vh"></img>
    </div>
    <div class="top__text-box">
      <h1 class="top__title">Enjoy Aquaria!</h1>
      <div class="top__catchphrase">色々な水族館に出かけよう</div>
    </div>

<div class="main">
<div class="text-second col-sm-8 mx-auto" style="margin-top:50px">
    <h2>どこの水族館に行く？</h2>
</div>

    
<div class="row mx-auto" style="display:flex">
    <!--タイムライン-->
    <div class="col-sm-2">
    <aside class="col-sm-2 mt-5"></aside>
    </div>
    
    <!--メインエリア-->
    <div class="col-sm-8">

        <a href="{{ route('aquariums.index',['id'=>1]) }}" class="btn-flat-border mx-3 mt-5">
            <i class="fa fa-chevron-right"></i>北海道
        </a>

        <a href="{{ route('aquariums.index',['id'=>2]) }}" class="btn-flat-border mx-3 mt-5">
            <i class="fa fa-chevron-right"></i>東北
        </a>


        <a href="{{ route('aquariums.index',['id'=>3]) }}" class="btn-flat-border mx-3 mt-5">
            <i class="fa fa-chevron-right"></i>関東
        </a>

        <a href="{{ route('aquariums.index',['id'=>4]) }}" class="btn-flat-border mx-3 mt-5">
            <i class="fa fa-chevron-right"></i>中部
        </a>

        <a href="{{ route('aquariums.index',['id'=>5]) }}" class="btn-flat-border mx-3 mt-5">
            <i class="fa fa-chevron-right"></i>近畿
        </a>

        <a href="{{ route('aquariums.index',['id'=>6]) }}" class="btn-flat-border mx-3 mt-5">
            <i class="fa fa-chevron-right"></i>中国・四国
        </a>
        
        <a href="{{ route('aquariums.index',['id'=>7]) }}" class="btn-flat-border mx-3 mt-5">
            <i class="fa fa-chevron-right"></i>九州
        </a>

    </div>

    <!--検索/ランキング-->
    <div class="col-sm-2 mt-5">
    <aside>
        {!! Form::open(['route' => ['search.index'],'method' => 'get']) !!}
            {!! Form::text('search', null) !!}
            {!! Form::submit('検索',['class' => "btn btn-primary"]) !!}
        {!! Form::close() !!}
        <p>ランキング</p>
    </aside>
    </div>
</div>
</div>
</div>
@endsection