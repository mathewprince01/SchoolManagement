<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimetableController;
use Illuminate\Support\Facades\Route;



Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth', 'role:Admin,Teacher,Student')->group(function(){
    Route::resource('student', StudentController::class);
    Route::resource('teacher', TeacherController::class);

    Route::get('timetable_index', [TimetableController::class, 'index'])->name('timetable_index');
    Route::get('marks_list', [MarkController::class, 'index'])->name('marks_list');
    Route::get('student_pdf', [StudentController::class, 'studentPdf'])->name('student_pdf');
    Route::get('teacher_report', [TeacherController::class, 'teacherReport'])->name('teacher_report');

});

Route::middleware('auth', 'role:Teacher')->group(function(){
    Route::get('marks_create', [MarkController::class, 'create'])->name('marks_create');
    Route::post('marks_store', [MarkController::class, 'store'])->name('marks_store');
});

Route::middleware('auth', 'role:Admin')->group(function(){
    Route::get('timetable_create', [TimetableController::class, 'create'])->name('timetable_create');
    Route::post('timetable_store', [TimetableController::class , 'store'])->name('timetable_store');
    Route::get('getteacher', [TimetableController::class, 'getTeacher'])->name('getteacher');
    Route::get('mark_summary', [MarkController::class, 'markSummary'])->name('mark_summary');
    Route::get('top_performer', [MarkController::class, 'topPerformer'])->name('top_performer');
    Route::post('student_import', [StudentController::class, 'studentImport'])->name('student_import');
});

