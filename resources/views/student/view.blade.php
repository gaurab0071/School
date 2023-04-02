@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Students</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Students</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

            <!-- search bar  -->
            <nav class="navbar-light float-right mb-2 mx-2 ">
                <div class="container-fluid">
                    <form class="d-flex">
                        <input class="form-control mx-2 me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </nav>

            <!-- add teacher button -->
            <a href="/student" class="mb-2 mx-2 btn btn-primary">Back</a>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if (count($students) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
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
                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->idnumber }}</td>
                                            <td>{{ $student->roll }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->parent }}</td>
                                            <td>{{ $student->contact }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>{{ $student->gender }}</td>
                                            <td><img src="{{ asset($student->report) }}" width="50" alt=""></td>
                                            <td style="display: inline-block;">
                                                <form action="/student/{{ $student->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="/student/{{ $student->id }}/edit"
                                                        class="badge bg-info">Edit</a>
                                                    <button type="submit" class="badge btn bg-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        @else
                            <p>No students found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
