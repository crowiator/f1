@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/posts/index.css') }}">
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm col-md-2">
                <div>
                    <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
                </div>
            </div>
            <div class="col-sm col-md-10">
                <h1>Posts</h1>
            </div>

        </div>
        <div class="row">
        @foreach($posts as $post)

                <div class="col-md-12 col-lg-12 post">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img class="img-fluid" alt="Responsive image"
                                 src="{{ asset('public/image/post/'.$post->image) }}">
                            <div class="card-body">
                                <h5 class="card-title">
                                <a href="/posts/{{$post->id }}">
                                    {{$post->title}}
                                </a>
                                </h5>

                                <p class="card-text">
                                    {{$post->text}}
                                </p>
                                <div class="footer_article">
                                    <a href="/users/{{$post->user->id}}" class="author">
                                        <strong>Author: {{$post->user->name}}</strong>
                                    </a>
                                    <!--  -->
                                    <a href="/posts/{{$post->id}}#comments" class="comments">
                                        {{$post->comments->count()}} <strong>{{ str_plural('comments',$post->comments->count()) }}</strong>
                                    </a>

                                </div>
                                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>


                @endforeach
        </div>

    </div>
    </div>

@endsection
