@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-12 content-1">
            <div class="box-1">
                <h1>Student Register</h1>
                <a href="{{ url('student') }}">Back</a>
            </div>
            <div class="card">
                <div class="box-2">
                    <p>First Name -:</p>
                    <h5>{{ $show_view_data->FName }}</h5>
                </div>
                <div class="box-2">
                    <p>Last Name -:</p>
                    <h5>{{ $show_view_data->LName }}</h5>
                </div>
                <div class="box-2">
                    <p>DOB -:</p>
                    <h5>{{ $show_view_data->DOB }}</h5>
                </div>
                <div class="box-2">
                    <p>Age -:</p>
                    <h5>{{ $show_view_data->age }}</h5>
                </div>
                <div class="box-2">
                    <p>Gender -:</p>
                    <h5>{{ $show_view_data->gender }}</h5>
                </div>
                <div class="box-2">
                    <p>Address -:</p>
                    <h5>{{ $show_view_data->address }}</h5>
                </div>
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

        .box-2 {
            position: relative;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .box-2 p {
            min-width: 150px;
            color: black;
            font-size: 22px;
        
        }
        .box-2 h5 {
            min-width: 200px;
            color: black;
            font-weight: 700;
            font-size: 22px;
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
