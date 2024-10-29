<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFamilyBackgroundRequest;
use App\Http\Requests\StoreStudentInfoRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Course;
use App\Models\User;
use App\Models\Student;
use App\Models\FamilyBackground;
use App\Models\FatherInfo;
use App\Models\MotherInfo;
use App\Models\SpouseInfo;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['bail', 'required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($validated)) {

            alert('Success', 'You have sucessfully login!', 'success');

            $user = auth()->user();

            if ($user->role == 'Student') {
                return redirect()->route('student.profile.show');
            } else {
                return redirect()->route('admin.student-list.pending');
            }
        }

        alert('Error', 'Wrong credentials. Please check your email or password', 'error');

        return back()->withInput();
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => ['bail', 'required', 'email', 'unique:users,email'],
            'password' => ['bail', 'required', 'min:8', 'confirmed'],
        ]);

        $request->session()->put('email', $validated['email']);
        $request->session()->put('password', $validated['password']);

        return redirect()->route('student.personal-info');
    }

    public function showPersonalInfo()
    {
        $courses = Course::all();
        return view('auth.personal-info', [
            'courses' => $courses
        ]);
    }

    public function personalInfo(StoreStudentInfoRequest $request)
    {
        $validated = $request->validated();

        $request->session()->put('student_id', $validated['student_id']);
        $request->session()->put('fname', $validated['fname']);
        $request->session()->put('lname', $validated['lname']);
        $request->session()->put('m_i', $validated['m_i']);
        $request->session()->put('course_id', $validated['course_id']);
        $request->session()->put('year_lvl', $validated['year_lvl']);
        $request->session()->put('birth_date', $validated['birth_date']);
        $request->session()->put('birth_place', $validated['birth_place']);
        $request->session()->put('gender', $validated['gender']);
        $request->session()->put('citizenship', $validated['citizenship']);
        $request->session()->put('civil_status', $validated['civil_status']);
        $request->session()->put('contact_num', $validated['contact_num']);

        $request->session()->put('e_fullname', $validated['e_fullname']);
        $request->session()->put('e_contact_num', $validated['e_contact_num']);
        $request->session()->put('e_occupation', $validated['e_occupation']);

        return redirect()->route('student.family-background');
    }

    public function showFamilyBackGround()
    {
        return view('auth.family-background');
    }

    public function familyBackGround(StoreFamilyBackgroundRequest $request)
    {
        $email = $request->session()->get('email');
        $password = $request->session()->get('password');

        $student_id = $request->session()->get('student_id');
        $fname = $request->session()->get('fname');
        $lname = $request->session()->get('lname');
        $mI = $request->session()->get('m_i');
        $course_id = $request->session()->get('course_id');
        $year_lvl = $request->session()->get('year_lvl');
        $birth_date = $request->session()->get('birth_date');
        $birth_place = $request->session()->get('birth_place');
        $gender = $request->session()->get('gender');
        $citizenship = $request->session()->get('citizenship');
        $civil_status = $request->session()->get('civil_status');
        $contact_num = $request->session()->get('contact_num');

        $e_fullname = $request->session()->get('e_fullname');
        $e_contact_num = $request->session()->get('e_contact_num');
        $e_occupation = $request->session()->get('e_occupation');

        $validated = $request->validated();

        $user = User::create([
            'email' => $email,
            'password' => $password
        ]);

        $father_info = FatherInfo::create([
            'fname' => $validated['f_fname'],
            'lname' => $validated['f_lname'],
            'm_i' => $validated['f_m_i'],
            'occupation' => $validated['f_occupation'],
        ]);

        $mother_info = MotherInfo::create([
            'fname' => $validated['m_fname'],
            'lname' => $validated['m_lname'],
            'm_i' => $validated['m_m_i'],
            'occupation' => $validated['m_occupation'],
        ]);

        $spouse_info = SpouseInfo::create([
            'fname' => $validated['s_fname'],
            'lname' => $validated['s_lname'],
            'm_i' => $validated['s_m_i'],
            'occupation' => $validated['s_occupation'],
        ]);

        $family_back = FamilyBackground::create([
            'father_info_id' => $father_info->id,
            'mother_info_id' => $mother_info->id,
            'spouse_info_id' => $spouse_info->id
        ]);

        Student::create([
            'user_id' => $user->id,
            'family_background_id' => $family_back->id,
            'fname' => $fname,
            'lname' => $lname,
            'm_i' => $mI,
            'student_id' => $student_id,
            'course_id' => $course_id,
            'year_lvl' => $year_lvl,
            'birth_date' => $birth_date,
            'birth_place' => $birth_place,
            'gender' => $gender,
            'citizenship' => $citizenship,
            'civil_status' => $civil_status,
            'contact_num' => $contact_num,
            'emergency_fullname' => $e_fullname,
            'emergency_contact_num' => $e_contact_num,
            'emergency_occupation' => $e_occupation
        ]);


        Auth::login($user);

        // Send email verification notification
        $user->sendEmailVerificationNotification();

        event(new Registered($user));

        alert('Successfully', 'We send you an email verification!', 'success');

        return redirect()->route('verification.notice');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
