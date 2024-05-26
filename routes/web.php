<?php

use App\Http\Controllers\Backoffice\DishController as BackofficeDishController;
use App\Http\Controllers\DishController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//-------web-----------
Route::prefix('dishes')
    ->name('web.dishes.')
    ->controller(DishController::class)
    ->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});
//-------backoffice---
Route::prefix('backoffice/dishes')
    ->name('backoffice.dishes.')
    ->controller(BackofficeDishController::class)
    ->group(function(){
        Route::get('/','index')->name('index');

    });