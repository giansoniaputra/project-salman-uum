<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\ConsumerController;
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
Route::get('/auth/create', [AuthController::class,'register'])->middleware('auth');
Route::get('/auth', [AuthController::class,'index'])->name('login')->middleware('guest');

// PEMBELIAN
Route::resource('/pembelian',PembelianController::class)->middleware('auth');
    // Cek apakah konsumen sudah terdaftar
Route::get('/cekNIK', [PembelianController::class, 'cek_nik'])->middleware('auth');
    // Edit Data
Route::get('/edit-transaksi/{buy:unique}', [PembelianController::class, 'page_edit'])->middleware('auth');
    //Ambil Data Transaksi
Route::get('/getDataTransaksi', [PembelianController::class, 'get_transaksi'])->middleware('auth');
    //Load Individu
// Route::get('/loadIndividu', [PembelianController::class, 'load_individu'])->middleware('auth');

// DATA MOTOR
Route::resource('/motor', BikeController::class)->middleware('auth');
    //Ambil Data Motor
Route::get('/getDataMotor', [BikeController::class, 'get_motor'])->middleware('auth');

// DATA KONSUMEN
Route::resource('/consumer', ConsumerController::class)->middleware('auth');

// AUTHENTIKASI
    // Login
Route::post('/authenticate', [AuthController::class, 'authenticate']);
    // Logout
Route::get('/logout', [AuthController::class, 'logout']);
    // Register
Route::get('/register', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'store']);

// DATATABLES
Route::get('/datatablesPembelian', [PembelianController::class, 'dataTables'])->middleware('auth');
Route::get('/datatablesMotor', [BikeController::class, 'dataTables'])->middleware('auth');

