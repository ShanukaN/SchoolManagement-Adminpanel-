@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Manage Student</h1>
            <a href="{{ route('REGstudent') }}" class="btn btn-success">Register Student</a>
        </div>
        <div class="col-12">
            <table class="table mt-5" action="{{ route('Viewstudent') }}">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">DoB</th>
                        <th scope="col">Age</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($show_data as $key => $student)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $student->FName }}</td>
                            <td>{{ $student->LName }}</td>
                            <td>{{ $student->DOB }}</td>
                            <td>{{ $student->age }}</td>
                            <td>
                                <a href="{{ route('student.edit', $student->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ route('student.delete', $student->id) }}"><i class="fas fa-trash-alt"></i></a>
                                <a href="{{ route('student.view', $student->id) }}"><i class="fas fa-id-card"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('css')
    <style>
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
