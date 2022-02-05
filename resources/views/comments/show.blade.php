<link rel="stylesheet" href="{{ asset('css/comments/index.css') }}">

    <div class="media-body" >
                                <span class="text-muted pull-right">
                                    <time datetime="{{$comment->created_at->toW3cString()}}" class="text-muted">{{$comment->created_at->diffForHumans()}}</time>
                                </span>
        <a href="/users/{{$post->user->id}}" class="author">
            @<strong class="text-success">{{$comment->user->name}}</strong>
        </a>

        <p contenteditable="true">
            {{$comment->text}}
        </p>
        @can('delete', $comment)
            <form action="{{ route('comments.destroy',$comment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-sm btn-danger">Delete</button>
            </form>
        @endcan
        @csrf
    </div>


