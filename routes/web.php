<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', function () {
return view('web.dishes.index');
});

Route::get('index/{show}', function () {
    return view('web.dishes.show');
    });
    