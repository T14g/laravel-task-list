<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Hello world!";
});


Route::get('/about', function () {
    return "About page";
});

Route::get('/hello', function () {
    return "Hello page";
})->name('hello');

Route::get('/hi', function () {
    return redirect()->route('hello');
});

Route::fallback(function () {
    return "404 page not found";
});

Route::get('/users/{id}', function ($id) {
    return "User ID: " . $id;
});