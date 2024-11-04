@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-12 content-1">
            <div class="box-1">
                <h1>Teacher Register</h1>
                <a href="{{ url('student') }}">Back</a>
            </div>
            <div class="card">

                <form method="POST" action="{{ route('student.update', $show_edit_data->id) }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-6">
                            <label>First Name</label>
                            <input type="text" class="form-control" id="FName" name="FName"
                                value="{{ $show_edit_data->FName }}">
                        </div>
                        <div class="col-6">
                            <label>Last Name</label>
                            <input type="text" class="form-control" id="LName" name="LName"
                                value="{{ $show_edit_data->LName }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" id="DOB" name="DOB"
                                value="{{ $show_edit_data->DOB }}">
                        </div>
                        <div class="col-6">
                            <label>Age</label>
                            <input type="number" class="form-control" id="age" name="age"
                                value="{{ $show_edit_data->age }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label>Gender</label>
                            <select class="form-control" id="gender" name="gender" value="">
                                <option>{{ $show_edit_data->gender }}</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label>Address</label>
                            <textarea type="text" class="form-control" id="address" name="address" rows="3" value="">{{ $show_edit_data->address }}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .box-1 {
            position: relative;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            padding-bottom: 50px;
            width: 100%;
        }

        .box-1 a {
            position: absolute;
            right: 20px;
            font-size: 16px;
            background-color: black;
            color: white;
            display: inline-block;
            padding: 10px 30px;
            border-radius: 15px;
            transition: 800ms;
        }
        .box-1 a:hover{
            background-color: green;
            text-decoration: none;
        }

        h1 {
            color: red;
            text-align: center;
            font-weight: 700;
            font-size: 50px;

        }

        .content-1 {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card {
            width: 70%;
            padding: 30px;
            border: 0px;
            border-radius: 20px;
            -webkit-box-shadow: 0px 0px 50px 0px rgba(0, 0, 0, 0.25);
            -moz-box-shadow: 0px 0px 50px 0px rgba(0, 0, 0, 0.25);
            box-shadow: 0px 0px 50px 0px rgba(0, 0, 0, 0.25);
        }
    </style>
@endpush
