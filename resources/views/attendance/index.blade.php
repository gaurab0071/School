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

        <!-- ------------------------------------------------SELECT GRADE OPTIONS--------------------------------------------------- -->

        {{-- <div class="container-fluid">
            <div class="content">
                <div class="row ">
                    @foreach ($grades as $grade)
                        <div class="col-lg-3 col-sm-12">
                            <div class=" card-body">
                                <a href="/student_report/create"
                                    class="btn btn-primary d-flex aligns-items-center justify-content-center">
                                    {{ $grade->name }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}

        <!----------------------------------------------------------------- VIEW ATTENDANCE---------------------------------- -->
        @foreach ($grades as $grade)
            <table class="table">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Grade</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>
        @endforeach















    </div>
@endsection
