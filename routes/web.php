<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\UserController;
use App\Http\Controllers\Main\CatalogController;
use App\Http\Controllers\Main\CourseController;
use App\Http\Controllers\Main\LessonController;
use App\Http\Controllers\Main\OptionController;
use App\Http\Controllers\Main\SurveyController;
use App\Http\Controllers\Main\ThemeController;

Route::view("/", "app.index")->name("home");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [UserController::class, "index"])->name("profile");
});

Route::prefix("/catalog")->as("catalog.")->group(function () {
    Route::get("", [CatalogController::class, "index"]);
});

Route::middleware("auth")->group(function () {
    Route::get("/course/create", [CourseController::class, "create"])->name("courses.create");
    Route::get("/myCourses", [CourseController::class, "myCourses"])->name("myCourses");
});
Route::prefix("/courses/")->as("courses.")->group(function () {
    Route::get("{id}", [CourseController::class, "show"])->name("show");
    Route::post("store", [CourseController::class, "store"])->name("store");
    Route::get("{id}/edit", [CourseController::class, "edit"])->name("edit");
    Route::put("{id}", [CourseController::class, "update"])->name("update");
    Route::post("{id}/subscribe", [CourseController::class, "subscribe"])->name("subscribe");
    Route::delete("{id}/unsubscribe", [CourseController::class, "unSubscribe"])->name("unsubscribe");
    Route::prefix("{id}/themes/")->as("themes.")->group(function () {
        Route::get("create", [ThemeController::class, "create"])->name("create");
        Route::post("store", [ThemeController::class, "store"])->name("store");
    });
});

Route::prefix("/lessons/")->as("lessons.")->group(function () {
    Route::middleware("isSubscribe")->group(function () {
        Route::get("{lesson_id}", [LessonController::class, "show"])->name("show");
        Route::post("{lesson_id}/succes", [LessonController::class, "succes"])->name("succes");
        Route::delete("{lesson_id}/unsuccess", [LessonController::class, "unsuccess"])->name("unsuccess");
    });
    Route::middleware("author")->group(function () {
        Route::get("{theme_id}/create", [LessonController::class, "create"])->name("create");
        Route::post("{theme_id}/store", [LessonController::class, "store"])->name("store");
    });
});

Route::prefix("/surveys")->middleware("auth")->as("surveys.")->group(function () {
    Route::post("/{id}/", [SurveyController::class, "check"])->name("check");
    Route::post("/{lesson_id}/store", [SurveyController::class,"store"])->name("store");
});

Route::post("/options/{survey_id}/store", [OptionController::class,"store"])->name("options.store");
Route::post("/options/{survey_id}/succes/store", [OptionController::class,"succesStore"])->name("options.succes.store");
