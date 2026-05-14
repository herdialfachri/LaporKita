<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('dashboard.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // simpan email lama
        $oldEmail = $user->email;

        // isi data baru
        $user->fill($request->validated());

        /*
        |--------------------------------------------------------------------------
        | Kalau email berubah
        |--------------------------------------------------------------------------
        */
        if ($oldEmail !== $user->email) {

            // reset verifikasi
            $user->email_verified_at = null;

            // simpan
            $user->save();

            // kirim email verifikasi baru
            $user->sendEmailVerificationNotification();

            // redirect ke halaman verifikasi
            return redirect()
                ->route('verification.notice')
                ->with('status', 'verification-link-sent');
        }

        /*
        |--------------------------------------------------------------------------
        | Kalau email tidak berubah
        |--------------------------------------------------------------------------
        */
        $user->save();

        return back()->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
