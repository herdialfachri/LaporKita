<?php

use App\Models\Complaint;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\LandingPageController;

Route::get('/', [LandingPageController::class, 'index'])->name('home');

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

        Route::patch('/submissions/{submission}/edit', [SubmissionController::class, 'userUpdate'])
            ->name('submissions.update');

        Route::patch('/submissions/{submission}', [SubmissionController::class, 'userUpdate'])
            ->name('submissions.update');

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


Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard/profile', [ProfileController::class, 'edit'])
        ->name('dashboard.profile');

    Route::patch('/dashboard/profile', [ProfileController::class, 'update'])
        ->name('dashboard.profile.update');


    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/profile', [ProfileController::class, 'edit'])
        ->name('admin.profile');

    Route::patch('/admin/profile', [ProfileController::class, 'update'])
        ->name('admin.profile.update');


    /*
    |--------------------------------------------------------------------------
    | STAFF
    |--------------------------------------------------------------------------
    */
    Route::get('/staff/profile', [ProfileController::class, 'edit'])
        ->name('staff.profile');

    Route::patch('/staff/profile', [ProfileController::class, 'update'])
        ->name('staff.profile.update');


    /*
    |--------------------------------------------------------------------------
    | DELETE ACCOUNT
    |--------------------------------------------------------------------------
    */
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
