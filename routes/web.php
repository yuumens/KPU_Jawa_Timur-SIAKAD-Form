<?php

use App\Http\Controllers\locationcontroller;
use App\Http\Controllers\positioncontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/', [locationcontroller::class, 'index']);
// Route::get('/', [positioncontroller::class, 'index']);
