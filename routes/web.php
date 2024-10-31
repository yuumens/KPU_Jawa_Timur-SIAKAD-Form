<?php

use App\Http\Controllers\CetakPesertaController;
use App\Http\Controllers\locationcontroller;
use App\Http\Controllers\PendaftaranPesertaController;
use App\Http\Controllers\positioncontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', [locationcontroller::class, 'index']);

Route::get('/pendaftaran', [PendaftaranPesertaController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran', [PendaftaranPesertaController::class, 'store'])->name('pendaftaran.store');

Route::get('/cetak', [CetakPesertaController::class, 'index'])->name('cetak.index');
Route::post('/cetak', [CetakPesertaController::class, 'search'])->name('cetak.search');
