<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;


Route::post('/login', [AuthController::class, 'login'])->name("login");
Route::post("/register", [AuthController::class, "register"])->name("register");
Route::middleware("auth:sanctum")->group(function() {
    Route::post("/logout", [AuthController::class, "logout"])->name("logout");
});

//Route::group(["middleware" => "auth:sanctum"], function () {
//   Route::get("/users", [UserController::class, "index"]);
//});
