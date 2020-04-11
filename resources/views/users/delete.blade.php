@extends('layouts.app')

@section('content')
<div class="auth">
<div class="mx-auto mt-5 wrapper" style="width:600px">
    <div class="mx-auto" style="width:75%">
    <h3>{{ Auth::user()->name }}さん、本当に退会されますか？</h3>
    </div>
    <div class="mx-auto" style="width:400px">
        {!! Form::open(['route' => ['user.destroy'], 'method' => 'delete']) !!}
            {!! Form::submit('退会する', ['class' => "btn btn-danger"]) !!}
        {!! Form::close() !!}
    </div>
</div>
</div>
@endsection