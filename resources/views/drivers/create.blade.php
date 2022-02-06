@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/evenEdit.css') }}" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-sm col-md-1">
                <div>
                    <a class="btn btn-primary" href="{{ route('drivers.index') }}"> Back</a>
                </div>
            </div>
            <div class="col-sm col-md-10">
                <h1>Add Driver</h1>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Eroors</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input required type="text" name="name" class="form-control" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Team:</strong>
                        <input required type="text" name="team" class="form-control" placeholder="Enter Team">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>State:</strong>
                        <input required type="text" name="state" class="form-control" placeholder="Enter State">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Points:</strong>
                        <input required type="number" step="0.01" name="points" class="form-control" placeholder="Enter Points">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input required type="file" name="image" class="form-control" placeholder="Enter image">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection

