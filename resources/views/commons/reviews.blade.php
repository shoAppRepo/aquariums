<ul class="media-list row">
    @foreach ($reviews as $review)
        <li class="media mb-3">
            <img class="mr-2 rounded">
            <div class="media-body" style="border:double 10px silver">
                <div style="display:flex">
                    @if($review->user)
                    <p class="m-1"><i class="fas fa-fish"></i>{{ $review->user->name }}<span class="text-muted m-3">posted at {{ $review->created_at }}</span></p>
                    @else
                    <p class="m-1"><i class="fas fa-fish"></i>退会済みのユーザ<span class="text-muted m-3">posted at {{ $review->created_at }}</span></p>
                    @endif
                    <div class="mt-1">
                    @if(Auth::id() === $review->user_id)
                    {!! Form::open(['route' => ['review.destroy',$review->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => "btn btn-danger btn-sm ml-1"]) !!}
                    {!! Form::close() !!}
                    @endif
                    </div>
                </div>
                <div style="display:flex">
                    <p class="m-2" style="border:solid 1px silver;width:500px;height:100px">{!! nl2br(e($review->content)) !!}</p>
                </div>
            </div>
        </li>
                     
    @endforeach
</ul>

    {{ $reviews->links('pagination::bootstrap-4') }}
