<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\UserController;
use App\Http\Controllers\Main\CatalogController;
use App\Http\Controllers\Main\CourseController;
use App\Http\Controllers\Main\LessonController;
use App\Http\Controllers\Main\SurveyController;

Route::view("/", "app.index")->name("home");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [UserController::class, "index"])->name("profile");
});

Route::get("/catalog", [])->name("catalog");

Route::prefix("/catalog")->as("catalog.")->group(function () {
    Route::get("", [CatalogController::class, "index"]);
});

Route::prefix("/courses")->as("courses.")->group(function () {
    Route::get("/{id}", [CourseController::class, "show"])->name("show");
    Route::post("/{id}/subscribe", [CourseController::class, "subscribe"])->name("subscribe");
    Route::delete("/{id}/unsubscribe", [CourseController::class, "unSubscribe"])->name("unsubscribe");
});
Route::prefix("/lessons")->middleware("isSubscribe")->middleware("auth")->as("lessons.")->group(function () {
    Route::get("/{id}", [LessonController::class, "show"])->name("show");
    Route::post("/{id}/succes", [LessonController::class, "succes"])->name("succes");
    Route::delete("/{id}/unsuccess", [LessonController::class, "unsuccess"])->name("unsuccess");
});

Route::prefix("/surveys")->middleware("auth")->as("surveys.")->group(function () {
    Route::post("/{id}/", [SurveyController::class, "check"])->name("check");
});
