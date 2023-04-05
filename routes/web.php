<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\OrderController;

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

Route::get('/profil', function () {
    return view('login.profil', [
        'title' => 'Profil'
    ]);
})->middleware('auth');

Route::get('/home', function () {
    return view('login.home', [
        'title' => 'Home'
    ]);
})->middleware('auth');

// Login
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);

// Middleware & Gate
Route::get('/penjualan', [PenjualanController::class,'index'])->middleware('checkRole:admin,operator');
Route::get('/gudang', [GudangController::class,'index'])->middleware('checkRole:admin,gudang');


// Produk
Route::get('/produk', [ProdukController::class, 'index'])->middleware('auth');

Route::get('/tambahProduk', [ProdukController::class, 'create'])->middleware('auth');
Route::post('/tambahProduk', [ProdukController::class, 'store'])->middleware('auth');

Route::get('/ubahProduk/{id_produk}', [ProdukController::class, 'edit'])->middleware('auth');
Route::post('/ubahProduk/{id_produk}', [ProdukController::class, 'update'])->middleware('auth');

Route::get('/hapusProduk/{id_produk}', [ProdukController::class, 'destroy'])->middleware('auth');


// Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index'])->middleware('auth');

Route::get('/tambahKaryawan', [KaryawanController::class, 'create'])->middleware('auth');
Route::post('/tambahKaryawan', [KaryawanController::class, 'store'])->middleware('auth');

Route::get('/ubahKaryawan/{id_karyawan}', [KaryawanController::class, 'edit'])->middleware('auth');
Route::post('/ubahKaryawan/{id_karyawan}', [KaryawanController::class, 'update'])->middleware('auth');

Route::get('/hapusKaryawan/{id_karyawan}', [KaryawanController::class, 'destroy'])->middleware('auth');

// Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->middleware('auth');

Route::get('/tambahKategori', [KategoriController::class, 'create'])->middleware('auth');
Route::post('/tambahKategori', [KategoriController::class, 'store'])->middleware('auth');

Route::get('/ubahKategori/{id_kategori}', [KategoriController::class, 'edit'])->middleware('auth');
Route::post('/ubahKategori/{id_kategori}', [KategoriController::class, 'update'])->middleware('auth');

Route::get('/hapusKategori/{id_kategori}', [KategoriController::class, 'destroy'])->middleware('auth');

// Query Builder & Eloquent
Route::get('/order', [OrderController::class, 'index']);

// Gudang
Route::get('/gudang/tabel', [GudangController::class, 'tabel'])->middleware(['auth', 'checkRole:admin,gudang']);
Route::get('/gudang/tabel/{tglAwal}/{tglAkhir}', [GudangController::class, 'tabelFilter'])->middleware(['auth', 'checkRole:admin,gudang']);

Route::get('/tambahGudang', [GudangController::class, 'create'])->middleware('auth');

Route::get('/tambahGudang/{kodetr}/{tanggal}/{namasupplier}/{telepon}/{alamat}/{keterangan}/{grandtotal}', [GudangController::class, 'store'])->middleware('auth');
Route::get('/tambahGudangDetail/{kodetr}/{kode}/{harga}/{jumlah}', [GudangController::class, 'store_detail'])->middleware('auth');

Route::get('/gudang/tabel/{kodetr}', [GudangController::class, 'lihat'])->middleware('auth');
