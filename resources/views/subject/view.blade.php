@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Grade {{ $grades->name }} Subjects</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Subjects</li>
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
            <a href="/subject" class="mb-2 mx-2 btn btn-primary">Back</a>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        @if (count($subjects) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Book Name</th>
                                        <th>Publication</th>
                                        <th>Academic Year</th>
                                        <th>Subject Teacher</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $subject)
                                        <tr>
                                            <td>{{ $subject->subject_code }}</td>
                                            <td>{{ $subject->name }}</td>
                                            <td>{{ $subject->publication }}</td>
                                            <td>{{ $subject->academic_year }}</td>
                                            <td>{{ $subject->teacher->name }}</td>
                                            <td style="display: inline-block;">
                                                <form action="/subject/{{ $subject->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="/subject/{{ $subject->id }}/edit"
                                                        class="badge bg-info">Edit</a>
                                                    <button type="submit" class="badge btn bg-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        @else
                            <h3>No subjects found.</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
