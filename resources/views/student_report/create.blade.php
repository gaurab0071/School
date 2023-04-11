@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
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
                        <p class="m-0 mb-2">Please fill out the details</p>
                        <a href="/student_report" class="btn btn-primary">Back</a>
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

        <!-- -----------------------------------------------------MAIN CONTENTS---------------------------------------------- -->
        <form action="/student_report" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="student-id">Student ID</label>
                                    <input type="text" class="form-control" id="student-id">
                                </div>
                                <div class="form-group">
                                    <label for="roll-no">Roll No</label>
                                    <input type="text" class="form-control" id="roll-no">
                                </div>
                                <div class="form-group">
                                    <label for="student-name">Student Name</label>
                                    <input type="text" class="form-control" id="student-name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="section">Section</label>
                                    <input type="text" class="form-control" id="section">
                                </div>
                                <div class="form-group">
                                    <label for="academic-year">Academic Year</label>
                                    <input type="text" class="form-control" id="academic-year">
                                </div>
                                <div class="form-group">
                                    <label for="select-grade">Select Grade</label>
                                    <select class="form-control" id="select-grade" name="grade_id" data-search="true"
                                        data-silent-initial-value-set="true">
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Subjects</th>
                                        <th>Full Marks</th>
                                        <th>Pass Marks</th>
                                        <th>Obtained Grade (Theory)</th>
                                        <th>Obtained Grade (Practical)</th>
                                    </tr>
                                </thead>

                                @foreach ($subjects as $subject)
                                    <tbody>
                                        <tr>
                                            <td>{{ $subject->id }}</td>
                                            <td>{{ $subject->name }}</td>
                                            <td><input type="text" class="form-control" id="full-marks"></td>
                                            <td><input type="text" class="form-control" id="pass-marks"></td>
                                            <td><input type="text" class="form-control" id="obtained-grade-theory"></td>
                                            <td><input type="text" class="form-control" id="obtained-grade-practical">
                                            </td>
                                        </tr>
                                        <!-- Add more rows for additional subjects -->
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
