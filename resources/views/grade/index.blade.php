@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Classes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Classes</li>
                    </ol>
                </div><!-- /.col -->


                <!-- add student button -->
                <div class="col-sm-6">
                    <a href="/grade/create" class="mb-2 btn btn-info">+ Add new Class</a>
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



    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Class</th>
                        <th>Class Teacher</th>
                        <th>No of Students</th>
                        <th>Class Section</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($grades as $grade)
                <tbody>
                    <tr>
                        <td>{{ $grade->id }}</td>
                        <td>{{ $grade->name }}</td>
                        <td>{{ $grade->teacher }}</td>
                        <td>{{ $grade->number }}</td>
                        <td>{{ $grade->section }}</td>
                        <td>
                            <form action="/grade/{{ $grade->id }}" method="post">
                                @csrf
                                {{-- @method('delete') --}}
                                {{-- <a href="/attendance/{{ $grade->id }}/index" class="badge bg-primary">View</a> --}}
                                <a href="/grade/{{ $grade->id }}/edit" class="badge bg-info">Edit</a> </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="pagination">
            {{ $grades->links() }}
        </div>
    </div>
</div>

@endsection
