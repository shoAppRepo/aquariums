<!--recommendations一覧取得-->
<div class="container">
            @foreach ($recommendations as $recommendation)
                <li class="media mb-3">
                    <div class="media-body">
                    <div class="container" >
                        <div class="d-flex justify-content-between">
                            <div>
                            @if($recommendation->user)
                                <p class="m-1"><i class="fas fa-fish"></i>{{ $recommendation->user->name }}<span class="text-muted m-3">posted at {{ $recommendation->created_at }}</span></p>
                            @else
                            　  <p class="m-1"><i class="fas fa-fish"></i>退会済みのユーザ<span class="text-muted m-3">posted at {{ $recommendation->created_at }}</span></p>
                            @endif
                            </div>
                            <div class="mt-1 mr-2">
                                @if(Auth::id() === $recommendation->user_id)
                                    {!! Form::open(['route' => ['recommendation.destroy',$recommendation->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Delete', ['class' => "btn btn-danger btn-sm ml-1 "]) !!}
                                    {!! Form::close() !!}
                                @endif
                            </div>
                         </div>
                        
                        <div class="mx-auto">
                            <div class="d-flex justify-content-center">
                                <p class="m-2"><img src="{{ $recommendation->image_path }}"></img></p>
                                <p class="m-0">{{ $recommendation->name }}</p>
                            </div>
                         　      <p class="m-0" style="border:solid 1px silver;width:100%;height:7rem">{!! nl2br(e($recommendation->content)) !!}</p>
                        </div>
                     </div>
                     </div>
                </li>
            @endforeach 
</div>

<div class="d-flex justify-content-center mt-2">
{{ $recommendations->links('pagination::bootstrap-4') }}
</div>
