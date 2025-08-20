<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


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