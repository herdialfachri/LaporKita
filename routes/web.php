<?php

use App\Models\Complaint;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\SubmissionController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::middleware(['auth', 'verified', 'role:user'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {

        Route::get('/', function () {

            $complaints = Complaint::where('user_id', Auth::id())
                ->latest()
                ->get();

            $submissions = Submission::where('user_id', Auth::id())
                ->latest()
                ->get();

            return view('user.dashboard', compact(
                'complaints',
                'submissions'
            ));
        })->name('index');

        Route::get('/submissions', [SubmissionController::class, 'index'])
            ->name('submissions');

        Route::get('/submissions/create', [SubmissionController::class, 'create'])
            ->name('submissions.create');

        Route::post('/submissions', [SubmissionController::class, 'store'])
            ->name('submissions.store');

        Route::get('/complaints', [ComplaintController::class, 'index'])
            ->name('complaints');

        Route::get('/complaints/create', [ComplaintController::class, 'create'])
            ->name('complaints.create');

        Route::post('/complaints', [ComplaintController::class, 'store'])
            ->name('complaints.store');

        Route::get('/profile', function () {
            return view('user.profile');
        })->name('profile');
    });

Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('dashboard/admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [SubmissionController::class, 'adminIndex'])
            ->name('dashboard');

        Route::patch('/submissions/{submission}', [SubmissionController::class, 'update'])
            ->name('submissions.update');

        // TAMBAHAN
        Route::patch('/complaints/{complaint}', [ComplaintController::class, 'adminUpdate'])
            ->name('complaints.update');
    });

Route::middleware(['auth', 'verified', 'role:staff'])
    ->prefix('dashboard/staff')
    ->name('staff.')
    ->group(function () {

        Route::get('/', [SubmissionController::class, 'adminIndex'])
            ->name('dashboard');

        Route::patch('/submissions/{submission}', [SubmissionController::class, 'update'])
            ->name('submissions.update');

        // TAMBAHAN
        Route::patch('/complaints/{complaint}', [ComplaintController::class, 'staffUpdate'])
            ->name('complaints.update');
    });


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
