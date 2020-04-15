@extends('layouts.app')

@section('content')
<div class="auth">
<div class="row">
<div class="offset-sm-3 col-sm-6">
{!! Form::model($aquarium, ['route' => ['aquariums.store']]) !!}
        
                <div class="form-group">
                    {!! Form::label('area_id', '地域番号:') !!}
                    {!! Form::select('area_id', [0,1,2,3,4,5,6,7], ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', '名称:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('hour', '営業時間:') !!}
                    {!! Form::text('hour', '〇〇:〇〇～〇〇:〇〇', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('admission', '料金:') !!}
                    {!! Form::text('admission', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('address', '住所:') !!}
                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('url', 'ホームページ:') !!}
                    {!! Form::text('url', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('show', 'ショー:') !!}
                    {!! Form::textarea('show', null, ['class' => 'form-control','rows' => '5']) !!}
                </div><div class="form-group">
                    {!! Form::label('content', '紹介文:') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control','rows' => '5']) !!}
                    <!--入力フォームのサイズを変えたい-->
                </div>
        
                {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
</div>
</div>
</div>
@endsection
