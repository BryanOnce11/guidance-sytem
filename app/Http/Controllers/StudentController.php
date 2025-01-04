<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStudentRequest;
use App\Models\ActivityInterest;
use App\Models\CounsellingRecord;
use App\Models\GoodMoralRequest;
use App\Models\Student;
use App\Models\User;
use App\Models\Course;
use App\Models\EducationalData;
use App\Models\EmergencyContactInfo;
use App\Models\FamilyBackground;
use App\Models\FatherInfo;
use App\Models\GuardianInfo;
use App\Models\MotherInfo;
use App\Models\Notification;
use App\Models\PersonalHistory;
use App\Models\ProblemChecklist;
use App\Models\ScholasticRecord;
use App\Models\SpouseInfo;
use App\Models\VirtualCounseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function homePage()
    {
        $notifications = Notification::where('student_id', auth()->user()->student->id)
            ->latest()
            ->limit(10)
            ->get();

        return view('pages.student.home-page', [
            'notifications' => $notifications
        ]);
    }

    public function pendingGoodMoral()
    {
        $per_page = request('per_page', 10);

        $pending_good_morals = GoodMoralRequest::where('student_id', auth()->user()->student->id)
            ->where('status', 'Pending')
            ->paginate($per_page);

        $notifications = Notification::where('student_id', auth()->user()->student->id)
            ->latest()
            ->limit(10)
            ->get();

        return view('pages.student.good-moral.pending', [
            'pending_good_morals' => $pending_good_morals,
            'notifications' => $notifications
        ]);
    }

    public function readyToPickupGoodMoral()
    {
        $per_page = request('per_page', 10);

        $ready_to_pickup_good_morals = GoodMoralRequest::where('student_id', auth()->user()->student->id)
            ->where('status', 'Ready To Pickup')
            ->orWhere('status', 'Picked Up')
            ->paginate($per_page);

        $notifications = Notification::where('student_id', auth()->user()->student->id)
            ->latest()
            ->limit(10)
            ->get();

        return view('pages.student.good-moral.ready-to-pickup', [
            'ready_to_pickup_good_morals' => $ready_to_pickup_good_morals,
            'notifications' => $notifications
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

        $notifications = Notification::where('student_id', auth()->user()->student->id)
            ->latest()
            ->limit(10)
            ->get();

        return view('pages.student.counseling.pending', [
            'pending_counselings' => $pending_counselings,
            'notifications' => $notifications
        ]);
    }

    public function approvedCounseling()
    {
        $per_page = request('per_page', 10);

        $approved_counselings = VirtualCounseling::where('student_id', auth()->user()->student->id)
            ->where('status', 'Approved')
            ->paginate($per_page);

        $notifications = Notification::where('student_id', auth()->user()->student->id)
            ->latest()
            ->limit(10)
            ->get();

        return view('pages.student.counseling.approved', [
            'approved_counselings' => $approved_counselings,
            'notifications' => $notifications
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

        $notifications = Notification::where('student_id', auth()->user()->student->id)
            ->latest()
            ->limit(10)
            ->get();

        return view('pages.student.profile', [
            'user' => $user,
            'courses' => $courses,
            'notifications' => $notifications
        ]);
    }


    public function updateStudentProfile(UpdateStudentRequest $request, Student $student)
    {
        $validated = $request->validated();
        $user = User::where('id', auth()->id())->first();

        $user->update([
            'email' => $validated['email']
        ]);

        $father = FatherInfo::updateOrCreate(
            ['id' => $student->family_back->id ?? null],
            [
                'fname' => ucwords($validated['f_fname']),
                'lname' => ucwords($validated['f_lname']),
                'm_i' => ucwords($validated['f_m_i']),
                'birth_date' => $validated['f_birth_date'],
                'educational_attainment' => $validated['f_educational_attainment'],
                'contact_num' => $validated['f_contact_num'],
                'email' => $validated['f_email'],
                'occupation' => ucwords($validated['f_occupation']),
                'company_name' => ucwords($validated['f_company_name']),
                'company_address' => ucwords($validated['f_company_address']),
                'avg_monthly_income' => $validated['f_avg_monthly_income']
            ]
        );

        $mother = MotherInfo::updateOrCreate(
            ['id' => $student->family_back->id ?? null],
            [
                'fname' => ucwords($validated['m_fname']),
                'lname' => ucwords($validated['m_lname']),
                'm_i' => ucwords($validated['m_m_i']),
                'birth_date' => $validated['m_birth_date'],
                'educational_attainment' => $validated['m_educational_attainment'],
                'contact_num' => $validated['m_contact_num'],
                'email' => $validated['m_email'],
                'occupation' => ucwords($validated['m_occupation']),
                'company_name' => ucwords($validated['m_company_name']),
                'company_address' => ucwords($validated['m_company_address']),
                'avg_monthly_income' => $validated['m_avg_monthly_income']
            ]
        );

        $spouse = SpouseInfo::updateOrCreate(
            ['id' => $student->family_back->id ?? null],
            [
                'fname' => ucwords($validated['s_fname']),
                'lname' => ucwords($validated['s_lname']),
                'm_i' => ucwords($validated['s_m_i']),
                'birth_date' => $validated['f_birth_date'],
                'educational_attainment' => $validated['f_educational_attainment'],
                'contact_num' => $validated['f_contact_num'],
                'email' => $validated['f_email'],
                'occupation' => ucwords($validated['f_occupation']),
                'company_name' => ucwords($validated['f_company_name']),
                'company_address' => ucwords($validated['f_company_address']),
                'avg_monthly_income' => $validated['f_avg_monthly_income']
            ]
        );

        $guardian = GuardianInfo::updateOrCreate(
            ['id' => $student->family_back->id ?? null],
            [
                'full_name' => ucwords($validated['g_full_name']),
                'contact_num' => $validated['g_contact_num'],
                'occupation' => ucwords($validated['g_occupation']),
                'company_name' => ucwords($validated['g_company_name']),
                'relationship' => ucwords($validated['g_relationship']),
                'address' => ucwords($validated['g_address']),
            ]
        );

        $emergency_contact = EmergencyContactInfo::updateOrCreate(
            ['id' => $student->family_back->id ?? null],
            [
                'full_name' => ucwords($validated['e_full_name']),
                'contact_num' => $validated['e_contact_num'],
                'relationship' => ucwords($validated['e_relationship']),
                'address' => ucwords($validated['e_address']),
            ]
        );

        $family_background = FamilyBackground::updateOrCreate(
            ['id' => $student->family_back->id ?? null],
            [
                'father_info_id' => $father->id,
                'mother_info_id' => $mother->id,
                'spouse_info_id' => $spouse->id,
                'guardian_info_id' => $guardian->id,
                'emergency_contact_info_id' => $emergency_contact->id,
                'source_of_income' => $validated['source_of_income'],
                'parent_status' => ucwords($validated['parent_status']),
                'birth_rank' => $validated['birth_rank'],
                'number_of_siblings' => $validated['number_of_siblings'],
                'number_of_children' => $validated['number_of_children'],
            ]
        );


        EducationalData::updateOrCreate(
            ['student_id' => $student->id ?? null],
            [
                'student_id' => $student->id,
                'elementary' => $validated['elementary'],
                'high_school' => $validated['high_school'],
                'vocational' => $validated['vocational'],
                'college' => $validated['college'],
                'scholarship' => $validated['scholarship'],
            ]
        );

        ActivityInterest::updateOrCreate(
            ['student_id' => $student->id ?? null],
            [
                'student_id' => $student->id,
                'extra_curricular' => $validated['extra_curricular'],
                'special_skills' => $validated['special_skills'],
                'hobbies' => $validated['hobbies'],
                'interest' => $validated['interest'],
                'subject_best_like' => $validated['subject_best_like'],
                'subject_least_like' => $validated['subject_least_like'],
            ]
        );

        PersonalHistory::updateOrCreate(
            ['student_id' => $student->id ?? null],
            [
                'student_id' => $student->id,
                'cigarette' => $validated['cigarette'],
                'liquior' => $validated['liquior'],
                'drugs' => $validated['drugs'],
                'discipline' => $validated['discipline'],
            ]
        );

        CounsellingRecord::updateOrCreate(
            ['student_id' => $student->id ?? null],
            [
                'student_id' => $student->id,
                'counselling_record_1' => $validated['counselling_record_1'] ?? null,
                'counselling_record_2' => $validated['counselling_record_2'] ?? null,
                'counselling_record_3' => $validated['counselling_record_3'] ?? null,
            ]
        );

        ScholasticRecord::updateOrCreate(
            ['student_id' => $student->id ?? null],
            [
                'student_id' => $student->id,
                'scholastic_record_1' => $validated['scholastic_record_1'] ?? null,
                'scholastic_record_2' => $validated['scholastic_record_2'] ?? null,
                'scholastic_record_3' => $validated['scholastic_record_3'] ?? null,
                'scholastic_record_4' => $validated['scholastic_record_4'] ?? null,
                'scholastic_record_5' => $validated['scholastic_record_5'] ?? null,
                'scholastic_record_6' => $validated['scholastic_record_6'] ?? null,
                'scholastic_record_7' => $validated['scholastic_record_7'] ?? null,
                'scholastic_record_8' => $validated['scholastic_record_8'] ?? null,
                'scholastic_record_9' => $validated['scholastic_record_9'] ?? null,
                'scholastic_record_10' => $validated['scholastic_record_10'] ?? null,
            ]
        );

        ProblemChecklist::updateOrCreate(
            ['id' => $student->problem_checklist->id ?? null],
            [
                'student_id' => $student->id,
                'check_list' => $validated['check_list'],
            ]
        );

        if (array_key_exists('image', $validated) && $validated['image']) {
            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }
            $imagePath = $validated['image']->store('students', 'public');
        } else {
            $image = $student->image;
            $imagePath = $image;
        }

        $validated['image'] = $imagePath;
        $validated['family_background_id'] = $family_background->id;
        $student->update($validated);

        alert('success', 'You have successfully updated you personal information', 'success');

        return redirect()->route('student.profile.show');
    }

}
