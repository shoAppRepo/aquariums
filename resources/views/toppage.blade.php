@extends('layouts.app')

@section('content')

    <div class="top_image">
        <img src="images/killerwhale2.jpeg" style="width:100%;height:100vh">
    </div>
    <div class="top__text-box">
      <h1 class="top__title">Enjoy Aquaria!</h1>
      <div class="top__catchphrase">色々な水族館に出かけよう</div>
    </div>
    

<div class="main"></div>
<div class="text-second" style="margin-top:50px;width:100vw">
    <h2>どのエリアに行く？</h2>
</div>
    

    
    <!--メインエリア-->
<div class="container">
    <!--検索-->
    <div class="d-flex justify-content-center mt-3">
        {!! Form::open(['route' => ['search.index'],'method' => 'get']) !!}
            {!! Form::text('search', null,["placeholder"=>"水族館名を入力"]) !!}
        {!! Form::submit('検索',['class' => "btn btn-primary"]) !!}
        {!! Form::close() !!}
    </div>
    <div class="row col-sm-8 mt-2 mx-auto d-flex justify-content-between" >

        <a href="{{ route('aquariums.index',['id'=>1]) }}" class="btn-flat-border mt-4">
            <i class="fa fa-chevron-right"></i>北海道
        </a>

        <a href="{{ route('aquariums.index',['id'=>2]) }}" class="btn-flat-border mt-4">
            <i class="fa fa-chevron-right"></i>東北
        </a>

        <a href="{{ route('aquariums.index',['id'=>3]) }}" class="btn-flat-border mt-4">
            <i class="fa fa-chevron-right"></i>関東
        </a>

        <a href="{{ route('aquariums.index',['id'=>4]) }}" class="btn-flat-border mt-4">
            <i class="fa fa-chevron-right"></i>中部
        </a>

        <a href="{{ route('aquariums.index',['id'=>5]) }}" class="btn-flat-border mt-4">
            <i class="fa fa-chevron-right"></i>近畿
        </a>

        <a href="{{ route('aquariums.index',['id'=>6]) }}" class="btn-flat-border mt-4">
            <i class="fa fa-chevron-right"></i>中国・四国
        </a>

        <a href="{{ route('aquariums.index',['id'=>7]) }}" class="btn-flat-border mt-4">
            <i class="fa fa-chevron-right"></i>九州・沖縄
        </a>
    </div>


</div>
<!--<div class="text-second" style="margin-top:50px;width:100vw">
    <h2>人気ランキング</h2>
</div>
-->

<div class="container">
    @include('commons.gallery')
</div>


@endsection