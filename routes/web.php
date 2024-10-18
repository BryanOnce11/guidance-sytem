<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\StudentController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::get('/dashboard', function () {
    return view('Dashboard.dashboard');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.post');
});

route::controller(VerificationController::class)->group(function () {
    Route::get('email/verify', 'show')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'verify')->name('verification.verify');
    Route::post('email/resend', 'resend')->name('verification.resend');
});


Route::controller(StudentController::class)->group(function () {
    Route::get('good-moral', 'indexGoodmoral')->name('student.good-moral.index');
    Route::get('good-moral/create', 'createGoodmoral')->name('student.good-moral.create');
    Route::post('good-moral', 'storeGoodmoral')->name('student.good-moral.store');
    Route::get('counceling', 'indexCounseling')->name('student.counceling.index');
    Route::get('counceling/create', 'createCounseling')->name('student.counceling.create');
    Route::post('counceling', 'storeCounseling')->name('student.counceling.store');
    Route::get('profile', 'showStudentProfile')->name('student.profile.show');
    Route::put('profile/{student}', 'updateStudentProfile')->name('student.profile.update');
});
