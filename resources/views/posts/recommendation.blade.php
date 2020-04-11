@extends('layouts.app')

@section('content')
<div class="auth">
<div class="mx-auto wrapper" style="width:500px">
    <div class="mx-auto">
        <h2>{{ $aquarium->name }}</h2>
    </div>

{!! Form::open(['route' => ['post_recommendation',$aquarium->id],'method' => 'post','enctype'=>"multipart/form-data"]) !!}
    <div class="form-group">
            {!! Form::label('file', '画像', ['class' => 'control-label']) !!}
            {!! Form::file('file') !!}
    </div>
    <div class="form-group m-0">
        {!! Form::label('name', '名前', ['class' => 'control-label']) !!}
        {!! Form::text('name',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group m-0">
        {!! Form::label('content', 'コメント', ['class' => 'control-label']) !!}
        {!! Form::textarea('content',null,['class' => 'form-control']) !!}
    </div>   
    <div class="form-group">
        {!! Form::submit('投稿', ['class' => 'btn btn-primary my-2']) !!}
    </div>
    
</div>
</div>

@endsection