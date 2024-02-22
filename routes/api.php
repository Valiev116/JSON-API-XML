<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RealtyController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/offer', [RealtyController::class, 'index']);
Route::get('/offer/{id}', [RealtyController::class, 'show']);
Route::post('/offer', [RealtyController::class, 'store']);
Route::put('/offer/{id}', [RealtyController::class, 'update']);
Route::delete('/offer/{id}', [RealtyController::class, 'destroy']);
