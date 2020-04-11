@extends('layouts.app')

@section('content')
<div class="auth">
<div class="mx-auto wrapper" style="width:500px">
    <div class="mx-auto">
        <h2>{{ $aquarium->name }}</h2>
    </div>
    
{!! Form::model($review, ['route' => ['post_review',$aquarium->id]]) !!}
    <div class="form-group">
        {!! Form::label('star', '評価:') !!}
        {!! Form::select('star',[1,2,3,4,5], ['class' => 'form-control']) !!}
    </div>
    <div class="form-group rows-5">
        {!! Form::label('content', 'コメント:') !!}
        {!! Form::text('content','191文字以下', ['class' => 'form-control']) !!}
    </div> 
    {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

    
</div>
</div>


@endsection