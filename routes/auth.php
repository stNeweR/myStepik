<?php

use App\Http\Controllers\App\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\LoginController;


Route::as("register.")->prefix("/register/")->group(function () {
    Route::get("", RegisterController::class)->name("index");
    Route::post("register", [RegisterController::class, "register"])->name("create");
});

Route::as("login.")->prefix("/login/")->group(function () {
    Route::get("", LoginController::class)->name("index");
    Route::post("login", [LoginController::class, "create"])->name("create");
});
