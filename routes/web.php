<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminFasilitasController;
use App\Http\Controllers\AdminReservasiController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendController::class, 'beranda'])->name('beranda');
Route::get('/fasilitas', [FrontendController::class, 'fasilitas'])->name('fasilitas');
Route::get('/harga', [FrontendController::class, 'harga'])->name('harga');
Route::get('/kontak', [FrontendController::class, 'kontak'])->name('kontak');
Route::get('/galeri', [FrontendController::class, 'semuaGaleri'])->name('galeri.lengkap');
Route::get('/reservasi', [ReservasiController::class, 'create'])->name('reservasi.create');
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
Route::get('/cek-status', [ReservasiController::class, 'checkStatus'])->name('reservasi.status');
Route::post('/ulasan', [FrontendController::class, 'kirimUlasan'])->name('kirim.ulasan');
Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin & Staff Shared Routes
|--------------------------------------------------------------------------
| Bisa diakses oleh admin dan staff
*/
Route::middleware(['auth', 'role:admin,staff'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');

    Route::resource('admin/fasilitas', AdminFasilitasController::class)->names('admin.fasilitas');
    Route::resource('admin/reservasi', AdminReservasiController::class)->names('admin.reservasi');
    Route::resource('admin/galeri', AdminGaleriController::class)->names('admin.galeri');
    Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('laporan');
    Route::get('/admin/laporan/unduh', [App\Http\Controllers\AdminController::class, 'unduhLaporan'])->name('admin.laporan.unduh');
    Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

});

/*
|--------------------------------------------------------------------------
| Admin-Only Routes
|--------------------------------------------------------------------------
| Hanya admin yang bisa mengakses route ini
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', AdminUserController::class)->names('admin.users');
});
