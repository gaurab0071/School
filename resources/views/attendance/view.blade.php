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

    <form class="d-flex" method="GET" action="/attendance/{{ $grades->id}}/view" enctype="multipart/form-data">
        <div class="d-flex col-sm-4 mb-2">
            <input type="date" class="form-control d-flex" for="date" name="date" id="date" value="{{ $date }}" required>
            <button class="btn btn-outline-success mx-2" type="submit">Search</button>
            @if(request()->has('date'))
            <button class="btn btn-outline-primary mx-1" type="button" onclick="clearSearch()">Clear</button>
            @endif
        </div>
    </form>

    <div class="container-fluid">
        <div class="container-fluid text-center">
            <h1 class="m-0">Attendance of {{ $date }}</h1>
        </div>
        <div class="table-responsive">
            @if ($attendance->isEmpty() && $search)
            <h3>No attendance recorded for '{{ $search }}'.</h3>
            @elseif ($attendance->isEmpty())
            <p>No attendance found.</p>
            @else
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
                            @php
                            $attendance = $student->attendance->where('date', $date)->first();
                            @endphp
                            @if($attendance)
                            {{ $attendance->status }}
                            @else
                            No attendance recorded.
                            @endif
                        </td>
                        <td>
                            @if($attendance)
                            {{ $attendance->comment }}
                            @else
                            No Comment.
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
<script>
    function clearSearch() {
        document.getElementById('date').value = 'null';
        document.querySelector('form').submit();
    }

</script>
@endsection
