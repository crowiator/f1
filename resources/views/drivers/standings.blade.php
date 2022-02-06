@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/eventIndex.css') }}" rel="stylesheet">
    <div class="container">
        <div class="row">
            <h1>Driver standings</h1>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Team</th>
                    <th scope="col">Points</th>
                </tr>
                </thead>
                <tbody>
                @foreach($drivers as $driver)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $driver->name }}</td>
                        <td>{{ $driver->team }}</td>
                        <td>{{ $driver->points }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

