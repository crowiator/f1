@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/posts/show.css') }}">
    <div class="container">
        <div class="row">
            <h1>
                {{$post->title}}
            </h1>
        </div>
        <div class="row post">
            <div class="col-sm col-md-7">
                <p>{{$post->text}}</p>

                <a href="/users/{{$post->user->id}}" class="author">
                    <strong>Author: {{$post->user->name}}</strong>
                </a>
            </div>
            <div class="col-sm col-md-5">
                <img class="img-fluid" alt="Responsive image" src="{{ asset('public/image/post/'.$post->image) }}">
            </div>
            @include('comments.index')
        </div>







    </div>
@endsection
