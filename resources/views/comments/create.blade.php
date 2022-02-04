@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="/comments" method="POST" add-comment-form>
    @csrf
    <textarea name="text" required class="form-control" placeholder="write a comment..." rows="3"></textarea>
    <button type="submit" class="btn btn-danger pull-right">Post</button>
    <input type="hidden" name="post_id" value="{{ $post->id }}">

</form>




