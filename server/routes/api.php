<?php

use App\Http\Controllers\admin\JenisController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\KeteranganMinumController;
use App\Http\Controllers\admin\ObatController;
use App\Http\Controllers\admin\RakController;
use App\Http\Controllers\admin\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Admin
Route::resource('jenis', JenisController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('rak', RakController::class);
Route::resource('keterangan-minum', KeteranganMinumController::class);
Route::resource('obat', ObatController::class);
Route::resource('transaksi', TransaksiController::class);