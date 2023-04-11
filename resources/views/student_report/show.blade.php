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
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <!-- search bar  -->
            <div class="container-fluid">
                <nav class="navbar-light bg-light float-sm-right">
                    <form class="d-flex ">
                        <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </nav>
            </div>

            <!--Select text -->
            <p class="m-0 col-sm-6 ">Please select a grade to make a reoprt</p>
        </div><!-- /.content-header -->


        <!-- Divider -->
        <hr class="mt-2 mb-4" />
        <!-- Divider end -->

        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    @foreach ($grades as $grade)
                        <div class="col-lg-3 col-sm-12">
                            <div class="card" style="width: 15rem; height: 5rem">
                                <div class="col-12 card-body ">
                                    <a href="/student_report/create"
                                        class="btn btn-primary d-flex aligns-items-center justify-content-center">
                                        {{ $grade->name }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
