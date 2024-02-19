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
        Route::post("/find", [UserController::class, "find"])->name("find");
        Route::get("/{id}/edit", [UserController::class, "edit"])->name("edit");
        Route::put("/{id}", [UserController::class, "update"])->name("update");
        Route::post("/{id}/restore", [UserController::class, "restore"])->name("restore");
        Route::delete("/{id}/delete", [UserController::class, "delete"])->name("delete");
    });
    Route::as("courses.")->prefix("courses")->group(function () {
        Route::get("", [CourseController::class, "index"])->name("index");
        Route::get("/{id}", [CourseController::class, "show"])->name("show");
        Route::get("/{id}/edit", [CourseController::class, "edit"])->name("edit");
        Route::post("/search", [CourseController::class, "search"])->name("search");
        Route::put("/{id}", [CourseController::class, "update"])->name("update");
        Route::delete("/{id}/delete", [CourseController::class, "delete"])->name("delete");
        Route::post("/{id}/restore", [CourseController::class, "restore"])->name("restore");
    });
    Route::as("lessons.")->prefix("lessons")->group(function () {
        Route::get("", [LessonController::class, "index"])->name("index");
        Route::get("/{id}", [LessonController::class, "show"])->name("show");
        Route::post("/search", [LessonController::class, "search"])->name("search");
        Route::delete("/{id}/delete", [LessonController::class, "delete"])->name("delete");
        Route::post("/{id}/restore", [LessonController::class, "restore"])->name("restore");
    });

});
