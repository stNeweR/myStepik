<?php

use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LessonConttoller;
use App\Http\Controllers\Api\SurveyController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::as("api.")->middleware("auth:sanctum")->group(function () {
    Route::prefix("courses/")->as("courses.")->group(function () {
        Route::get("", [CourseController::class, "index"])->name("index");
        Route::get("myCourses", [CourseController::class, "userCourse"])->name("userCourse");
    });
    Route::prefix("users/")->as("users.")->group(function () {
        Route::get("", [UserController::class, "index"])->name("index");
    });
    Route::prefix("lessons/")->as("lessons")->group(function () {
        Route::get("", [LessonConttoller::class, "index"])->name("index");
    });
    Route::prefix("surveys/")->as("survey")->group(function () {
        Route::get("", [SurveyController::class, "index"])->name("index");
    });
});
