<?php

use app\http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/siswa',[SiswaController::class, 'tampil'])->name('siswa.tampil');  