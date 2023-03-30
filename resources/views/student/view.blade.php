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
            <nav class="navbar-light float-right mb-2 mx-2 ">
                <div class="container-fluid">
                  <form class="d-flex">
                    <input class="form-control mx-2 me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
              </nav>

              <!-- add teacher button -->
            <a href="/student/create" class="mb-2 mx-2 btn btn-info">+ Add new Student</a>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>ID No.</th>
                                    <th>Roll No.</th>
                                    <th>Student's Name</th>
                                    <th>Parent's Name</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            {{-- @foreach ($teachers as $teacher)
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
                            @endforeach --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
