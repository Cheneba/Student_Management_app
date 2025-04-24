<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::resource('students', StudentController::class);

Route::resource('teacher', StudentController::class);

Route::resource('courses', CourseController::class);

Route::get('/', function () {
    return view('layout');
});
