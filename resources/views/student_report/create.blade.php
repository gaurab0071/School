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
                    <p class="m-0 mb-2">Please fill out the details</p>
                    <a href="/student_report?grade_id={{ request('selected_grade_id') }}" class="btn btn-primary">Back</a>

                </div>
            </div><!-- /.row -->
        </div><!-- container-fluid -->
    </div><!-- /.content-header -->

    <!-- -----------------------------------------------------MAIN CONTENTS---------------------------------------------- -->
    <form action="{{ route('reports.store') }}" method="post" enctype="multipart/form-data">

        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}">
        <input type="hidden" name="selected_grade_id" value="{{ request('selected_grade_id') }}">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="student-id">Student ID</label>
                                <input type="text" class="form-control" id="student-id" value="{{ $student->idnumber }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="roll-no">Roll No</label>
                                <input type="text" class="form-control" id="roll-no" value="{{ $student->roll }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="student-name">Student Name</label>
                                <input type="text" class="form-control" id="student-name" value="{{ $student->name }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section">Section</label>
                                <input type="text" class="form-control" id="section" name="section">
                            </div>
                            <div class="form-group">
                                <label for="academic-year">Academic Year</label>
                                <input type="text" class="form-control" id="academic-year" name="academic_year">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="subject">
                            <thead>
                                <tr>

                                    <th>Subjects</th>
                                    <th>Full Marks</th>
                                    <th>Pass Marks</th>
                                    <th>Obtained Marks (Theory)</th>
                                    <th>Obtained Marks (Practical)</th>
                                    <th>Total Marks</th>
                                    <th>Grade Point</th>
                                    <th>Grade</th>
                                    <th>Result</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($subjects as $subject)
                                <tr>

                                    <td>{{ $subject->name }}</td>
                                    <td>
                                        <input type="text" name="full_marks[{{ $subject->id }}]" class="form-control" value="{{ $subjectsWithMarks->where('id', $subject->id)->first()->full_marks }}">
                                    </td>
                                    <td>
                                        <input type="text" name="pass_marks[{{ $subject->id }}]" class="form-control" value="{{ $subjectsWithMarks->where('id', $subject->id)->first()->pass_marks }}">
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="obtained_theory[{{ $subject->id }}]" class="form-control" oninput="calculateResults(this, 'theory')">
                                            @error("obtained_theory.{$subject->id}")
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="obtained_practical[{{ $subject->id }}]" class="form-control" oninput="calculateResults(this, 'practical')">
                                            @error("obtained_practical.{$subject->id}")
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>

                                    <td><input type="text" name="total_marks[{{ $subject->id }}]" class="form-control" value="{{ old('total_marks.' . $subject->id) }}"></td>

                                    <td><input type="text" name="grade_point[{{ $subject->id }}]" class="form-control" value="{{ old('grade_point.' . $subject->id) }}"></td>

                                    <td><input type="text" name="grade[{{ $subject->id }}]" class="form-control" value="{{ old('grade.' . $subject->id) }}"></td>

                                    <td><input type="text" name="result[{{ $subject->id }}]" class="form-control" value="{{ old('result.' . $subject->id) }}"></td>
                                </tr>
                                @endforeach
                            </tbody>


                        </table>
                        <div class="float-sm-right">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-danger" id="showCancelModal">Cancel</button>
                            <!-- Modal HTML -->
                            <div id="cancelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cancelModalLabel">Confirm Cancellation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to cancel? Any unsaved changes will be lost.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Keep Editing</button>
                                            <button type="button" class="btn btn-danger" id="confirmCancel">Yes, Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<script>
    // Function to fetch subjects based on the selected grade
    function fetchSubjects(gradeId) {
        // Fetch the subjects using AJAX
        $.ajax({
            url: `/api/grades/${gradeId}/subjects`
            , type: "GET"
            , dataType: "json"
            , headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            , }
            , success: function(response) {
                // Clear existing subjects from the table
                $("#subject tbody").empty();

                // Populate the table with fetched subjects
                response.subjects.forEach(function(subject) {
                    $("#subject tbody").append(
                        `<tr>
                            
                            <td>${subject.name}</td>
                            <td><input type="text"  name="full_marks[{{ $subject->id }}]" class="form-control"  value="{{ $subjectsWithMarks->where('id', $subject->id)->first()->full_marks }}" ></td>
                            <td><input type="text" name="pass_marks[{{ $subject->id }}]" class="form-control"  value="{{ $subjectsWithMarks->where('id', $subject->id)->first()->pass_marks }}"></td>
                            <td><input type="text" name="obtained_theory[{{ $subject->id }}]" class="form-control"  oninput="calculateResults(this, 'theory')"></td>
                            <td><input type="text" name="obtained_practical[{{ $subject->id }}]" class="form-control"  oninput="calculateResults(this, 'practical')"></td>
                            <td><input type="text" name="total_marks[{{ $subject->id }}]" class="form-control" value="{{ old('total_marks.' . $subject->id) }}"></td>
                            <td><input type="text" name="grade_point[{{ $subject->id }}]" class="form-control" value="{{ old('grade_point.' . $subject->id) }}"></td>
                            <td><input type="text" name="grade[{{ $subject->id }}]" class="form-control" value="{{ old('grade.' . $subject->id) }}"></td>
                            <td><input type="text" name="result[{{ $subject->id }}]" class="form-control" value="{{ old('result.' . $subject->id) }}"></td>
                        </tr>`
                    );
                });
            }
            , error: function(xhr, status, error) {
                // Handle error (optional)
                console.log("Error fetching subjects:", error);
            }
        , });
    }

    // Event listener for when the grade select dropdown value changes
    $("#grade_id").on("change", function() {
        const gradeId = $(this).val();
        if (gradeId) {
            fetchSubjects(gradeId);
        } else {
            // If no grade is selected, clear the table
            $("#subject tbody").empty();
        }
    });

    // Trigger the initial fetch when the page loads, if a grade is already selected
    const selectedGradeId = "{{ request('selected_grade_id') }}"
    if (selectedGradeId) {
        fetchSubjects(selectedGradeId);
    }

    // Show the cancel modal when the cancel button is clicked
    document.getElementById('showCancelModal').addEventListener('click', function() {
        $('#cancelModal').modal('show');
    });

    // Handle the confirmed cancellation
    document.getElementById('confirmCancel').addEventListener('click', function() {
        window.location.href = '{{ route("student_report.index") }}'; // Change to your desired route
    });





    // Function to calculate grade point based on total marks and full marks
    function calculateGradePoint(totalMarks, fullMarks) {
        // Your grading logic here
        // Modify this logic based on your specific criteria
        if (totalMarks >= 90 && totalMarks <= 100) {
            return 4.0;
        } else if (totalMarks >= 80 && totalMarks < 90) {
            return 3.6;
        } else if (totalMarks >= 70 && totalMarks < 80) {
            return 3.2;
        } else if (totalMarks >= 60 && totalMarks < 70) {
            return 2.8;
        } else if (totalMarks >= 50 && totalMarks < 60) {
            return 2.4;
        } else if (totalMarks >= 40 && totalMarks < 50) {
            return 2.0;
        } else if (totalMarks >= 35 && totalMarks < 40) {
            return 1.6;
        } else {
            return 0;
        }
    }

    function calculateGrade(gradePoint) {
        // Your grading logic here
        // Modify this logic based on your specific criteria
        if (gradePoint >= 4.0) {
            return 'A+';
        } else if (gradePoint >= 3.6) {
            return 'A';
        } else if (gradePoint >= 3.2) {
            return 'B+';
        } else if (gradePoint >= 2.8) {
            return 'B';
        } else if (gradePoint >= 2.4) {
            return 'C+';
        } else if (gradePoint >= 2.0) {
            return 'C';
        } else if (gradePoint >= 1.6) {
            return 'D';
        } else {
            return 'NG';
        }
    }

    // Function to calculate and update grade points when the page loads
    function calculateInitialGradePoints() {
        // Iterate through each subject row and calculate the initial grade point
        const subjectRows = document.querySelectorAll('table#subject tbody tr');
        subjectRows.forEach((row) => {
            const obtainedTheory = parseFloat(row.querySelector('[name^="obtained_theory"]').value || 0);
            const obtainedPractical = parseFloat(row.querySelector('[name^="obtained_practical"]').value || 0);
            const fullMarks = parseFloat(row.querySelector('[name^="full_marks"]').value || 0);
            const passMarks = parseFloat(row.querySelector('[name^="pass_marks"]').value || 0);
            const totalMarks = obtainedTheory + obtainedPractical;
            const gradePoint = calculateGradePoint(totalMarks, fullMarks);
            row.querySelector('[name^="grade_point"]').value = gradePoint.toFixed(3);
            const grade = calculateGrade(gradePoint);

            row.querySelector('[name^="grade"]').value = grade; // Update the grade column

        });
    }

    // Call the initial calculation function when the page loads
    calculateInitialGradePoints();

    function calculateResults(input, type) {
        // Find the closest row element containing the input
        const row = input.closest('tr');
        if (!row) {
            // Ensure that the 'row' element exists
            return;
        }

        // Get the values of the input fields within the row
        const obtainedTheory = parseFloat(row.querySelector('[name^="obtained_theory"]').value || 0);
        const obtainedPractical = parseFloat(row.querySelector('[name^="obtained_practical"]').value || 0);
        const fullMarks = parseFloat(row.querySelector('[name^="full_marks"]').value || 0);
        const passMarks = parseFloat(row.querySelector('[name^="pass_marks"]').value || 0);

        // Calculate the total marks as the sum of obtainedTheory and obtainedPractical
        const totalMarks = obtainedTheory + obtainedPractical;

        // Update the 'total_marks' input field with the calculated total marks
        row.querySelector('[name^="total_marks"]').value = totalMarks;

        // Calculate the grade point using your grading logic
        const gradePoint = calculateGradePoint(totalMarks, fullMarks);

        // Show or hide the "grade" and other fields based on conditions
        if (obtainedTheory >= passMarks) {
            // Update the 'grade_point' input field with the calculated grade point

            // Calculate the grade and result using your grading logic functions
            const grade = calculateGrade(gradePoint);
            const result = totalMarks >= passMarks ? 'Pass' : 'Fail';

            // Update the 'grade' and 'result' input fields with the calculated values
            row.querySelector('[name^="grade"]').value = grade; // Update the grade column
            row.querySelector('[name^="grade_point"]').value = gradePoint.toFixed(2);
            row.querySelector('[name^="result"]').value = result;
        } else {
            // If obtained marks theory is less than pass marks, clear the 'grade' and 'grade_point' input fields
            row.querySelector('[name^="grade"]').value = '';
            row.querySelector('[name^="grade_point"]').value = '';
            row.querySelector('[name^="result"]').value = '';
        }
    }

</script>

@endsection
