@extends('layouts.app')

@section('content')
<div class="auth">
<div class=" mt-5 container" style="width:600px">
    <div class="mx-auto" style="width:75%">
    <h3>{{ Auth::user()->name }}さん</br>本当に退会されますか？</h3>
    </div>
    <div class="mx-auto" style="width:400px">
        {!! Form::open(['route' => ['user.destroy'], 'method' => 'delete']) !!}
            {!! Form::submit('退会する', ['class' => "btn btn-danger mx-auto"]) !!}
        {!! Form::close() !!}
    </div>
</div>
</div>
@endsection