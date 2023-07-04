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
                    <p class="m-0">Please select a grade to make Attendance</p>
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

    {{-- <!----------------------------------- Date ------------------------------- -->
    <div class="container-fluid">
        <h3 class="text-center">Attendance of 2080-01-27</h3>
    </div> --}}

    <!----------------------------- VIEW ATTENDANCE---------------------------------- -->
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Grades</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($grades as $grade)
                <tbody>
                    <tr>
                        <td>{{$grade->name}}</td>
                        <td>
                            <form action="/attendance/{{ $grade->id }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="/attendance/{{$grade->id}}/view" class="badge btn badge-primary">View Attendance</a>
                                <a href="{{ url('/attendance/create?grade_id=' . $grade->id) }}" class="badge bg-info">Make Attendance</a>

                                <button type="submit" class="badge btn badge-danger">Delete</button>

                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
