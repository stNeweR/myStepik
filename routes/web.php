<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
   return view("app.index");
});

Route::get('/test-connection', function () {
    try {
        DB::connection('testing')->getPdo();
        return "Соединение с базой данных успешно установлено.";
    } catch (\Exception $e) {
        return "Ошибка соединения с базой данных: " . $e->getMessage();
    }
});


Route::get("/profile", function () {
    dd("PROFILE!");
})->name("profile");
