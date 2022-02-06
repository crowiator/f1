@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/eventIndex.css') }}" rel="stylesheet">
    <div class="container py 5">
        <div class="row">
            <div class="col-md-12">
                <div id="success_message">

                </div>
                <h1>Races
                </h1>
                <div class="card-body">
                    <table class="table-responsive-sm table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Place</th>
                            <th>Circle</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Winner</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            fetchrace();

            function fetchrace() {
                $.ajax({
                    type: 'GET',
                    url: '/fetch-races',
                    dataType: "json",
                    success: function (response) {
                        //console.log(response.races);
                        $('tbody').html("");
                        $.each(response.races, function (key, item) {
                            $('tbody').append(
                                '<tr>\
                                    <td>'+item.name+'</td>\
                                    <td>'+item.place+'</td>\
                                    <td>'+item.circle+'</td>\
                                    <td>'+item.date+'</td>\
                                    <td>'+item.time+'</td>\
                                    <td>'+item.winner+'</td>\
                               </tr>'
                            );
                        });
                    }
                });
            }
        });
    </script>
@endsection
