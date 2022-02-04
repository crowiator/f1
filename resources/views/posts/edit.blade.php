@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/evenEdit.css') }}" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-sm col-md-1">
                <div>
                    <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
                </div>
            </div>
            <div class="col-sm col-md-10">
                <h1>Edit Post</h1>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif









        <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input required type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Text:</strong>
                        <textarea required class="form-control" style="height:150px" name="text" placeholder="Detail">{{ $post->text }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Slug:</strong>
                        <input required type="text" name="slug" value="{{ $post->slug }}" class="form-control" placeholder="Slug">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input  type="file" name="image" class="form-control" placeholder="image">
                        <img class="img-fluid" alt="Responsive image" src="{{ asset('public/image/post/'.$post->image) }}" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
