<?php

use App\Http\Controllers\Backoffice\DishController as BackofficeDishController;
use App\Http\Controllers\Backoffice\Request\FormController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DishController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


//-------web-----------------
//landigpage
Route::get('/welcome',[DishController::class,'landingpage'])->name('web.landingpage');

Route::prefix('dishes')->name('web.dishes.')->controller(DishController::class)->group(function () {
      //unidad
    Route::get('/show/{id}', 'show')->name('show');
     //lista de elementos
    Route::get('/', 'index')->name('index');
      // Lista de elementos por categoría
      Route::get('/categories/{category}', 'index')->name('categories');
 
});


//-------backoffice-----------
//landingpage
Route::get('backoffice/', [BackofficeDishController::class, 'landingpage'])->name('backoffice.landingpage');

Route::prefix('backoffice/dishes')->name('backoffice.dishes.')->controller(BackofficeDishController::class)->group(function () {
    //tabla de elementos
    Route::get('/', 'index')->name('index');
    //cambiar disponibilidad
    Route::get('/available/{id}','available')->name('available');
    //cambiar categoria
    Route::get('/categories/{id}','categories')->name('categories');
    //formulario de creacion y edicion
    Route::get('/create/{id?}', 'create')->name('create');
    //metodo que crea
    Route::post('/create/{id?}', 'store')->name('create');
});
