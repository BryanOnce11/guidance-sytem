<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStudentRequest;
use App\Models\GoodMoralRequest;
use App\Models\Student;
use App\Models\User;
use App\Models\Course;
use App\Models\VirtualCounseling;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function pendingGoodMoral()
    {
        $per_page = request('per_page', 10);
        $pending_good_morals = GoodMoralRequest::where('student_id', auth()->user()->student->id)
            ->where('status', 'Pending')
            ->paginate($per_page);
        return view('pages.student.good-moral.pending', [
            'pending_good_morals' => $pending_good_morals
        ]);
    }

    public function readyToPickupGoodMoral()
    {
        $per_page = request('per_page', 10);
        $ready_to_pickup_good_morals = GoodMoralRequest::where('student_id', auth()->user()->student->id)
            ->where('status', 'Ready To Pickup')
            ->orWhere('status', 'Picked Up')
            ->paginate($per_page);
        return view('pages.student.good-moral.ready-to-pickup', [
            'ready_to_pickup_good_morals' => $ready_to_pickup_good_morals
        ]);
    }

    public function storeGoodMoral(Request $request)
    {
        $validated = $request->validate([
            'reason' => 'required'
        ]);

        GoodMoralRequest::create([
            'student_id' => auth()->user()->student->id,
            'reason' => $validated['reason']
        ]);

        alert('Success', 'You have successfully request a good moral', 'success');

        return redirect()->route('student.good-moral.pending');
    }

    public function pendingCounseling()
    {
        $per_page = request('per_page', 10);
        $pending_counselings = VirtualCounseling::where('student_id', auth()->user()->student->id)
            ->where('status', 'Pending')
            ->paginate($per_page);
        return view('pages.student.counseling.pending', [
            'pending_counselings' => $pending_counselings
        ]);
    }

    public function approvedCounseling()
    {
        $per_page = request('per_page', 10);
        $approved_counselings = VirtualCounseling::where('student_id', auth()->user()->student->id)
            ->where('status', 'Approved')
            ->paginate($per_page);
        return view('pages.student.counseling.approved', [
            'approved_counselings' => $approved_counselings
        ]);
    }

    public function storeCounseling(Request $request)
    {
        $validated = $request->validate([
            'reason' => 'required'
        ]);

        VirtualCounseling::create([
            'student_id' => auth()->user()->student->id,
            'reason' => $validated['reason']
        ]);

        alert('Success', 'You have successfully request a virtual conseling', 'success');

        return redirect()->route('student.counseling.pending');
    }

    public function showStudentProfile()
    {
        $user = User::with('student.family_back.father', 'student.family_back.mother', 'student.family_back.spouse')
            ->where('id', auth()->id())
            ->first();

        $courses = Course::all();

        return view('pages.student.profile', [
            'user' => $user,
            'courses' => $courses
        ]);
    }


    public function updateStudentProfile(UpdateStudentRequest $request, Student $student)
    {
        $validated = $request->validated();
        $user = User::where('id', auth()->id())->first();

        $user->update([
            'email' => $validated['email']
        ]);

        $student->family_back->father->update([
            'fname' => $validated['f_fname'],
            'lname' => $validated['f_lname'],
            'm_i' => $validated['f_m_i'],
            'occupation' => $validated['f_occupation']
        ]);

        $student->family_back->mother->update([
            'fname' => $validated['m_fname'],
            'lname' => $validated['m_lname'],
            'm_i' => $validated['m_m_i'],
            'occupation' => $validated['m_occupation']
        ]);

        $student->family_back->spouse->update([
            'fname' => $validated['s_fname'],
            'lname' => $validated['s_lname'],
            'm_i' => $validated['s_m_i'],
            'occupation' => $validated['s_occupation']
        ]);

        $student->update($validated);

        alert('success', 'You have successfully updated you personal information', 'success');

        return redirect()->route('student.profile.show');
    }

}
