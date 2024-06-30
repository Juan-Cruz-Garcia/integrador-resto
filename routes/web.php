<?php

use App\Http\Controllers\Backoffice\DishController as BackofficeDishController;
use App\Http\Controllers\Backoffice\Request\FormController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DishController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


//-------web-----------
Route::get('/welcome',[DishController::class,'landingpage'])->name('web.landingpage');

Route::prefix('dishes')->name('web.dishes.')->controller(DishController::class)->group(function () {
    //lista de elementos
    Route::get('/', 'index')->name('index');
    //unidad
    Route::get('/{id}', 'show')->name('show');
});
//-------backoffice---
//landingpage
Route::get('backoffice/', [BackofficeDishController::class, 'landingpage'])->name('backoffice.landingpage');

Route::prefix('backoffice/dishes')->name('backoffice.dishes.')->controller(BackofficeDishController::class)->group(function () {
    //tabla de elementos
    Route::get('/', 'index')->name('index');
    //cambiar disponibilidad
    Route::get('/disponible/{id}','disponible')->name('disponible');
    //formulario de creacion y edicion
    Route::get('/create/{id?}', 'create')->name('create');
    //metodo que crea
    Route::post('/create/{id?}', 'store')->name('create');
});
