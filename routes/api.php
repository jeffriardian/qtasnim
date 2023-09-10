<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BarangController;
use App\Http\Controllers\API\TransaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('barang', BarangController::class);
Route::resource('transaksi', TransaksiController::class);

*/

Route::resource('barang', BarangController::class);
Route::resource('transaksi', TransaksiController::class);
Route::get('/transaksi/searchbyName/{nama?}', [TransaksiController::class, 'searchName']);
Route::get('/transaksi/searchbyDate/{date?}', [TransaksiController::class, 'searchDate']);
