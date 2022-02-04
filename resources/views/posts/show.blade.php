@extends('layouts.app')

@section('content')
    <div class="container">
        <article class="post">
            <header>
                <h2 class=>
                    {{$post->title}}
                </h2>
            </header>
            <div class="content">
                <img class="img-fluid" alt="Responsive image" src="{{ asset('public/image/post/'.$post->image) }}">
                <p>{{$post->text}}</p>
            </div>
            <footer>
                <div class="footer_article">
                    <a href="/users/{{$post->user->id}}" class="author">
                        <strong>Author: {{$post->user->name}}</strong>
                    </a>
                    <!--  -->


                </div>
            </footer>
        </article>
        @include('comments.index')
    </div>
@endsection
