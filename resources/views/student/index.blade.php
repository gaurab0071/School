@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Students</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">students</li>
                    </ol>
                </div><!-- /.col -->

                <!--Select text -->
                <div class="col-sm-6">
                    <a href="/student/create" class="mb-2 btn btn-info">+ Add new Student</a>
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

    <!-- ----------------------------------Main contents-------------------------------------------- -->

    <div class="container-fluid">
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
                            <form action="/student/{{ $grade->id }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="/student/{{$grade->id}}/view" class="badge btn badge-primary">View</a>
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

{{-- <script>
    function openPdf() {
        var iframe = document.getElementById('pdf-iframe');
        iframe.src = '/path/to/your/pdf'; // Replace with the path to your PDF file
        iframe.style.display = 'block';
        iframe.requestFullscreen(); // Make the iframe full screen
    }
</script> --}}
