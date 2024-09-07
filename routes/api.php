<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarMobilController;

Route::get('/daftar_mobil', [DaftarMobilController::class, 'index']);
Route::post('/daftar_mobil', [DaftarMobilController::class, 'store']);
Route::get('/daftar_mobil/{daftar_mobil}', [DaftarMobilController::class, 'show']);
Route::put('/daftar_mobil/{daftar_mobil}', [DaftarMobilController::class, 'update']);
Route::delete('/daftar_mobil/{daftar_mobil}', [DaftarMobilController::class, 'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
