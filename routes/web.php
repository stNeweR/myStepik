<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
   return view("app.index");
});

Route::get("/profile", function () {
    dd("PROFILE!");
})->name("profile");
