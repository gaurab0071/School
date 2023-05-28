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
                    <a href="/student" class="mb-2 btn btn-primary">Back</a>
                    <a href="/attendance/view" class="mb-2 btn btn-info">Check record</a>
                </div>

                <!-- search bar  -->
                <div class="col-sm-6 col-md-6">
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

    <!----------------------------------- Date ------------------------------- -->
    <div class="container-fluid">
        <h3 class="text-center">Attendance of 2080-01-27</h3>
    </div>




    <!----------------------------- VIEW ATTENDANCE---------------------------------- -->
    <form action="/attendance" method="post">
        @csrf
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Attendance</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $student->idnumber }}</td>
                            <td>{{ $student->name }}</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status[{{ $student->id }}]" value="present">
                                    <label class="form-check-label text-success" for="present">P</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status[{{ $student->id }}]" value="absent">
                                    <label class="form-check-label text-danger" for="absent">A</label>
                                </div>
                            </td>
                            <td>
                                <input class="form-control" type="text"  name="comment[{{ $student->id }}]">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>  
</div>
@endsection
