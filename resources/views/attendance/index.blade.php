@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Student's Attendance</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Student's Attendance</li>
                    </ol>
                </div><!-- /.col -->

                <!--Select text -->
                <div class="col-sm-6">
                    <a href="/grade" class="mb-2 btn btn-primary">Back</a>
                    <a href="/attendance/create" class="mb-2 btn btn-info">+ Make Attendance</a>
                </div>

                <!-- search bar  -->
                <div class="col-sm-6">
                    <nav class="navbar-light bg-light float-sm-right">
                        <form class="d-flex ">
                            <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </nav>
                </div>
            </div><!-- /.row -->
        </div><!-- container -->
    </div><!-- /.content-header -->

    <!----------------------------- VIEW ATTENDANCE---------------------------------- -->

    <table class="table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Grade</th>
                <th>Date</th>
                <th>Status</th>
                <th>Comment</th>
            </tr>
        </thead>
        @foreach($attendances as $attendance)
            <tbody>
                <tr>
                    <td>{{ $attendance->name }}</td>
                    {{-- <td>{{ $attendance->grade_id }}</td> --}}
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->status }}</td>
                    <td>{{ $attendance->comment }}</td>
                </tr>
            </tbody>
        @endforeach
    </table>
</div>
@endsection
