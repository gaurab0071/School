@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Student's Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Student's Report</li>
                    </ol>
                </div><!-- /.col -->

                <!--Select text -->
                <div class="col-sm-6">
                    <p class="m-0">Please select a grade to make report</p>
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

    <!-- ------------------------------------------------SELECT GRADE OPTIONS--------------------------------------------------- -->

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Make Student Report</h3>
            </div>
            <form method="get" action="/student_report">
                <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="grade_id">Select Grade to make Report</label>
                                <select id="grade_id" class="form-control" name="grade_id" data-search="true" data-silent-initial-value-set="true">
                                    <option value="">Select</option>
                                    @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}" @if ($selectedGrade && $selectedGrade->id == $grade->id) selected @endif>{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Filter</button>
                            @if ($selectedGrade)
                            <button class="btn btn-outline-primary mx-1" type="button" onclick="resetSearch()">Reset</button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- ---------------------------------------------------STUDENT REPORT SHOW------------------------------------------------ -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive">
                        @if ($selectedGrade)
                        @if ($students->isEmpty())
                        <h3>No students found for this grade.</h3>
                        @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Roll No</th>
                                    <th>Student Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->idnumber }}</td>
                                    <td>{{ $student->roll }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>
                                        <form action="/student_report/{{ $student->id }}" method="post">
                                            @csrf
                                            <a href="{{ route('student_report.create', ['student_id' => $student->id, 'grade_id' => $selectedGrade->id, 'selected_grade_id' => $selectedGrade->id]) }}" class="badge bg-success">Create Report</a>
                                            <a href="/student_report/{{ $student->id }}/edit" class="badge bg-info">Edit</a>
                                            <a href="/student_report/{{ $student->id }}/edit" class="badge bg-primary">View</a>
                                            {{-- <button type="submit" class="badge btn bg-primary">Make Report</button> --}}
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function resetSearch() {
        document.getElementById('grade_id').value = '';
        document.querySelector('form').submit();
    }

    // Get the selected grade ID from the query parameter
    const urlParams = new URLSearchParams(window.location.search);
    const selectedGradeId = urlParams.get('grade_id');

    // Set the selected grade ID in the grade select dropdown
    if (selectedGradeId) {
        $('#grade_id').val(selectedGradeId);
    }

</script>

@endsection
