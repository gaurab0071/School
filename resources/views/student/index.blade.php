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
            <a href="/student/create" class="mb-2 mx-2 btn btn-info">+ Add new Student</a>
        </div>

        <!-- Divider -->
        {{-- <hr class="mt-1 mb-1" /> --}}
        <!-- Divider end -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="card" style="width: 15rem; height: 5rem">
                            <div class="card-body">
                                <a href="/student/view
                                "
                                    class="btn btn-primary d-flex aligns-items-center justify-content-center">Grade One</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card" style="width: 15rem; height: 5rem">
                            <div class="card-body">
                                <a href="/student/view
                                "
                                    class="btn btn-primary d-flex aligns-items-center justify-content-center">Grade Two</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card" style="width: 15rem; height: 5rem">
                            <div class="card-body">
                                <a href="/student/view
                                "
                                    class="btn btn-primary d-flex aligns-items-center justify-content-center">Grade Two</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card" style="width: 15rem; height: 5rem">
                            <div class="card-body">
                                <a href="/student/view
                                "
                                    class="btn btn-primary d-flex aligns-items-center justify-content-center">Grade Two</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    function openPdf() {
        var iframe = document.getElementById('pdf-iframe');
        iframe.src = '/path/to/your/pdf'; // Replace with the path to your PDF file
        iframe.style.display = 'block';
        iframe.requestFullscreen(); // Make the iframe full screen
    }
</script>
