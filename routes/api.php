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
Route::get('/transaksi/orderByName/{code?}', [TransaksiController::class, 'orderName']);
Route::get('/transaksi/orderByDate/{code?}', [TransaksiController::class, 'orderDate']);
Route::get('/trans/compare', [TransaksiController::class, 'compareProduct']);
Route::get('/transac/compareByDate', [TransaksiController::class, 'compareProductByDate']);
