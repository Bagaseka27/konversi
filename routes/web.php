<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UangController;


Route::get('/', [UangController::class, 'index']);
Route::get('/kurs', [UangController::class, 'index'])->name('uang.index');