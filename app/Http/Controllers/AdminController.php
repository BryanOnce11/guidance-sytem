<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function pendingStudents()
    {
        $per_page = request('per_page', 10);
        $pending_students = User::with('student')
            ->where('status', 'Pending')
            ->paginate($per_page);

        return view('pages.admin.student-list.pending', [
            'pending_students' => $pending_students
        ]);
    }

    public function verifyStudent()
    {

    }

    public function verifiedStudents()
    {
        return view('pages.admin.student-list.verified');
    }

    public function pendingGoodMoral()
    {
        return view('pages.admin.good-moral.pending');
    }

    public function readyToPickupGoodMoral()
    {
        return view('pages.admin.good-moral.ready-to-pickup');
    }

    public function pendingCounseling()
    {
        return view('pages.admin.counseling.pending');
    }

    public function approvedCounseling()
    {
        return view('pages.admin.counseling.approved');
    }

    public function recordHistory()
    {
        return view('pages.admin.counseling.record-history');
    }

    public function historyLogs()
    {
        return view('pages.admin.settings.histoty-logs');
    }
}
