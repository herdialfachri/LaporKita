<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    // USER: daftar pengajuan milik user
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

    // ADMIN/STAFF: lihat semua submissions
    public function adminIndex()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Admin hanya lihat submissions yang statusnya verified, approved, atau rejected
            // dan assigned_division_id sesuai divisi admin
            $submissions = Submission::whereIn('status', ['verified', 'approved', 'rejected'])
                ->where('assigned_division_id', $user->division_id)
                ->latest()
                ->get();

            return view('admin.dashboard', compact('submissions'));
        } elseif ($user->role === 'staff') {
            // Staff bisa lihat semua submissions
            $submissions = Submission::latest()->get();
            $divisions = \App\Models\Division::all();

            return view('staff.dashboard', compact('submissions', 'divisions'));
        } else {
            abort(403);
        }
    }

    // ADMIN/STAFF: ubah status
    public function update(Request $request, Submission $submission)
    {
        if (Auth::user()->role === 'admin') {
            // Admin: finalisasi + catatan
            $request->validate([
                'status' => 'required|in:approved,rejected',
                'admin_notes' => 'nullable|string',
            ]);

            $submission->update([
                'status' => $request->status,
                'admin_notes' => $request->admin_notes,
            ]);
        } elseif (Auth::user()->role === 'staff') {
            // Staff: disposisi saja (status proses + pilih divisi)
            $request->validate([
                'status' => 'required|in:revision,verified,in_review',
                'assigned_division_id' => 'required|exists:divisions,id',
            ]);

            $submission->update([
                'status' => $request->status,
                'assigned_division_id' => $request->assigned_division_id,
                'assigned_staff_id' => Auth::id(),
            ]);
        } else {
            abort(403, 'Forbidden');
        }

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui!');
    }
}
