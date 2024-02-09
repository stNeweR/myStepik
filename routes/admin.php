<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::as("admin.")->group(function () {
    Route::get("/", [AdminController::class, "index"])->name("index");

    Route::get("/links", [AdminController::class, "links"])->name("links");

    Route::as("users.")->prefix("users")->group(function () {
        Route::get("", [UserController::class, "index"])->name("index");
        Route::get("/{id}", [UserController::class, "show"])->name("show");
        Route::post("/{id}/restore", [UserController::class, "restore"])->name("restore");
        Route::delete("/{id}/delete", [UserController::class, "delete"])->name("delete");
    });
    Route::as("courses.")->prefix("courses")->group(function () {
        Route::get("", [CourseController::class, "index"])->name("index");
    });
    Route::as("lessons.")->prefix("lessons")->group(function () {
        Route::get("", [LessonController::class, "index"])->name("index");
    });

});
