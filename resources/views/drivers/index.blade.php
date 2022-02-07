@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/drivers/index.css') }}" rel="stylesheet">

    <div class="container">
        <div class="row">
            @can('isAdmin')
                <div class="col-sm col-md-2">
                    <div>
                        <a class="btn btn-success" href="{{ route('drivers.create') }}"> Create New Driver</a>
                    </div>
                </div>
            @endcan
            <div class="col-sm col-md-10">
                <h1>Drivers</h1>
            </div>
        </div>



        <div class="py-4 row">
            @foreach($drivers as $driver)
                <div class="col-md-6 col-sm-12 col-lg-4">
                    <div class="profile-card-4 text-center">
                        <div class="profile-content">
                            <img class="img-fluid" alt="Responsive image"
                                 src="{{ asset('public/image/drivers/'.$driver->image) }}">
                            <div class="profile-name">
                                {{$driver->name}}
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="profile-overview">
                                        <p>Team</p>
                                        <h4>{{$driver->team}}</h4></div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="profile-overview">
                                        <p>Points</p>
                                        <h4>{{$driver->points}}</h4></div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="profile-overview">
                                        <p>State</p>
                                        <h4>{{$driver->state}}</h4></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
