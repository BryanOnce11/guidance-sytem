<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStudentRequest;
use App\Models\GoodMoralRequest;
use App\Models\Student;
use App\Models\VirtualCounseling;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function indexGoodMoral()
    {
        return view('student.good-moral.index');
    }

    public function createGoodMoral()
    {
        return view('student.good-moral.create');
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

        alert('Success', 'You have successfully request a good moral', 'Success');

        return redirect()->route('student.good-moral.index');
    }

    public function indexCounseling()
    {
        return view('student.counseling.index');
    }

    public function createCounseling()
    {
        return view('student.counseling.create');
    }

    public function storeCounseling()
    {

        VirtualCounseling::create([
            'student_id' => auth()->user()->student->id
        ]);

        alert('Success', 'You have successfully request a virtual conseling', 'Success');

        return redirect()->route('student.counseling.index');
    }

    public function showStudentProfile()
    {
        return view('student.profile');
    }

    public function updateStudentProfile(UpdateStudentRequest $request, Student $student)
    {
        $validated = $request->validated();

        $student->update($validated);

        alert('success', 'You have successfully updated you personal information');

        return redirect()->route('student.profile.update');
    }

}
