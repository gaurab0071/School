<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Grade;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $grades = Grade::paginate(10);
        $grade_id = null;
        return view('student.index', compact('grades', 'grade_id'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view('student.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->idnumber = $request->idnumber;
        $student->roll = $request->roll;
        $student->name = $request->name;
        $student->parent = $request->parent;
        $student->contact = $request->contact;
        $student->address = $request->address;
        $student->gender = $request->gender;
        if ($request->hasFile('report')) {
            $file = $request->report;
            $newName = time() . $file->getClientOriginalName();
            $file->move('report', $newName);
            $student->report = "report/$newName";
        }
        $student->grade_id = $request->grade_id;
        $student->save();
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
        $students = Student::where('grade_id', $grade_id)->get();
        $grades = Grade::find($grade_id);
        return view('student.view', compact('students', 'grades'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::find($id);
        $grades = Grade::all();
        return view('student.edit', compact('students', 'grades'));
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
        $student = Student::findOrFail($id);
        $student->idnumber = $request->idnumber;
        $student->roll = $request->roll;
        $student->name = $request->name;
        $student->parent = $request->parent;
        $student->contact = $request->contact;
        $student->address = $request->address;
        $student->gender = $request->gender;
        if ($request->hasFile('report')) {
            $file = $request->report;
            $newName = time() . $file->getClientOriginalName();
            $file->move('report', $newName);
            $student->report = "report/$newName";
        }
        $student->grade_id = $request->grade_id;
        $student->update();
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
        $student = Student::find($id);
        $student->delete();
        toast("Record Deleted Successfully!", 'success');
        return redirect()->back();
    }
}
