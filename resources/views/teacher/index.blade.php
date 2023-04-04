@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Teachers</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Teachers</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->

        <!-- search bar  -->
        <div class="container-fluid">
            <nav class="navbar-light float-right mb-2 mx-2 ">

                    <form class="d-flex">
                        <input class="form-control mx-2 me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

            </nav>
        </div>

        <!-- add teacher button -->
        <a href="/teacher/create" class="mb-2 mx-2 btn btn-info">+ Add new teacher</a>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($teachers as $teacher)
                            <tbody>
                                <tr>
                                    <td>{{ $teacher->id }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->contact }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td style="display: inline-block;">
                                        <form action="/teacher/{{ $teacher->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="/teacher/{{ $teacher->id }}/edit" class="badge bg-info">Edit</a>
                                            <button type="submit" class="badge btn bg-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div><!-- container-fluid -->

    </div>
@endsection
