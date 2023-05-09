@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <h1>Create Attendance</h1>
        <form action="{{ route('attendance.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" required>
                    @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="grade" class="col-sm-2 col-form-label">Grade</label>
                <div class="col-sm-10">
                    <select class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" required>
                        <option value="">Select a grade</option>
                        @foreach($grades as $grade)
                            <option value="{{ $grade->id }}" {{ old('grade') == $grade->id ? 'selected' : '' }}>{{ $grade->name }}</option>
                        @endforeach
                    </select>
                    @error('grade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                <div class="col-sm-10">
                    <select class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" required>
                        <option value="">Select a subject</option>
                    </select>
                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="students" class="col-sm-2 col-form-label">Students</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        @foreach($students as $student)
                            <input class="form-check-input" type="checkbox" id="student{{ $student->id }}" name="students[]" value="{{ $student->id }}" {{ in_array($student->id, old('students', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="student{{ $student->id }}">
                                {{ $student->name }}
                            </label>
                            <br>
                        @endforeach
                    </div>
                    @error('students')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
    <script>
        $(document).ready(function() {
            $('#grade').on('change', function() {
                var gradeId = $(this).val();
            if(gradeId) {
                $.ajax({
                    url: '/attendance/getSubjects/'+gradeId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#subject').empty();
                        $('#subject').append('<option value="">Select a subject</option>');
                        $.each(data, function(key, value) {
                            $('#subject').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            } else {
                $('#subject').empty();
                $('#subject').append('<option value="">Select a subject</option>');
            }
        });
    });
</script>

