<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\UserController;

Route::view("/", "app.index")->name("home");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [UserController::class, "index"])->name("profile");
});
