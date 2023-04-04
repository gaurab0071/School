@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Subjects</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Subjects</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->

            <!-- search bar  -->
            <div class="container-fluid">
                <div class="row "></div>
                <nav class="navbar-light bg-light float-right  ">

                    <form class="d-flex">
                        <input class="form-control mx-2 me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </nav>
            </div>
            <!-- add student button -->
            <a href="/subject/create" class="mb-2 mx-2 btn btn-info">+ Add new Subject</a>


            <!-- Divider -->
            <hr class="mt-1 mb-2" />
            <!-- Divider end -->

            <div class="content">
                <div class="container-fluid">
                    <div class="row ">
                        @foreach ($grades as $grade)
                            <div class="col-lg-3 col-sm-12">
                                <div class="card" style="width: 15rem; height: 5rem">
                                    <div class="col-12 card-body ">
                                        <a href="/subject/{{ $grade->id }}/view"
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
