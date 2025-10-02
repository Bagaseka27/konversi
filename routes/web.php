<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\UangController;

Route::get('/index', [UangController::class, 'index'])->name('uang.index');
Route::post('/result', [UangController::class, 'proses'])->name('uang.result');