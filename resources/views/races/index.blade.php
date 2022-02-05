@extends('layouts.app')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="AddRaceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Race</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="saveForm_errList">

                    </ul>
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" class="name form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Place</label>
                        <input type="text" class="place form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Circle</label>
                        <input type="text" class="circle form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Date</label>
                        <input type="date" class="date form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Time</label>
                        <input type="time" class="time form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Winner</label>
                        <input type="text" class="winner form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_race">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit race Modal -->
    <div class="modal fade" id="EditRaceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Race</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="updateForm_errList">

                    </ul>
                    <input type="hidden" id="edit_race_id">
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" id="edit_name" class="name form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Place</label>
                        <input type="text" id="edit_place" class="place form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Circle</label>
                        <input type="text" id="edit_circle" class="circle form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Date</label>
                        <input type="date" id="edit_date" class="date form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Time</label>
                        <input type="time" id="edit_time" class="time form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Winner</label>
                        <input type="text" id="edit_winner" class="winner form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_race">Update</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete race Modal -->
    <div class="modal fade" id="DeleteRaceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Race</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <input type="hidden" id="delete_race_id">
                    <h5>  Are you sure to delete this information about Race?</h5>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_race_btn">Delete</button>
                </div>
            </div>
        </div>
    </div>



    <div class="container py 5">
        <div class="row">
            <div class="col-md-12">
                <div id="success_message">

                </div>
                <h4>Races
                    <a href="#" data-bs-toggle="modal" data-bs-target="#AddRaceModal"
                       class="btn btn-primary float-right btn-sm"> Add Race</a>
                </h4>
                <div class="card-body">
                    <table class="table-responsive-sm table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Place</th>
                            <th>Circle</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Winner</th>
                            <th>Edit</th>
                            <th>Delete</th>
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
                                    <td>'+item.id+'</td>\
                                    <td>'+item.name+'</td>\
                                    <td>'+item.place+'</td>\
                                    <td>'+item.circle+'</td>\
                                    <td>'+item.date+'</td>\
                                    <td>'+item.time+'</td>\
                                    <td>'+item.winner+'</td>\
                                    <td> <button type="button" value="'+item.id+'" class="edit_race btn btn-primary btn-sm">Edit </button> </td>\
                                    <td> <button type="button" value="'+item.id+'" class="delete_race btn btn-danger btn-sm">Delete </button> </td>\
                                </tr>'
                            );
                        });
                    }
                });
            }
            //delete
            $(document).on('click','.delete_race',function (e){
                e.preventDefault();
                var race_id = $(this).val();
                $('#delete_race_id').val(race_id);
                $('#DeleteRaceModal').modal('show');

            });
            $(document).on('click','.delete_race_btn',function (e){
                e.preventDefault();

                var race_id = $('#delete_race_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'DELETE',
                    url: '/delete-race/' + race_id,
                    success:function (response){
                        // console.log(response);
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                        $('#DeleteRaceModal').modal('hide');
                        fetchrace();
                    }
                });
            });





            $(document).on('click', '.edit_race',function (e){
                //no reload page
                e.preventDefault();
                var race_id = $(this).val(); //value=item.id
                //console.log(race_id);
                $('#EditRaceModal').modal('show');
                $.ajax({
                    type: 'GET',
                    url: '/edit-race/' + race_id,
                    dataType: "json",
                    success: function (response){
                        //console.log(response)
                        if(response.status == 404){
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);
                        }else {
                            //success -> print all data
                            $('#edit_name').val(response.race.name);
                            $('#edit_place').val(response.race.place);
                            $('#edit_circle').val(response.race.circle);
                            $('#edit_date').val(response.race.date);
                            $('#edit_time').val(response.race.time);
                            $('#edit_winner').val(response.race.winner);
                            $('#edit_race_id').val(race_id);
                        }
                    }
                });
            });

            //update race
            $(document).on('click','.update_race', function (e){
                e.preventDefault();
                $(this).text("Updating");
                var race_id = $('#edit_race_id').val();
                //console.log(race_id)
                var data = {
                    'name' :$('#edit_name').val(),
                    'place' :$('#edit_place').val(),
                    'circle' :$('#edit_circle').val(),
                    'date' :$('#edit_date').val(),
                    'time' :$('#edit_time').val(),
                    'winner' :$('#edit_winner').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                //put data
                $.ajax({
                    type: 'PUT',
                    url: '/update-race/'+race_id,
                    data: data,
                    dataType: "json",
                    success: function (response){
                       console.log(response);
                        if(response.status == 400){
                            //errors
                            $('#updateForm_errList').html("");
                            $('#updateForm_errList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_values) {
                                $('#updateForm_errList').append('<li>' + err_values + '</li>');
                            });
                            $('.update_race').text("Update");
                        } else if(response.status == 404){
                            $('#updateForm_errList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.update_race').text("Update");
                        }
                        else {
                            //success
                            $('#updateForm_errList').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#EditRaceModal').modal('hide');
                            $('.update_race').text("Update");
                            fetchrace();
                        }
                    }
                });
            });


            $(document).on('click', '.add_race', function (e) {
                e.preventDefault();
                var data = {
                    'name': $('.name').val(),
                    'place': $('.place').val(),
                    'circle': $('.circle').val(),
                    'date': $('.date').val(),
                    'time': $('.time').val(),
                    'winner': $('.winner').val(),
                }
                //console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/races',
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        //console.log(response);
                        if (response.status == 400) {
                            //prida zoznam chyb
                            $('#saveForm_errList').html("");
                            $('#saveForm_errList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_values) {
                                $('#saveForm_errList').append('<li>' + err_values + '</li>');
                            });
                        } else {
                            //empty errorlist
                            $('#saveForm_errList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#AddRaceModal').modal('hide');
                            $('#AddRaceModal').find('input').val("");
                            fetchrace();
                        }
                    }
                });
            });
        });
    </script>
@endsection
