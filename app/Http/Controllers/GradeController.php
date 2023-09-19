<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::with('teacher')->paginate(10);
        return view('grade.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('grade.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grade = new Grade();
        $grade->name = $request->name;
        $grade->teacher = $request->teacher;
        $grade->number = $request->number;
        $grade->section = $request->section;
        $grade->save();
        toast("Record Saved Successfully !", 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($grade_id)
    {
        $grades = Grade::find($grade_id);
        $students = $grades->students;
        $subjects = $grades->subjects;
        return view('student.view', compact('students', 'grades', 'subjects'));
    }

    public function getSubjects($gradeId)
    {
        $grade = Grade::find($gradeId);
        if (!$grade) {
            return response()->json(['error' => 'Grade not found'], 404);
        }
        $subjects = $grade->subjects;
        return response()->json(['subjects' => $subjects]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::all();
        $grade = Grade::find($id);
        return view('grade.edit', compact('grade', 'teachers'));
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
        $grade =  Grade::find($id);
        $grade->name = $request->name;
        $grade->teacher = $request->teacher;
        $grade->number = $request->number;
        $grade->section = $request->section;
        $grade->update();
        toast("Record Updated Successfully !", 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $grade = Grade::findOrfail($id);
        // $grade->delete();
        // toast("Record Deleted Successfully!", 'success');
        // return redirect('/grade');
    }
}
