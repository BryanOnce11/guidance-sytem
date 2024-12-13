<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\GoodMoralRequest;
use App\Models\Student;
use App\Models\User;
use App\Models\AdminHistory;
use App\Models\CounselingNotes;
use App\Models\Course;
use App\Models\VirtualCounseling;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function homePage()
    {
        return view('pages.admin.home-page');
    }

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

        $courses = Course::all();

        return view('pages.admin.student-list.profile', [
            'user' => $user_id,
            'courses' => $courses
        ]);
    }

    public function pendingGoodMoral()
    {
        $per_page = request('per_page', 10);
        $good_moral_pendings = GoodMoralRequest::with('student')
            ->where('status', 'Pending')
            ->oldest()
            ->paginate($per_page);
        return view('pages.admin.good-moral.pending', [
            'good_moral_pendings' => $good_moral_pendings
        ]);
    }

    public function goodMoralView(GoodMoralRequest $good_moral)
    {
        return view('pages.admin.good-moral.request-letter', [
            'good_moral' => $good_moral
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
        $course = request('course', '');

        $good_moral_ready_to_pickups = GoodMoralRequest::with('student')
            ->where('status', 'Ready To Pickup')
            ->orWhere('status', 'Picked Up')
            ->when($course, function ($q) use ($course) {
                $q->whereHas('student', function ($s) use ($course) {
                    $s->whereHas('course', function ($c) use ($course) {
                        $c->where('code', $course);
                    });
                });
            })
            ->orderBy(Student::select('fname')
                ->whereColumn('students.id', 'virtual_counselings.student_id')
                ->limit(1))  // Ensure we are ordering by the correct `fname`
            ->paginate($per_page);

        $courses = Course::all();

        return view('pages.admin.good-moral.ready-to-pickup', [
            'good_moral_ready_to_pickups' => $good_moral_ready_to_pickups,
            'courses' => $courses
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
            ->oldest()
            ->paginate($per_page);
        return view('pages.admin.counseling.pending', [
            'counseling_pendings' => $counseling_pendings
        ]);
    }

    public function virtualCounselingView(VirtualCounseling $virtual_counseling)
    {
        return view('pages.admin.counseling.request-letter', [
            'virtual_counseling' => $virtual_counseling
        ]);
    }

    public function dateScheduledCounseling(Request $request, VirtualCounseling $virtual_counseling)
    {
        $validated = $request->validate([
            'date_scheduled' => 'bail|required|date',
            'time_scheduled' => 'bail|required|date_format:H:i',
        ]);

        $virtual_counseling->update([
            'status' => 'Approved',
            'time_scheduled' => $validated['time_scheduled'],
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
        $course = request('course', '');

        $counseling_approveds = VirtualCounseling::with('student')
            ->where('status', 'Approved')
            ->when($course, function ($q) use ($course) {
                $q->whereHas('student', function ($s) use ($course) {
                    $s->whereHas('course', function ($c) use ($course) {
                        $c->where('code', $course);
                    });
                });
            })
            ->orderBy(Student::select('fname')
                ->whereColumn('students.id', 'virtual_counselings.student_id')
                ->limit(1))  // Ensure we are ordering by the correct `fname`
            ->paginate($per_page);

        $courses = Course::all();

        return view('pages.admin.counseling.approved', [
            'counseling_approveds' => $counseling_approveds,
            'courses' => $courses
        ]);
    }

    public function recordHistory()
    {
        $per_page = request('per_page', 10);
        $course = request('course', '');  // Filter criterion for course code

        $counseling_notes = CounselingNotes::with('virtual_counseling.student', 'user.admin')
            ->when($course, function ($query) use ($course) {
                // Filter by the course code associated with the student
                $query->whereHas('virtual_counseling.student.course', function ($q) use ($course) {
                    $q->where('code', $course);  // Assuming 'code' is the course code in the 'course' table
                });
            })
            ->orderBy(Student::select('fname')
                ->whereColumn('students.id', 'virtual_counselings.student_id')
                ->limit(1))  // Order by the student's first name (fname)
            ->paginate($per_page);

        $courses = Course::all();

        return view('pages.admin.counseling.record-history', [
            'counseling_notes' => $counseling_notes,
            'courses' => $courses
        ]);
    }

    public function showAdminList()
    {
        $per_page = request('per_page', 10);
        $admin_lists = Admin::with('user')
            ->paginate($per_page);
        return view('pages.admin.settings.admin-list', [
            'admin_lists' => $admin_lists
        ]);
    }

    public function storeAdminList(Request $request)
    {
        $validated = $request->validate([
            'email' => ['bail', 'required', 'email'],
            'password' => ['required'],
            'fname' => ['required'],
            'lname' => ['required'],
            'm_i' => ['required'],
            'image' => ['bail', 'required', 'image', 'mimes:jpeg,png,jpg', 'max:20480'],
        ]);

        $user = User::create($validated);
        $validated['user_id'] = $user->id;

        $imagePath = $validated['image']->store('admins', 'public');
        $validated['image'] = $imagePath;

        Admin::create($validated);

        alert('Success', 'You have successfully created an admin account', 'success');

        return back();
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
