<!--recommendations一覧取得-->
<ul class="media-list row">
            @foreach ($recommendations as $recommendation)
                <li class="media mb-3">
                    <div class="media-body" style="border:double 10px silver">
                        <div style="display:flex">
                            @if($recommendation->user)
                                <p class="m-1"><i class="fas fa-fish"></i>{{ $recommendation->user->name }}<span class="text-muted m-3">posted at {{ $recommendation->created_at }}</span></p>
                            @else
                            　  <p class="m-1"><i class="fas fa-fish"></i>退会済みのユーザ<span class="text-muted m-3">posted at {{ $recommendation->created_at }}</span></p>
                            @endif
                            <div class="mt-1">
                                @if(Auth::id() === $recommendation->user_id)
                                    {!! Form::open(['route' => ['recommendation.destroy',$recommendation->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Delete', ['class' => "btn btn-danger btn-sm ml-1"]) !!}
                                    {!! Form::close() !!}
                                @endif
                             </div>
                         </div>
                        <div style="display:flex">
                            <p class="m-2"><img src="{{ $recommendation->image_path }}"></img></p>
                            <div>
                                <p class="m-0">{{ $recommendation->name }}</p>
                                <!--なんか隙間が空く-->
                         　      <p class="m-0" style="border:solid 1px silver;width:350px;">{!! nl2br(e($recommendation->content)) !!}</p>
                            </div>
                        </div>
                     </div>
                </li>
            @endforeach
</ul>

{{ $recommendations->links('pagination::bootstrap-4') }}
