<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
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

        return redirect()->route('student-info');
    }

    public function showStudentInfo()
    {
        return view('student-info');
    }

    public function studentInfo(StoreStudentRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'email' => $request->session()->get('email'),
            'password' => $request->session()->get('password')
        ]);

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
            'user_id' => $user->id,
            'family_background_id' => $family_back->id,
            'fname' => $validated['fname'],
            'lname' => $validated['lname'],
            'm_i' => $validated['m_i'],
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
