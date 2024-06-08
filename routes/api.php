<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GentengController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PesananController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);

Route::get('/gentengs', [GentengController::class, 'index']);
Route::get('/gentengs/{id}', [GentengController::class, 'show']);
Route::post('/gentengs', [GentengController::class, 'store']);
Route::put('/gentengs/{id}', [GentengController::class, 'update']);
Route::delete('/gentengs/{id}', [GentengController::class, 'destroy']);

Route::get('/pengirimans', [PengirimanController::class, 'index']);
Route::get('/pengirimans/{id}', [PengirimanController::class, 'show']);
Route::post('/pengirimans', [PengirimanController::class, 'store']);
Route::put('/pengirimans/{id}', [PengirimanController::class, 'update']);
Route::delete('/pengirimans/{id}', [PengirimanController::class, 'destroy']);

Route::get('/pesanans', [PesananController::class, 'index']);
Route::get('/pesanans/{id}', [PesananController::class, 'show']);
Route::post('/pesanans', [PesananController::class, 'store']);
Route::put('/pesanans/{id}', [PesananController::class, 'update']);
Route::delete('/pesanans/{id}', [PesananController::class, 'destroy']);

Route::get('/pembayarans', [PembayaranController::class, 'index']);
Route::get('/pembayarans/{id}', [PembayaranController::class, 'show']);
Route::post('/pembayarans', [PembayaranController::class, 'store']);
Route::put('/pembayarans/{id}', [PembayaranController::class, 'update']);
Route::delete('/pembayarans/{id}', [PembayaranController::class, 'destroy']);

