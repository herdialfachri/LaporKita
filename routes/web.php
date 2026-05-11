<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\ComplaintController;

Route::get('/', function () {
    return view('index');
})->name('home');

// User
Route::middleware(['auth', 'verified', 'role:user'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {

        Route::get('/', function () {
            return view('user.dashboard');
        })->name('index');

        // ======================
        // Pengajuan
        // ======================

        Route::get('/submissions', [SubmissionController::class, 'index'])
            ->name('submissions');

        Route::get('/submissions/create', [SubmissionController::class, 'create'])
            ->name('submissions.create');

        Route::post('/submissions', [SubmissionController::class, 'store'])
            ->name('submissions.store');

        // ======================
        // Pengaduan
        // ======================

        Route::get('/complaints', [ComplaintController::class, 'index'])
            ->name('complaints');

        Route::get('/complaints/create', [ComplaintController::class, 'create'])
            ->name('complaints.create');

        Route::post('/complaints', [ComplaintController::class, 'store'])
            ->name('complaints.store');

        // ======================
        // Profile
        // ======================

        Route::get('/profile', function () {
            return view('user.profile');
        })->name('profile');
    });

// Admin
Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('dashboard/admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');
    });

// Staff
Route::middleware(['auth', 'verified', 'role:staff'])
    ->prefix('dashboard/staff')
    ->name('staff.')
    ->group(function () {
        Route::get('/', function () {
            return view('staff.dashboard');
        })->name('dashboard');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
