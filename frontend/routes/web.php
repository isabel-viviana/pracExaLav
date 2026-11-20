<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ModuleController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('teachers', TeacherController::class);
Route::resource('students', StudentController::class);
Route::resource('modules', ModuleController::class);