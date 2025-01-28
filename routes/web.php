<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentExportController;

Route::resource('students', StudentController::class);
Route::get('export-students', [StudentExportController::class, 'export'])->name('export-students');



Route::get('/', function () {
    return view('welcome');
})->name('welcome');
