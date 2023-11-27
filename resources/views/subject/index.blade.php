@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Subjects</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Subjects</li>
                    </ol>
                </div><!-- /.col -->

                <!-- add student button -->
                <div class="col-sm-6">
                    <a href="/subject/create" class="mb-2 btn btn-info">+ Add new Subject</a>
                </div>
            </div><!-- row -->
        </div><!-- container-fluid -->
    </div><!-- conetnt header -->

    {{-- <!-- Divider -->
    <hr class="mt-1 mb-2" />
    <!-- Divider end --> --}}

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Search Subjects</h3>
            </div>
            <form method="get" action="/subject">
                <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="grade_id">Select Grade to view subjects</label>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive">
                        @if ($selectedGrade)
                        @if ($subjects->isEmpty())
                        <h3>No subjects found for this grade.</h3>
                        @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Book Name</th>
                                    <th>Full Marks</th>
                                    <th>Pass Marks</th>
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
                                    <td>{{ $subject->full_marks }}</td>
                                    <td>{{ $subject->pass_marks }}</td>
                                    <td>{{ $subject->publication }}</td>
                                    <td>{{ $subject->academic_year }}</td>
                                    <td>
                                        @if ($subject->teacher)
                                            {{ $subject->teacher->roles->pluck('name') }}
                                        @endif
                                    </td>
                                    <td>
                                        <form action="/subject/{{ $subject->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="/subject/{{ $subject->id }}/edit" class="badge bg-info">Edit</a>
                                            <button type="submit" class="badge btn bg-danger">Delete</button>
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
</div><!-- content-wrapper -->
<script>
    function resetSearch() {
        document.getElementById('grade_id').value = '';
        document.querySelector('form').submit();
    }

</script>
@endsection
