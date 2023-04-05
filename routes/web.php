<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as ComponentRoutingRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('/teacher', function () {
    return view('teacher.index');
});


Route::get('/create', function () {
    return view('teacher.create');
});

Route::get('/grade', function () {
    return view('grade.index');
});

Route::get('/subject', function () {
    return view('subject.index');
});

Route::get('student_report', [PageController::class, 'student_report']);


Route::resource('teacher', TeacherController::class);

Route::resource('grade', GradeController::class);

Route::resource('student', StudentController::class);

Route::get('/student/{grade_id}/view', [StudentController::class, 'show']);

Route::resource('subject', SubjectController::class);
Route::get('/subject/{grade_id}/view', [SubjectController::class, 'show']);
Route::get('/subject/{teacher_id}/view', [SubjectController::class, 'show']);







