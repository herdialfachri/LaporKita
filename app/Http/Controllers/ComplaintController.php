<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.complaints', compact('complaints'));
    }

    public function create()
    {
        return view('user.complaints_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'category'      => 'required|in:pelayanan,petugas,fasilitas,website,lainnya',
            'description'   => 'required|string',
            'evidence_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $filePath = null;

        if ($request->hasFile('evidence_file')) {
            $filePath = $request->file('evidence_file')
                ->store('files/complaints', 'public');
        }

        Complaint::create([
            'user_id'          => Auth::id(),
            'complaint_code'   => 'CMP-' . strtoupper(uniqid()),
            'title'            => $validated['title'],
            'category'         => $validated['category'],
            'description'      => $validated['description'],
            'evidence_file'    => $filePath,
            'status'           => 'submitted',
        ]);

        return redirect()
            ->route('dashboard.index')
            ->with('success', 'Pengaduan berhasil dikirim.');
    }
}
