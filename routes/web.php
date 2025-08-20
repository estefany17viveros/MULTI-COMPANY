<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CharacteristicsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CharacteristicController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});


Route::resource('products', ProductController::class);
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::resource('characteristics', CharacteristicsController::class);
Route::view('/offers', 'offers')->name('offers');
Route::view('/contacts', 'contacts')->name('contacts');




Route::get('/login', function () {
    return view('login');
});
Route::get('/bodega', function () {
    return view('bodega');
});

Route::get('/empresa', function () {
    return view('empresa');
});

Route::get('/inventario', function () {
    return view('inventario');
});
