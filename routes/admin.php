<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/admin/users/find", [UserController::class, 'find'])->middleware('admin')->name('admin.users.find');
Route::get("/admin/courses/find", [CourseController::class, "find"])->middleware('admin')->name("admin.courses.find");
Route::get("/admin/lessons/find", [LessonController::class, 'find'])->middleware('admin')->name('admin.lessons.find');


Route::as("admin.")->prefix("admin")->middleware("admin")->group(function () {
    Route::get("/", [AdminController::class, "index"])->name("index");

    Route::as("users.")->prefix("users")->group(function () {
        Route::get("", [UserController::class, "index"])->name("index");
        Route::get("/{id}", [UserController::class, "show"])->name("show");
        Route::get("/{id}/edit", [UserController::class, "edit"])->name("edit");
        Route::put("/{id}", [UserController::class, "update"])->name("update");
        Route::post("/{id}/restore", [UserController::class, "restore"])->name("restore");
        Route::delete("/{id}/delete", [UserController::class, "delete"])->name("delete");
    });
    Route::as("courses.")->prefix("courses")->group(function () {
        Route::get("", [CourseController::class, "index"])->name("index");
        Route::get("/{id}", [CourseController::class, "show"])->name("show");
        Route::get("/{id}/edit", [CourseController::class, "edit"])->name("edit");
        Route::put("/{id}", [CourseController::class, "update"])->name("update");
        Route::delete("/{id}/delete", [CourseController::class, "delete"])->name("delete");
        Route::post("/{id}/restore", [CourseController::class, "restore"])->name("restore");
    });
    Route::as("lessons.")->prefix("lessons")->group(function () {
        Route::get("", [LessonController::class, "index"])->name("index");
        Route::get("/{id}", [LessonController::class, "show"])->name("show");
//        Route::post("/find", [LessonController::class, "find"])->name("find");
        Route::delete("/{id}/delete", [LessonController::class, "delete"])->name("delete");
        Route::post("/{id}/restore", [LessonController::class, "restore"])->name("restore");
    });
});
