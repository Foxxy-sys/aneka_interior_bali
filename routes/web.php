<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\VarianController;

// Tambahkan rute utama ini!
Route::get('/', function () {
    // Kalau buka localhost:8000, otomatis lempar ke halaman login
    return redirect('/login'); 
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth'); // Wajib login untuk akses

// Jalur untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
});

// Jalur khusus Admin/User yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () { return view('admin.dashboard'); });
    
    // Rute Manajemen Kategori
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

    // Rute Manajemen Produk
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::post('/produk', [ProdukController::class, 'store']);
    Route::put('/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);

    // Rute Manajemen Produk Varian
    Route::get('/produk/{id}/varian', [VarianController::class, 'index']);
    Route::post('/produk/{id}/varian', [VarianController::class, 'store']);
    Route::put('/varian/{id}', [VarianController::class, 'update']);
    Route::delete('/varian/{id}', [VarianController::class, 'destroy']);
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Jalur untuk yang sudah login (mau logout)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');