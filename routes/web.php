<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleandPermissionController;
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

Route::get('/', function () {
    return redirect('/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::middleware('guest')->get('/login', function () {
    return view('layouts.login');
})->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/enrollment-data', [DashboardController::class, 'getEnrollmentData']);


Route::resource('teacher', TeacherController::class);

// Route::get('/teacher-dashboard', [DashboardController::class, 'teacher'])->name('teacher.dashboard');


Route::resource('grade', GradeController::class);

Route::get('/student/{grade_id}/view', [StudentController::class, 'show'])->name('student.view');
Route::resource('student', StudentController::class);


Route::resource('attendance', AttendanceController::class);


Route::get('/attendance/{grade_id}/view', [AttendanceController::class, 'show']);
Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendance/{grade}', [AttendanceController::class, 'store']);

Route::get('/calendar', [CalendarController::class, 'index']);
Route::post('/calendar/create', [CalendarController::class, 'create']);
Route::post('/calendar/update', [CalendarController::class, 'update']);
Route::post('/calendar/delete', [CalendarController::class, 'delete']);


Route::resource('subject', SubjectController::class);
Route::get('/subject/{grade_id}/view', [SubjectController::class, 'show']);
Route::get('/subject/{teacher_id}/view', [SubjectController::class, 'show']);

Route::resource('student_report', ReportController::class);
Route::post('/student_report/store', [ReportController::class, 'store'])->name('reports.store');

// Route::resource('assign_roles', RolesController::class);
// Route::post('/assign_roles/{teacherId}', [RolesController::class, 'assignRoleToTeacher'])
//     ->name('assignRoleToTeacher');
// Route::get('/roles', 'RolesController@index')->name('roles.index');
// Route::get('/roles/create', 'RolesController@create')->name('roles.create');
// Route::post('/roles', 'RolesController@store')->name('roles.store');
// Route::get('/roles/{id}/edit', 'RolesController@edit')->name('roles.edit');
// Route::put('/roles/{id}', 'RolesController@update')->name('roles.update');




// Route::get('/api/grades/{grade}/subjects', 'App\Http\Controllers\GradeController@getSubjects');

Route::get('/api/grades/{grade}/subjects', [GradeController::class, 'getSubjects']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'admin'])->group(function () {

    // role routes
    Route::get('/role', [RoleandPermissionController::class, 'index'])->name('role.index');
    Route::post('/role/store', [RoleandPermissionController::class, 'storeRole'])->name('role.store');
    Route::post('/user/store', [RoleandPermissionController::class, 'createUser'])->name('store.custom.user');
    Route::get('/role/set/permission/{id}', [RoleandPermissionController::class, 'setPermission'])->name('role.set.permission');
    Route::post('/role/set/permission/store/{id}', [RoleandPermissionController::class, 'setPermissionStore'])->name('role.set.permissions');
    Route::get('/user/delete/{id}', [RoleandPermissionController::class, 'deleteUser'])->name('delete.custom.user');

});
Route::middleware(['auth', 'teacher'])->group(function () {
    // Define teacher-only routes here
    Route::resource('teacher', TeacherController::class);
    Route::resource('student', StudentController::class);
    Route::resource('grade', GradeController::class);
    
});
