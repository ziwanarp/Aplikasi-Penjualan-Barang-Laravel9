<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\MasterUserController;
use App\Http\Controllers\PenjualanBarangController;
use App\Http\Controllers\LaporanPenjualanController;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login Controller
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/masterbarang/get/{masterbarang:kode_barang}', [MasterBarangController::class, 'get']);
    Route::resource('/penjualanbarang', PenjualanBarangController::class)->except('show');
    Route::get('/getpdf/{penjualanbarang:nomor_penjualan}', [PenjualanBarangController::class, 'getpdf']);
    Route::resource('/laporanpenjualan', LaporanPenjualanController::class)->only('index');
});

Route::middleware('admin')->group(function () {
    Route::resource('/masteruser', MasterUserController::class);
    Route::resource('/masterbarang', MasterBarangController::class);
    Route::post('/importbarang', [MasterBarangController::class, 'importBarang']);
    Route::get('/exportbarang', [MasterBarangController::class, 'exportBarang']);
});

