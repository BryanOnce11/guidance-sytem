<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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

            if ($user->role == 'student') {
                return redirect()->route('student.dashboard');
            } else {
                return redirect()->route('admin.dashboard');
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
            'fname' => ['bail', 'required', 'string'],
            'lname' => ['bail', 'required', 'string'],
            'm_i' => ['bail', 'required', 'string', 'size:1'],
            'email' => ['bail', 'required', 'email', 'unique:users,email'],
            'password' => ['bail', 'required', 'min:8', 'confirmed'],
        ]);

        $user = User::create($validated);

        Auth::login($user);

        // Send email verification notification
        $user->sendEmailVerificationNotification();

        event(new Registered($user));

        alert('Successfully', 'We send you a email verification!', 'success');

        return redirect()->route('verification.notice');
    }
}
