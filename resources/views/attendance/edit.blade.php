@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <a href="/attendance" class="mb-2 btn btn-primary">Back</a>
                    </div>
                    <!-- Date bar  -->
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <nav class="navbar-light bg-light float-sm-right">
                                <form class="d-flex">

                                </form>
                            </nav>
                        </div>
                    </div>

                    <form action="/attendance/{{ $grade->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="col-sm-4 mb-2">
                            <input type="date" class="form-control d-flex" for="date" name="date" id="date" >
                        </div>

                        <div class="container-fluid">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Attendance</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->idnumber }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status[{{ $student->id }}]" value="status[{{ $student->id }}]">
                                                    <label class="form-check-label text-success" for="present" value="status[{{ $student->id }}]">P</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status[{{ $student->id }}]" value="status[{{ $student->id }}]">
                                                    <label class="form-check-label text-danger" for="absent" value="status[{{ $student->id }}]">A</label>
                                                </div>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="comment[{{ $student->id }}]">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
