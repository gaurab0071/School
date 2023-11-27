<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Grade;
use App\Models\Report;
use App\Models\Student;
use App\Models\Subject;
use Exception;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $grades = Grade::all();
        $query = Student::query()->orderBy('roll', 'asc');
        if ($request->has('grade_id')) {
            $gradeId  = $request->input('grade_id');
            $query->where('grade_id', $gradeId);
            $selectedGrade = Grade::find($gradeId);
        } else {
            $selectedGrade = null;
        }
        $students = $query->get();
        return view('student_report.index', compact('grades', 'selectedGrade', 'students'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $studentId = $request->query('student_id');
        $student = Student::find($studentId);

        if (!$student) {
            // For simplicity, let's assume it redirects to an error page:
            return redirect()->route('students.index')->with('error', 'Student not found.');
        }
        $grades = Grade::all();
        $selectedGradeId = $request->input('grade_id'); // Get the selected grade_id from the request
        // Get the subjects for the selected grade only
        $selectedGrade = $grades->firstWhere('id', $selectedGradeId);
        $subjects = $selectedGrade ? $selectedGrade->subjects : collect(); // Use collect() if no grade is selected
        // Fetch the full_marks and pass_marks data for the subjects
        $subjectsWithMarks = Subject::whereIn('id', $subjects->pluck('id')->toArray())
            ->select('id', 'full_marks', 'pass_marks')
            ->get();
        return view('student_report.create', compact('grades', 'subjects', 'student', 'subjectsWithMarks'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // dd('here');
    try {
        $selectedGradeId = $request->input('selected_grade_id');
        $studentId = $request->input('student_id');
    
        // Define validation rules for marks
        $validationRules = [];
        $reports = []; // Initialize an array to store report objects
    
        foreach ($request->input('full_marks') as $subjectId => $fullMarks) {
            $validationRules["full_marks.{$subjectId}"] = [
                'required',
                'numeric',
                Rule::in([$fullMarks]), // Ensure full_marks match the submitted value
            ];
            $validationRules["obtained_theory.{$subjectId}"] = [
                'required',
                'numeric',
                'lte:full_marks.' . $subjectId, // Ensure obtained_theory <= full_marks
            ];
            $validationRules["obtained_practical.{$subjectId}"] = [
                'required',
                'numeric',
                'lte:full_marks.' . $subjectId, // Ensure obtained_practical <= full_marks
            ];
    
            $validationRules["total_marks.{$subjectId}"] = [
                'required',
                'numeric',
                'lte:full_marks.' . $subjectId,
            ];
    
            // Create a new Report object for each subject
            $report = new Report();
            $report->full_marks = $fullMarks;
            $report->pass_marks = $request->input('pass_marks')[$subjectId];
            $report->obtained_theory = $request->input('obtained_theory')[$subjectId];
            $report->obtained_practical = $request->input('obtained_practical')[$subjectId];
            // Calculate total marks
            $report->total_marks = $report->obtained_theory + $report->obtained_practical;
            $report->grade_id = $selectedGradeId; // Set the grade_id
            $report->student_id = $studentId;
            $report->subject_id = $subjectId;
            // Calculate grade point, grade, and result using your grading logic functions
            list($report->grade_point, $report->grade, $report->result) = $this->calculateGrading($report->total_marks);
    
            // Add the report to the array
            $reports[] = $report;
        }
    
        // Validate the request data
        $validator = Validator::make($request->all(), $validationRules);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Save all reports in the array
        foreach ($reports as $report) {
            $report->save();
        }
    
        toast("Records Saved Successfully!", 'success');
        return redirect()->back();
    } catch (Exception $th) {
        dd( $th);
    }
    
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($grade_id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    private function calculateGrading($totalMarks)
    {
        $gradingData = [
            ['min' => 90, 'max' => 100, 'grade_point' => 4.0, 'grade' => 'A+', 'result' => 'Pass'],
            ['min' => 80, 'max' => 89, 'grade_point' => 3.6, 'grade' => 'A', 'result' => 'Pass'],
            ['min' => 70, 'max' => 79, 'grade_point' => 3.2, 'grade' => 'B+', 'result' => 'Pass'],
            ['min' => 60, 'max' => 69, 'grade_point' => 2.8, 'grade' => 'B', 'result' => 'Pass'],
            ['min' => 50, 'max' => 59, 'grade_point' => 2.4, 'grade' => 'C+', 'result' => 'Pass'],
            ['min' => 40, 'max' => 49, 'grade_point' => 2.0, 'grade' => 'C', 'result' => 'Pass'],
            ['min' => 35, 'max' => 40, 'grade_point' => 1.6, 'grade' => 'D', 'result' => 'Pass'],
            ['min' => 0, 'max' => 35, 'grade_point' => 0.0, 'grade' => 'NG', 'result' => 'Fail'],
            // Add more grading criteria as needed
        ];

        

        foreach ($gradingData as $grading) {
            if ($totalMarks >= $grading['min'] && $totalMarks <= $grading['max']) {
                return [$grading['grade_point'], $grading['grade'], $grading['result']];
            }
        }

        // Default to 'NG' grade if no matching range is found
    return [0.0, 'NG', 'Fail'];

        
    }
}
