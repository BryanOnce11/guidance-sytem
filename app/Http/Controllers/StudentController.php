<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\FamilyBackground;
use App\Models\FatherInfo;
use App\Models\MotherInfo;
use App\Models\SpouseInfo;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();

        $father_info = FatherInfo::create([
            'fname' => $validated['f_fname'],
            'lname' => $validated['f_lname'],
            'occupation' => $validated['f_occupation'],
        ]);

        $mother_info = MotherInfo::create([
            'fname' => $validated['m_fname'],
            'lname' => $validated['m_lname'],
            'occupation' => $validated['m_occupation'],
        ]);

        $spouse_info = SpouseInfo::create([
            'fname' => $validated['s_fname'],
            'lname' => $validated['s_lname'],
            'occupation' => $validated['s_occupation'],
        ]);

        $family_back = FamilyBackground::create([
            'father_info_id' => $father_info->id,
            'mother_info_id' => $mother_info->id,
            'spouse_info_id' => $spouse_info->id
        ]);

        Student::create([
            'user_id' => auth()->id(),
            'family_background_id' => $family_back->id,
            'fname' => auth()->user()->fname,
            'lname' => auth()->user()->lname,
            'm_i' => auth()->user()->m_i,
            'student_id' => $validated['student_id'],
            'course' => $validated['course'],
            'year_lvl' => $validated['year_lvl'],
            'birth_date' => $validated['birth_date'],
            'birth_place' => $validated['birth_place'],
            'gender' => $validated['gender'],
            'citizenship' => $validated['citizenship'],
            'civil_status' => $validated['civil_status'],
            'contact_num' => $validated['contact_num'],
            'emergency_fullname' => $validated['e_fullname'],
            'emergency_contact_num' => $validated['e_contact_num'],
            'emergency_occupation' => $validated['e_occupation'],
        ]);

        alert('Success', 'You have successfully send your form', 'success');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
