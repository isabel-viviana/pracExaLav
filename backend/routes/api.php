<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ModuleController;

Route::apiResource('teachers', TeacherController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('modules', ModuleController::class);