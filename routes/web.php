<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('welcome');
// });

// Route::get('/teacher', function () {
//     return view('teacher.index');
// });


// Route::get('/create', function () {
//     return view('teacher.create');
// });

// Route::get('/grade', function () {
//     return view('grade.index');
// });

// Route::get('/create', function () {
//     return view('grade.create');
// });
// Route::get('/grade/{id}/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index');
// Route::get('/grade/{id}/student', 'GradeController@show');




Route::resource('teacher', TeacherController::class);
// Route::get('teacher', '\App\Http\Controllers\TeacherController@index');
// Route::delete('teacher', '\App\Http\Controllers\TeacherController@destroy');

Route::resource('grade', GradeController::class);
// Route::get('grade', '\App\Http\Controllers\GradeController@index');
// Route::delete('grade', '\App\Http\Controllers\GradeController@destroy');



// Route::get('/student', function () {
//     return view('student.index');
// });

Route::resource('student', StudentController::class);

// Route::get('/student', '\App\Http\Controllers\StudentController@show');
// Route::get('/grade/{id}/students', [GradeController::class, 'students'])->name('grade.students');

Route::get('/student/{grade_id}/view', [StudentController::class, 'show']);




// Route::delete('/student', '\App\Http\Controllers\StudentController@destroy');
// Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');



// Route::get('/student/{grade_id}', '\App\Http\Controllers\StudentController@show');






