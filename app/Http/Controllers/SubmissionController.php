<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function index()
    {
        $submissions = Submission::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.submissions', compact('submissions'));
    }

    public function create()
    {
        return view('user.submissions_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type'          => 'required|in:penelitian,magang,pkl',
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'location'      => 'required|string|max:255',
            'document_file' => 'required|file|mimes:pdf|max:5120',
            'start_date'    => 'nullable|date',
            'end_date'      => 'nullable|date|after_or_equal:start_date',
        ]);

        $path = $request->file('document_file')->store('files/pengajuan', 'public');

        Submission::create([
            ...$validated,
            'user_id'       => Auth::id(),
            'document_file' => $path,
            'status'        => 'submitted',
        ]);

        return redirect()->route('dashboard.index')
            ->with('success', 'Pengajuan berhasil dikirim!');
    }
}
