<?php

namespace App\Http\Controllers;

use App\Models\GoodMoralRequest;
use App\Models\Student;
use App\Models\User;
use App\Models\AdminHistory;
use App\Models\VirtualCounseling;
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

    public function verifyStudent(User $user)
    {
        $user->update([
            'status' => 'Verified'
        ]);

        AdminHistory::create([
            'action' => 'Student Verified',
            'details' => "Admin " . auth()->user()->admin->fname . " verified the account of {$user->student->fname} {$user->student->lname}"
        ]);

        alert('Success', "You have successfully verified {$user->student->fname} {$user->student->m_i} {$user->student->lname}", 'success');

        return redirect()->route('admin.student-list.pending');
    }

    public function verifiedStudents()
    {
        $per_page = request('per_page', 10);
        $verified_students = User::with('student')
            ->where('status', 'Verified')
            ->where('role', 'Student')
            ->paginate($per_page);
        return view('pages.admin.student-list.verified', [
            'verified_students' => $verified_students
        ]);
    }

    public function studentProfile(User $user_id)
    {
        $user_id->load('student');

        return view('pages.admin.student-list.profile', [
            'user' => $user_id
        ]);
    }

    public function pendingGoodMoral()
    {
        $per_page = request('per_page', 10);
        $good_moral_pendings = GoodMoralRequest::with('student')
            ->where('status', 'Pending')
            ->paginate($per_page);
        return view('pages.admin.good-moral.pending', [
            'good_moral_pendings' => $good_moral_pendings
        ]);
    }

    public function approvedGoodMoral(Request $request, GoodMoralRequest $good_moral_request)
    {
        $validated = $request->validate([
            'date_to_pickup' => 'bail|required|date'
        ]);
        $good_moral_request->update([
            'status' => 'Ready To Pickup',
            'date_to_pickup' => $validated['date_to_pickup']
        ]);

        AdminHistory::create([
            'action' => 'Approved Good Moral Request',
            'details' => "Admin " . auth()->user()->admin->fname . "  approved good moral request of {$good_moral_request->student->fname} {$good_moral_request->student->lname}"
        ]);

        alert('Success', "You have successfully approved the good moral request of {$good_moral_request->student->fname} {$good_moral_request->student->m_i} {$good_moral_request->student->lname}", 'success');

        return redirect()->route('admin.counseling.pending');
    }

    public function readyToPickupGoodMoral()
    {
        $per_page = request('per_page', 10);
        $good_moral_ready_to_pickups = GoodMoralRequest::with('student')
            ->where('status', 'Ready To Pickup')
            ->orWhere('status', 'Picked Up')
            ->paginate($per_page);
        return view('pages.admin.good-moral.ready-to-pickup', [
            'good_moral_ready_to_pickups' => $good_moral_ready_to_pickups
        ]);
    }

    public function pickedUpGoodMoral(GoodMoralRequest $good_moral_request)
    {
        $good_moral_request->update([
            'status' => 'Picked Up'
        ]);

        AdminHistory::create([
            'action' => 'Picked Up Good Moral Request',
            'details' => "Admin " . auth()->user()->admin->fname . " set the status of the good moral request for {$good_moral_request->student->fname} {$good_moral_request->student->lname} to 'Picked Up.'"
        ]);

        alert(
            'Success',
            "{$good_moral_request->student->fname} {$good_moral_request->student->m_i} {$good_moral_request->student->lname} successfully picked up the good moral request",
            'success'
        );

        return redirect()->route('admin.good-moral.ready_to_pickup');
    }

    public function pendingCounseling()
    {
        $per_page = request('per_page', 10);
        $counseling_pendings = VirtualCounseling::with('student')
            ->where('status', 'Pending')
            ->paginate($per_page);
        return view('pages.admin.counseling.pending', [
            'counseling_pendings' => $counseling_pendings
        ]);
    }

    public function dateScheduledCounseling(Request $request, VirtualCounseling $virtual_counseling)
    {
        $validated = $request->validate([
            'date_scheduled' => 'bail|required|date'
        ]);

        $virtual_counseling->update([
            'status' => 'Approved',
            'date_scheduled' => $validated['date_scheduled']
        ]);

        AdminHistory::create([
            'action' => 'Approved Virtual Counseling Request',
            'details' => "Admin " . auth()->user()->admin->fname . "  approved virtual counseling request of {$virtual_counseling->student->fname} {$virtual_counseling->student->lname}"
        ]);

        alert(
            'Success',
            "You have successfully approved the request of {$virtual_counseling->student->fname} {$virtual_counseling->student->m_i} {$virtual_counseling->student->lname}",
            'success'
        );

        return redirect()->route('admin.counseling.pending');
    }

    public function approvedCounseling()
    {
        $per_page = request('per_page', 10);
        $counseling_approveds = VirtualCounseling::with('student')
            ->where('status', 'Approved')
            ->paginate($per_page);
        return view('pages.admin.counseling.approved', [
            'counseling_approveds' => $counseling_approveds
        ]);
    }

    public function recordHistory()
    {
        return view('pages.admin.counseling.record-history');
    }

    public function historyLogs()
    {
        $per_page = request('per_page', 10);
        $history_logs = AdminHistory::paginate($per_page);
        return view('pages.admin.settings.histoty-logs', [
            'history_logs' => $history_logs
        ]);
    }
}
