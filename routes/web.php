<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [Dashboard::class,'index'])->middleware('auth');
Route::get('/home', [Dashboard::class,'index'])->middleware('auth');

Route::resource('/penjualan',PenjualanController::class)->middleware('auth');
Route::resource('/auth', AuthController::class)->middleware('guest');
Route::get('/auth', [AuthController::class,'index'])->name('login')->middleware('guest');

// PEMBELIAN
Route::resource('/pembelian',PembelianController::class)->middleware('auth');
    // Cek apakah konsumen sudah terdaftar
Route::get('/cekNIK', [PembelianController::class, 'cek_nik'])->middleware('auth');

// DATATABLES
Route::get('/datatablesPembelian', [PembelianController::class, 'dataTables'])->middleware('auth');


// Login
Route::post('/authenticate', [AuthController::class, 'authenticate']);
// LOGOUT
Route::get('/logout', [AuthController::class, 'logout']);

