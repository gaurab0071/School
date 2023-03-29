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


            <!-- search bar  -->
            <nav class="navbar-light bg-light float-right mb-2 mx-2 ">
                <div class="container-fluid">
                  <form class="d-flex">
                    <input class="form-control mx-2 me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
              </nav>


            <!-- add classes button -->
            <a href="/grade/create" class="mb-2 mx-2 btn btn-info">+ Add new subject</a>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Class</th>
                                    <th>Teacher</th>
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
                                        <td style="display: inline-block;">
                                            <form action="/grade/{{ $grade->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="/grade/{{ $grade->id }}/edit" class="badge btn bg-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ url('/student?filter=' . $grade->id) }}" class="badge btn bg-info">
                                                    <i class="fas fa-sliders-h"></i>
                                                  </a>

                                                <button type="submit" class="badge btn bg-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

