@extends('layouts.app')

@section('content')

</style>

<div class="row">
<div class="col-8 mx-auto mt-5">
    <a href="{{ route('aquariums.create',['id'=>1]) }}" class="btn-flat-border mx-5 my-3">北海道</a>
    <a href="{{ route('aquariums.create',['id'=>2]) }}" class="btn-flat-border mx-5 my-3">東北</a>
    <a href="{{ route('aquariums.create',['id'=>3]) }}" class="btn-flat-border mx-5 my-3">関東</a>
    <a href="{{ route('aquariums.create',['id'=>4]) }}" class="btn-flat-border mx-5 my-3">中部</a>
    <a href="{{ route('aquariums.create',['id'=>5]) }}" class="btn-flat-border mx-5 my-3">近畿</a>
    <a href="{{ route('aquariums.create',['id'=>7]) }}" class="btn-flat-border mx-5 my-3">九州</a>
    <a href="{{ route('aquariums.create',['id'=>6]) }}" class="btn-flat-border mx-5 my-3">中国・四国</a>

</div>
</div>
@endsection