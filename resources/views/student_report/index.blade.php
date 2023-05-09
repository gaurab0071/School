@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-6">
                        <h1 class="m-0">Student's Report</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Student's Report</li>
                        </ol>
                    </div><!-- /.col -->

                    <!--Select text -->
                    <div class="col-sm-6">
                        <p class="m-0">Please select a grade to make report</p>
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

        <div class="container-fluid">
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
        </div>

<!-- ---------------------------------------------------STUDENT REPORT SHOW------------------------------------------------ -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Student's Grade</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
