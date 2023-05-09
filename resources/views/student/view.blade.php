@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Grade {{ $grades->name }} Students</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">students</li>
                    </ol>
                </div><!-- /.col -->

                <!--Select text -->
                <div class="col-sm-6">
                    <a href="/student" class="mb-2 btn btn-primary">Back</a>
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


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (count($students) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID No.</th>
                                <th>Roll No.</th>
                                <th>Student's Name</th>
                                <th>Parent's Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Report</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->idnumber }}</td>
                                <td>{{ $student->roll }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->parent }}</td>
                                <td>{{ $student->contact }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->gender }}</td>
                                <td><img src="{{ asset($student->report) }}" width="50" alt=""></td>
                                <td>
                                    <form action="/student/{{ $student->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="/student/{{ $student->id }}/edit" class="badge bg-info">Edit</a>
                                        <button type="submit" class="badge btn bg-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3>No students found.</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
