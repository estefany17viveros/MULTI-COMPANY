<?php
namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('login', function () {
    return view('login');
});
Route::get('inventario', function () {
    return view('inventario');
});

Route::get('empresa', function () {
    return view('empresa');
});

Route::get('login', function () {
    return view('login');
});
Route::get('bodega', function () {
    return view('bodega');
});



Route::resource('products', ProductController::class);
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::resource('characteristics', CharacteristicsController::class);
Route::view('/offers', 'offers')->name('offers');
Route::view('/contacts', 'contacts')->name('contacts');



