<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);
Route::get('/nilai', [NilaiController::class, 'index']);
Route::get('/kriteria', [KriteriaController::class, 'index']);
Route::get('/alternatif', [AlternatifController::class, 'index']);
Route::get('/hitung', [HitungController::class, 'index']);
