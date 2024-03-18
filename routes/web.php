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

Route::prefix("/catalog/")->as("catalog.")->group(function () {
    Route::get("", [CatalogController::class, "index"]);
    Route::get("find", [CatalogController::class, "find"])->name('find');
});

Route::prefix("/courses/{theme_id}/")->middleware('author')->as("courses.themes.")->group(function () {
    Route::get("edit", [ThemeController::class, "edit"])->name("edit");
    Route::put("update", [ThemeController::class, "update"])->name('update');
    Route::delete("delete", [ThemeController::class, 'delete'])->name('delete');
});

Route::middleware("auth")->group(function () {
    Route::get("/course/create", [CourseController::class, "create"])->name("courses.create");
    Route::get("/myCourses", [CourseController::class, "myCourses"])->name("myCourses");
    Route::get("/myCourses/find", [CourseController::class, 'find'])->name('myCourse.find');
});
Route::prefix("/courses/")->as("courses.")->group(function () {
    Route::get("{course_id}", [CourseController::class, "show"])->name("show");
    Route::post("store", [CourseController::class, "store"])->name("store");
    Route::put("{course_id}/publish", [CourseController::class, 'publish'])->name('publish');
    Route::put("{course_id}/unpublish", [CourseController::class, "unpublish"])->name('unpublish');
    Route::delete('{course_id}/delete', [CourseController::class, "delete"])->name("delete");
    Route::middleware("author")->group(function () {
        Route::get("{course_id}/edit", [CourseController::class, "edit"])->name("edit");
        Route::put("{course_id}", [CourseController::class, "update"])->name("update");
    });
    Route::post("{course_id}/subscribe", [CourseController::class, "subscribe"])->name("subscribe");
    Route::delete("{course_id}/unsubscribe", [CourseController::class, "unSubscribe"])->name("unsubscribe");
    Route::prefix("{course_id}/themes/")->middleware("author")->as("themes.")->group(function () {
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
    Route::middleware('author')->group(function () {
        Route::get("{lesson_id}/edit", [LessonController::class, 'edit'])->name("edit");
        Route::put('{lesson_id}/update', [LessonController::class, 'update'])->name('update');
        Route::delete('{lesson_id}/delete', [LessonController::class, 'delete'])->name('delete');
    });
    Route::middleware("author")->group(function () {
        Route::get("{theme_id}/create", [LessonController::class, "create"])->name("create");
        Route::post("{theme_id}/store", [LessonController::class, "store"])->name("store");
    });
});

Route::prefix("/surveys/")->as("surveys.")->middleware("auth")->group(function () {
    Route::post("{lesson_id}/", [SurveyController::class, "check"])->middleware("auth")->name("check");
    Route::post("{lesson_id}/store", [SurveyController::class,"store"])->name("store");
    Route::delete('{survey_id}/delete', [SurveyController::class, 'delete'])->name('delete');
});

Route::prefix("/options/")->as('options.')->group(function () {
    Route::post("{survey_id}/store", [OptionController::class,"store"])->name("store");
    Route::post("{survey_id}/success/store", [OptionController::class,"succesStore"])->name("succes.store");
});
