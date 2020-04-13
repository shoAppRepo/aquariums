<div class="container">
    @foreach ($reviews as $review)
        <li class="media mb-3">
            <img class="mr-2 rounded">
            <div class="media-body">
                <div class="container">
                <div class="d-flex justify-content-between">
                    <div>
                    @if($review->user)
                    <p><i class="fas fa-fish"></i>{{ $review->user->name }}<span class="text-muted m-3">posted at {{ $review->created_at }}</span></p>
                    @else
                    <p><i class="fas fa-fish"></i>退会済みのユーザ<span class="text-muted m-3">posted at {{ $review->created_at }}</span></p>
                    @endif
                    </div>
                    <div class="mt-1 mr-2">
                    @if(Auth::id() === $review->user_id)
                    {!! Form::open(['route' => ['review.destroy',$review->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => "btn btn-danger btn-sm ml-1"]) !!}
                    {!! Form::close() !!}
                    @endif
                    </div>
                </div>
                </div>
                <div class="mx-auto">
                    <p style="border:solid 1px silver;width:100%;height:10rem">{!! nl2br(e($review->content)) !!}</p>
                </div>
            </div>
        </li>
    @endforeach

</div>
<div class="d-flex justify-content-center mt-2">
    {{ $reviews->links('pagination::bootstrap-4') }}
</div>
