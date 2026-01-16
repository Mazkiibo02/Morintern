<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Peserta\RegisteredPesertaController;
use App\Http\Controllers\Peserta\AuthenticatedPesertaController;
use App\Http\Controllers\Peserta\PasswordResetLinkController;
use App\Http\Controllers\Peserta\NewPasswordController;
use App\Http\Controllers\Peserta\GoogleController;

// Register
Route::get('/peserta/register', [RegisteredPesertaController::class, 'create'])
    ->middleware('guest:peserta_calon')
    ->name('peserta.register');
Route::post('/peserta/register', [RegisteredPesertaController::class, 'store'])
    ->middleware('guest:peserta_calon');  

// Login
Route::get('/peserta/login', [AuthenticatedPesertaController::class, 'create'])
    ->middleware('guest:peserta_calon')
    ->name('peserta.login');
Route::post('/peserta/login', [AuthenticatedPesertaController::class, 'store'])
    ->middleware('guest:peserta_calon');

// Logout
Route::post('/peserta/logout', [AuthenticatedPesertaController::class, 'destroy'])
    ->middleware('auth:peserta_calon')
    ->name('peserta.logout');

// Forgot Password
Route::get('/peserta/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest:peserta_calon')
    ->name('peserta.password.request');
Route::post('/peserta/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest:peserta_calon')
    ->name('peserta.password.email');

// Reset Password
Route::get('/peserta/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest:peserta_calon')
    ->name('peserta.password.reset');
Route::post('/peserta/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest:peserta_calon')
    ->name('peserta.password.store');

// Google OAuth
Route::get('/peserta/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('peserta.google.login');
Route::get('/peserta/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Peserta profile alias routes (separate URL)
Route::middleware('auth:peserta_calon')->group(function () {
    Route::get('/peserta/profil', [\App\Http\Controllers\ProfileController::class, 'edit'])
        ->name('peserta.profil');

    Route::match(['post', 'patch'], '/peserta/profil', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('peserta.profil.update');

    Route::delete('/peserta/profil', [App\Http\Controllers\DeleteAccountController::class, '__invoke'])
        ->name('peserta.profil.destroy');

    // Anggota endpoints under peserta/profil/anggota
    Route::prefix('/peserta/profil/anggota')->name('peserta.profil.anggota.')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProfileController::class, 'getAnggota'])->name('index');
        Route::post('/', [\App\Http\Controllers\ProfileController::class, 'storeAnggota'])->name('store');
        Route::delete('/{id}', [\App\Http\Controllers\ProfileController::class, 'destroyAnggota'])->name('destroy');
    });

    // Penilaian endpoint for peserta to fetch their evaluation
    Route::get('/peserta/profil/penilaian', [\App\Http\Controllers\ProfileController::class, 'getPenilaian'])
        ->name('peserta.profil.penilaian');
});

Route::post('/peserta/promosi', function (\Illuminate\Http\Request $request) {
    return redirect()->route('peserta.profil')->with('success', 'Lamaran terkirim. Silakan lengkapi profil.');
})->middleware('auth:peserta_calon')->name('peserta.promosi');
