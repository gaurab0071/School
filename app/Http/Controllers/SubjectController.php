<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Subject;
use Psy\Command\WhereamiCommand;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        $grade_id = null;
        return view ('subject.index',compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view ('subject.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = new Subject();
        $subject->book_num = $request->book_num;
        $subject->name = $request->name;
        $subject->publication = $request->publication;
        $subject->academic_year = $request->academic_year;
        $subject->grade_id = $request->grade_id;
        $subject->save();
        toast("Subject Saved Successfully!", 'success');
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
        $subject = Subject::where('grade_id', $grade_id)->get();
        $grades = Grade::find($grade_id);
        return view('subject.view',compact('subject', 'grades'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subjects = Subject::find($id);
        $grades = Grade::all();
        return view('subject.edit', compact('subjects', 'grades'));

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
        $subject = Subject::findOrFail($id);
        $subject->book_num = $request->book_num;
        $subject->name = $request->name;
        $subject->publication = $request->publication;
        $subject->academic_year = $request->academic_year;
        $subject->grade_id = $request->grade_id;
        $subject->update();
        toast("Subject Updated Successfully!", 'success');
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
        //
    }
}
