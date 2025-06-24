<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'beranda']);
Route::get('/fasilitas', [FrontendController::class, 'fasilitas']);
Route::get('/harga', [FrontendController::class, 'harga']);
Route::get('/reservasi', [FrontendController::class, 'formReservasi']);
Route::post('/reservasi', [FrontendController::class, 'simpanReservasi']);
Route::get('/cek-status', [FrontendController::class, 'cekStatus'])->name('cek_status');
Route::get('/kontak', [FrontendController::class, 'kontak']);
Route::post('/ulasan', [FrontendController::class, 'kirimUlasan']);

// Admin route (bisa gunakan middleware auth jika login dibuat)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::resource('/admin/fasilitas', AdminFasilitasController::class);
    Route::resource('/admin/reservasi', AdminReservasiController::class);
    Route::resource('/admin/users', AdminUserController::class);
    Route::get('/admin/laporan', [AdminController::class, 'laporan']);
});
