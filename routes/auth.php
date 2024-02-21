<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

Route::post('/login', [AuthController::class, 'login']);
Route::post("/register", [AuthController::class, "register"]);
Route::post("/logout", [AuthController::class, "logout"]);

//Route::post("/register", function (Request $request) {
////    dd($request->all);
//    return response()->json($request->all());
//});
