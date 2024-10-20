<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController; // Pastikan ini ada

// Route halaman utama
Route::view('/', 'welcome');

// Route untuk halaman profil dan upload foto profil
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/upload-photo', [ProfileController::class, 'upload'])->name('profile.upload');
});

// Route untuk dashboard (hanya untuk pengguna terverifikasi)
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__ . '/auth.php';
