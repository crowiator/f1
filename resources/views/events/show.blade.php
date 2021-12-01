@extends('events.layout')

@section('content')
    <link href="{{ asset('css/eventShow.css') }}" rel="stylesheet">
    <div class=" container">
        <div class="row">
            <div class="col-sm col-md-1">
                <div>
                    <a class="btn btn-primary" href="{{ route('events.index') }}"> Back</a>
                </div>
            </div>
            <div class="col-sm col-md-10">
                <h1>{{ $event->name }}</h1>
                <table class="table table-borderless">
                    <tbody>
                    <tr>

                        <td><h4>Place</h4></td>
                        <td>{{ $event->place }}</td>
                    </tr>
                    <tr>

                        <td><h4>Date</h4></td>
                        <td>{!! date('d.m.Y', strtotime($event->date)) !!}</td>
                    </tr>
                    <tr>

                        <td><h4>Measure</h4></td>
                        <td>{{ $event->measure }}</td>
                    </tr>
                </table>
                <h4>Description</h4>
                <p>
                    {{ $event->description }}
                </p>
                <img class="img-fluid" alt="Responsive image" src="{{ asset('public/image/'.$event->image) }}">
            </div>


        </div>

    </div>

@endsection
