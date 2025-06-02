<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\IndustryController;
use App\Http\Controllers\Api\V1\InternshipController;
use App\Http\Controllers\Api\V1\StudentController;
use App\Http\Controllers\Api\V1\TeacherController;

Route::get('/ping', function () {
    return response()->json(['message' => 'API is working']);
});

Route::apiResource('students', StudentController::class);
Route::apiResource('teachers', TeacherController::class);
Route::apiResource('industries', IndustryController::class);
Route::apiResource('internships', InternshipController::class);