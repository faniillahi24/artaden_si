<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminFasilitasController;
use App\Http\Controllers\AdminReservasiController;

// Frontend Routes
Route::get('/', [FrontendController::class, 'beranda'])->name('beranda');
Route::get('/fasilitas', [FrontendController::class, 'fasilitas'])->name('fasilitas');
Route::get('/harga', [FrontendController::class, 'harga'])->name('harga');
Route::get('/kontak', [FrontendController::class, 'kontak'])->name('kontak');
Route::post('/ulasan', [FrontendController::class, 'kirimUlasan'])->name('kirim.ulasan');
Route::get('/', [FrontendController::class, 'beranda'])->name('beranda');
// Reservasi Routes
Route::get('/reservasi', [ReservasiController::class, 'create'])->name('reservasi.create');
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
Route::get('/cek-status', [ReservasiController::class, 'checkStatus'])->name('reservasi.status');
Route::get('/galeri', [FrontendController::class, 'semuaGaleri'])->name('galeri.lengkap');



// Authentication Routes
// Route::middleware(['autg'])->group(function () {
// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// });
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Admin Routes (protected by auth and admin middleware)
Route::middleware(['auth',  AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
     Route::resource('admin/fasilitas', AdminFasilitasController::class)
     ->names('admin.fasilitas');
     Route::resource('admin/reservasi', AdminReservasiController::class)
     ->names('admin.reservasi');
      Route::resource('admin/galeri', AdminGaleriController::class)
                ->names('admin.galeri');


    
    // Resource Routes
    // Route::resource('/fasilitas', AdminFasilitasController::class);
    // Route::resource('/reservasi', AdminReservasiController::class);
    Route::resource('/users', AdminUserController::class);
});

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin', fn () => 'Halo Admin!');
    
// });