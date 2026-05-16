<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Submission;
use App\Models\User;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index(): View
    {
        $completedComplaints = Complaint::where('status', 'closed')->count();
        $completedSubmissions = Submission::where('status', 'approved')->count();
        $activeUsers = User::where('role', 'user')->count();

        return view('index', compact(
            'completedComplaints',
            'completedSubmissions',
            'activeUsers'
        ));
    }
}
