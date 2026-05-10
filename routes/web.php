<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::middleware(['auth', 'verified'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {

        Route::get('/', function () {
            return view('dashboard.dashboard');
        })->name('index');

        // Pengajuan
        Route::get('/submissions', function () {
            return view('dashboard.submissions');
        })->name('submissions');

        // Pengaduan
        Route::get('/complaints', function () {
            return view('dashboard.complaints');
        })->name('complaints');

        // Profil
        Route::get('/profile', function () {
            return view('dashboard.profile');
        })->name('profile');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
