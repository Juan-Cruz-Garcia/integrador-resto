<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\ModelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('models/all',[ModelController::class,'all']);

Route::prefix('dishes')->controller(DishController::class)->name('web.dishes.')->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/{id}','show')->name('show');
});