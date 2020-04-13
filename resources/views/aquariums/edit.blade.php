@extends('layouts.app')

@section('content')
<div class="auth">
<div class="container">
<div class="mx-auto col-sm-2">
{!! Form::open(['route' => ['aquariums.upload',$aquarium->id],'method' => 'post','enctype'=>"multipart/form-data"]) !!}
            {!! Form::label('file', '画像', ['class' => 'control-label']) !!}
            {!! Form::file('file',['accept'=>'.jpeg,.jpg,.png,gif']) !!}
            {!! Form::submit('アップロード', ['class' => 'btn btn-primary my-2']) !!}
{!! Form::close() !!}
</div>
<div class="mx-auto col-sm-6">
{!! Form::model($aquarium, ['route' => ['aquariums.update',$aquarium->id]]) !!}
        
                <div class="form-group">
                    {!! Form::label('name', '名称:') !!}
                    {!! Form::text('name',$aquarium->name, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('hour', '営業時間:') !!}
                    {!! Form::text('hour', $aquarium->hour, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('admission', '料金:') !!}
                    {!! Form::text('admission', $aquarium->admission, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address', '住所:') !!}
                    {!! Form::text('address', $aquarium->address, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('url', 'ホームページ:') !!}
                    {!! Form::text('url', $aquarium->url, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('show', 'ショー:') !!}
                    {!! Form::text('show', $aquarium->show, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', '紹介文:') !!}
                    {!! Form::text('content', $aquarium->content, ['class' => 'form-control','rows' => '5']) !!}
                    <!--入力フォームのサイズを変えたい-->
                </div>
        
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        
{!! Form::close() !!}
</div>
<div class="my-5 d-flex justify-content-between">
    @if($images)
    @foreach ($images as $image)
    <div >
    <img src="{{ $image->image_path }}">
    {!! Form::open(['route' => ['delete_profile',$aquarium->id], 'method' => 'delete']) !!}
        {!! Form::submit('Delete', ['class' => "btn btn-danger btn-sm mt-2"]) !!}
    {!! Form::close() !!}
    </div>
    @endforeach
    @else
    <div style="width:300px;height:300px;background-color:#CCFFFF;display:flex;justify-content:center;align-items:center">
    <p style="font-size:30px">No Image</p>
    </div>
    @endif
</div>
</div>
</div>
@endsection
