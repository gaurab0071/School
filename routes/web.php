<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::middleware('guest')->get('/login', function () {
    return view('layouts.login');
})->name('login');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/enrollment-data', [DashboardController::class, 'getEnrollmentData']);


Route::resource('teacher', TeacherController::class);



Route::resource('grade', GradeController::class);

Route::get('/student/{grade_id}/view', [StudentController::class, 'show'])->name('student.view');
Route::resource('student', StudentController::class);


Route::get('/calander', function () {
    return view('calander.index');
});




Route::resource('attendance', AttendanceController::class);


Route::get('/attendance/{grade_id}/view', [AttendanceController::class, 'show']);
Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendance/{grade}', [AttendanceController::class, 'store']);




Route::resource('subject', SubjectController::class);
Route::get('/subject/{grade_id}/view', [SubjectController::class, 'show']);
Route::get('/subject/{teacher_id}/view', [SubjectController::class, 'show']);

Route::resource('student_report', ReportController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

