@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Grade {{ $grades->name }} Attendance</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ol>
                </div><!-- /.col -->


                <div class="col-sm-6">
                    <a href="/attendance" class="mb-2 btn btn-primary">Back</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- ----------------------------------MAin COntents-------------------------------- -->

    

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
                            @foreach($student->attendance as $attendance)
                            
                            {{ $attendance->status }}
                           
                            @endforeach
                        </td>
                        <td>
                            @foreach($student->attendance as $attendance)
                            
                            {{ $attendance->comment }}
                            
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
</div>
@endsection
