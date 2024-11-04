@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Manage Teachers</h1>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Teacher
            </button>
        </div>
        <div class="col-12">
            <div id="Show_all_teacherdata"></div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="#" id="add_teacher_form">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="FName" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="LName" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control" name="DOB" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Age</label>
                                        <input type="number" class="form-control" name="age" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender">
                                            <option selected>Choose...</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Grade</label>
                                        <input type="number" class="form-control" name="grade" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" name="subject" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="add_teacher_butn">Add
                                        Teacher</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!--Edit Modal -->
            <div class="modal fade" id="editTeacherModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Teacher</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="#" id="update_teacher_form">
                            <div class="modal-body">
                                @csrf

                                <input type="hidden" name="teacher_id" id="teacher_id">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" id="FName" name="FName" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" id="LName" name="LName"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control" id="DOB" name="DOB"
                                            required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Age</label>
                                        <input type="number" class="form-control" id="age" name="age"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg">
                                        <label>Gender</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option selected>Choose...</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Grade</label>
                                        <input type="number" class="form-control" id="grade" name="grade"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" id="subject" name="subject"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg">
                                        <label>Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="update_teacher_butn">Update
                                        Teacher</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $(document).ready(function() {


            // Add TEacher 
            $('#add_teacher_form').submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $('#add_teacher_butn').text('Adding...');

                $.ajax({
                    url: '{{ route('teacher.store') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {

                            Swal.fire({
                                title: "Added",
                                text: "Teacher Added Successfully !",
                                icon: "success"
                            });
                            $('#add_teacher_butn').text('Add Student');
                            $('#add_teacher_form')[0].reset();
                            $('#exampleModal').modal('hide');
                            showallteacher();

                        }
                    }
                });
            });

            // Edit Teacher 
            $(document).on('click', '.editTeacherBtn', function(e) {
                e.preventDefault();
                var id = $(this).attr('id');

                $.ajax({
                    url: '{{ route('teacher.edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#FName').val(response.first_name);
                        $('#LName').val(response.last_name);
                        $('#DOB').val(response.DOB);
                        $('#age').val(response.age);
                        $('#gender').val(response.gender);
                        $('#grade').val(response.grade);
                        $('#subject').val(response.subject);
                        $('#address').val(response.address);

                        $('#teacher_id').val(response.id);
                    }
                });
            });

            // Update Teacher 
            $('#update_teacher_form').submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $('#update_teacher_butn').text('Updating...');

                $.ajax({
                    url: '{{ route('teacher.update') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {

                            Swal.fire({
                                title: "Added",
                                text: "Teacher Added Successfully !",
                                icon: "success"
                            });
                            $('#add_teacher_butn').text('Add Student');
                            $('#add_teacher_form')[0].reset();
                            $('#editTeacherModal').modal('hide');
                            showallteacher();

                        }

                    }
                });
            });


            showallteacher();

            // Show Teacher 
            function showallteacher() {
                $.ajax({

                    url: '{{ route('teacher.show') }}',
                    method: 'get',
                    success: function(response) {
                        $('#Show_all_teacherdata').html(response);
                        $('#myTable').DataTable();
                    }
                });
            }
        });
    </script>
@endpush

@push('css')
    <style>
        .modal-dialog {
            max-width: 60%;
            margin-top: 15vh;
        }

        form label {
            color: black;
            font-size: 20px;
        }
        
        h1 {
            color: red;
            text-align: center;
            font-weight: 700;
            font-size: 50px;
        }

        .table tbody i {
            margin-right: 15px;
        }

        .table tbody .fa-trash-alt {
            color: red;
        }

        .table tbody .fa-id-card {
            color: green;
        }
    </style>
@endpush
