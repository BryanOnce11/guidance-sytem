<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\GoodMoralRequest;
use App\Models\Student;
use App\Models\User;
use App\Models\AdminHistory;
use App\Models\CounselingNotes;
use App\Models\Course;
use App\Models\Notification;
use App\Models\VirtualCounseling;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;

class AdminController extends Controller
{

    public function __construct()
    {
        set_time_limit(3000);
    }

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

    public function rejectStudent(User $user)
    {
        $user->update([
            'status' => 'Rejected'
        ]);

        AdminHistory::create([
            'action' => 'Student Rejected',
            'details' => "Admin " . auth()->user()->admin->fname . " rejected the account of {$user->student->fname} {$user->student->lname}"
        ]);

        alert('Success', "You have successfully rejected {$user->student->fname} {$user->student->m_i} {$user->student->lname}", 'success');

        return redirect()->route('admin.student-list.pending');
    }

    public function verifiedStudents()
    {
        $per_page = request('per_page', 10);
        $course = request('course', '');
        $search_term = request('search', '');

        $verified_students = User::with('student')
            ->where('status', 'Verified')
            ->where('role', 'Student')
            ->when($course, function ($q) use ($course) {
                $q->whereHas('student', function ($s) use ($course) {
                    $s->whereHas('course', function ($c) use ($course) {
                        $c->where('code', $course);
                    });
                });
            })
            ->when($search_term, function ($q) use ($search_term) {
                $q->where(function ($query) use ($search_term) {
                    // Searching on User's name (fname, lname, m_i)
                    $query->whereHas('student', function ($student_query) use ($search_term) {
                        $student_query->where('fname', 'like', '%' . $search_term . '%')
                            ->orWhere('lname', 'like', '%' . $search_term . '%')
                            ->orWhere('m_i', 'like', '%' . $search_term . '%')
                            ->orWhere('student_id', 'like', '%' . $search_term . '%');
                    });
                });
            })
            ->orderBy(Student::select('fname')
                ->whereColumn('students.user_id', 'users.id') // Correctly reference the foreign key
                ->limit(1))
            ->paginate($per_page);

        $courses = Course::all();
        return view('pages.admin.student-list.verified', [
            'verified_students' => $verified_students,
            'courses' => $courses
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

        return redirect()->route('admin.good-moral.pending');
    }

    public function readyToPickupGoodMoral()
    {
        $per_page = request('per_page', 10);
        $course = request('course', '');

        $good_moral_ready_to_pickups = GoodMoralRequest::with('student')
            ->where('status', 'Ready To Pickup')
            ->when($course, function ($q) use ($course) {
                $q->whereHas('student', function ($s) use ($course) {
                    $s->whereHas('course', function ($c) use ($course) {
                        $c->where('code', $course);
                    });
                });
            })
            ->orderBy(Student::select('fname')
                ->whereColumn('students.id', 'good_moral_requests.student_id')
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

    public function rejectGoodMoral(GoodMoralRequest $good_moral_request)
    {
        $good_moral_request->update([
            'status' => 'Rejected'
        ]);

        AdminHistory::create([
            'action' => 'Good Moral Request Rejected',
            'details' => "Admin " . auth()->user()->admin->fname . " rejected the request Good Moral of {$good_moral_request->student->fname} {$good_moral_request->student->lname}"
        ]);

        $date_requested = Carbon::parse($good_moral_request->created_at->format('Y-m-d'));

        Notification::create([
            'student_id' => $good_moral_request->student_id,
            'type' => 'Good Moral',
            'date_requested' => $date_requested,
            'date_rejected' => now()
        ]);

        alert('Success', "You have successfully rejected {$good_moral_request->student->fname} {$good_moral_request->student->m_i} {$good_moral_request->student->lname}", 'success');

        return redirect()->route('admin.good-moral.pending');
    }

    public function getpickedUpGoodMoral()
    {
        $per_page = request('per_page', 10);
        $course = request('course', '');

        $good_moral_picked_ups = GoodMoralRequest::with('student')
            ->where('status', 'Picked Up')
            ->when($course, function ($q) use ($course) {
                $q->whereHas('student', function ($s) use ($course) {
                    $s->whereHas('course', function ($c) use ($course) {
                        $c->where('code', $course);
                    });
                });
            })
            ->orderBy(
                Student::select('fname')
                    ->whereColumn('students.id', 'good_moral_requests.student_id')
            )  // Ensure we are ordering by the correct `fname`
            ->paginate($per_page);

        $courses = Course::all();

        return view('pages.admin.good-moral.picked-up', [
            'good_moral_picked_ups' => $good_moral_picked_ups,
            'courses' => $courses
        ]);
    }

    public function showGoodMoralPDF(GoodMoralRequest $good_moral_request)
    {
        $currentMonth = date('n'); // Current month (1 to 12)
        $currentYear = date('Y'); // Current year (e.g. 2025)
        $semester = ''; // Initialize the semester
        // Determine the semester based on the month and set the academic year
        if ($currentMonth >= 8 && $currentMonth <= 12) {
            // First Semester runs from August to December
            $semester = 'First Semester ' . $currentYear . '-' . ($currentYear + 1);
        } elseif ($currentMonth >= 1 && $currentMonth <= 5) {
            // Second Semester runs from January to May
            $semester = 'Second Semester ' . $currentYear . '-' . ($currentYear + 1);
        }

        return view('pages.admin.good-moral.picked-up-pdf', [
            'good_moral_request' => $good_moral_request,
            'semester' => $semester,
        ]);
    }

    public function generatePdf(GoodMoralRequest $good_moral_request)
    {
        $currentMonth = date('n'); // Current month (1 to 12)
        $currentYear = date('Y'); // Current year (e.g. 2025)
        $semester = ''; // Initialize the semester
        // Determine the semester based on the month and set the academic year
        if ($currentMonth >= 8 && $currentMonth <= 12) {
            // First Semester runs from August to December
            $semester = 'First Semester ' . $currentYear . '-' . ($currentYear + 1);
        } elseif ($currentMonth >= 1 && $currentMonth <= 5) {
            // Second Semester runs from January to May
            $semester = 'Second Semester ' . $currentYear . '-' . ($currentYear + 1);
        }

        $pdf = Pdf::loadView(
            'pages.admin.good-moral.picked-up-pdf',
            compact(
                'good_moral_request',
                'semester'
            )
        );

        $pdf->setPaper('legal', 'portrait');
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        return $pdf->download('good_moral' . $good_moral_request->student->lname . '.pdf');
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

    public function rejectVirtualCounseling(VirtualCounseling $virtual_counseling)
    {
        $virtual_counseling->update([
            'status' => 'Rejected'
        ]);

        AdminHistory::create([
            'action' => 'Virtual Counseling Request Rejected',
            'details' => "Admin " . auth()->user()->admin->fname . " rejected the request Virtual Counseling of {$virtual_counseling->student->fname} {$virtual_counseling->student->lname}"
        ]);

        $date_requested = Carbon::parse($virtual_counseling->created_at->format('Y-m-d'));
        //no need to parse just use $virtual_counseling->created_at->toDateString();

        Notification::create([
            'student_id' => $virtual_counseling->student_id,
            'type' => 'Virtual Counseling',
            'date_requested' => $date_requested,
            'date_rejected' => now()
        ]);

        alert('Success', "You have successfully rejected {$virtual_counseling->student->fname} {$virtual_counseling->student->m_i} {$virtual_counseling->student->lname}", 'success');

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
            ->orderBy(
                Student::select('fname')
                    ->whereColumn('students.id', 'virtual_counselings.student_id')
            )  // Ensure we are ordering by the correct `fname`
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
            ->join('virtual_counselings', 'virtual_counselings.id', '=', 'counseling_notes.virtual_counseling_id') // Join virtual_counselings table
            ->join('students', 'students.id', '=', 'virtual_counselings.student_id') // Join students table
            ->select('counseling_notes.*', 'students.fname', 'students.lname', 'students.id as student_id') // Select specific columns to avoid collision
            ->orderBy('students.fname', 'asc')  // Order by the student's first name (fname)
            ->paginate($per_page);

        $courses = Course::all();

        return view('pages.admin.counseling.record-history', [
            'counseling_notes' => $counseling_notes,
            'courses' => $courses
        ]);
    }

    public function recordHistoryNotes(CounselingNotes $counseling_notes)
    {
        return view('pages.admin.counseling.record-history-notes', [
            'counseling_notes' => $counseling_notes
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

    public function disableAdmin(Admin $admin)
    {
        $admin->user->update([
            'status' => 'Rejected'
        ]);

        // AdminHistory::create([
        //     'action' => 'Virtual Counseling Request Rejected',
        //     'details' => "Admin " . auth()->user()->admin->fname . " rejected the request Virtual Counseling of {$user->student->fname} {$user->student->lname}"
        // ]);

        // alert('Success', "You have successfully rejected {$user->student->fname} {$user->student->m_i} {$user->student->lname}", 'success');

        return redirect()->route('admin.student-list.pending');
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
