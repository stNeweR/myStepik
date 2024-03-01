<?php

use App\Http\Controllers\Main\Auth\LoginController;
use App\Http\Controllers\Main\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::middleware("guest")->group(function () {
    Route::as("register.")->prefix("/register/")->group(function () {
        Route::get("", RegisterController::class)->name("index");
        Route::post("", [RegisterController::class, "create"])->name("create");
    });

    Route::as("login.")->prefix("/login/")->group(function () {
        Route::get("", LoginController::class)->name("index");
        Route::post("", [LoginController::class, "create"])->name("create");
    });
});

Route::middleware("auth")->group(function () {
    Route::post("/logout", [LoginController::class, "destroy"])->name("logout");
});
