<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PageController extends Controller
{
    //home page function

    public function home()
    {
        return view('welcome');
    }

    //contact page function
    public function header()
    {
        return view('layouts.header');
    }

    //teachers page function

    public function teacher()
    {
        return view('teacher.index');
    }

    //classes page function
    public function grade()
    {
        return view('grade.index');
    }

    public function student()
    {
        return view('student.index');
    }


}
