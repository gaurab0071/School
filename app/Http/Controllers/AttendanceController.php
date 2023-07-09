<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\View\ViewName;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('attendance.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $grade_id = $request->query('grade_id');
        $grade = Grade::findOrFail($grade_id);
        $students = $grade->students;
        return view('attendance.create', compact('students', 'grade'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->input('date');
        $statuses = $request->input('status');
        $comments = $request->input('comment');

        if ($statuses && is_array($statuses)) {
            foreach ($statuses as $studentId => $status) {
                $attendance = new Attendance();
                $attendance->date = $date;
                $attendance->idnumber = $studentId;
                $attendance->status = $status;
                $attendance->comment = $comments[$studentId] ?? null;
                $attendance->save();
                toast("Record Saved Successfully !", 'success');
            }
        }

        return redirect()->back()->with('success', 'Attendance saved successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($grade_id, Request $request)
    {
        $date = $request->input('date') ?? Attendance::latest('date')->value('date');
        $students = Student::where('grade_id', $grade_id)->get();
        foreach ($students as $student) {
            $attendance = Attendance::where('idnumber', $student->id)->where('date', $date);
            $student->attendance = $attendance;
        }
        $grades = Grade::find($grade_id);
        $attendance = Attendance::all();
        return view('attendance.view', compact('students', 'grades', 'date', 'attendance'));
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
}
