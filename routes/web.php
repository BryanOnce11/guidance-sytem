<?php

use App\Http\Controllers\AdminController;
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
    Route::get('/logout', 'logout')->name('logout');
});

route::controller(VerificationController::class)->group(function () {
    Route::get('email/verify', 'show')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'verify')->name('verification.verify');
    Route::post('email/resend', 'resend')->name('verification.resend');
});


Route::middleware('auth')->group(function () {
    // student
    Route::controller(StudentController::class)->prefix('student')->group(function () {
        Route::get('good-moral/pending', 'pendingGoodmoral')->name('student.good-moral.pending');
        Route::get('good-moral/ready-to-pickup', 'readyToPickupGoodmoral')->name('student.good-moral.ready_to_pickup');
        Route::post('good-moral', 'storeGoodmoral')->name('student.good-moral.store');
        Route::get('counseling/pending', 'pendingCounseling')->name('student.counseling.pending');
        Route::get('counseling/approved', 'approvedCounseling')->name('student.counseling.approved');
        Route::post('counseling', 'storeCounseling')->name('student.counseling.store');
        Route::get('profile', 'showStudentProfile')->name('student.profile.show');
        Route::put('profile/{student}', 'updateStudentProfile')->name('student.profile.update');
    });

    //admin
    Route::controller(AdminController::class)->prefix('admin')->group(function () {
        Route::get('student-list/pending', 'pendingStudents')->name('admin.student-list.pending');
        Route::get('student-list/verified', 'verifiedStudents')->name('admn.student-list.verified');
        Route::put('student-list/verify/{user}', 'verifyStudent')->name('admin.student-list.verify');
        Route::get('student-list/profile/{user_id}', 'studentProfile')->name('admin.student-list.profile');
        Route::get('good-moral/pending', 'pendingGoodmoral')->name('admin.good-moral.pending');
        Route::get('good-moral/ready-to-pickup', 'readyToPickupGoodmoral')->name('admin.good-moral.ready_to_pickup');
        Route::put('good-moral/approved/{good_moral_request}', 'approvedGoodMoral')->name('admin.good-moral.approved');
        Route::put('good-moral/picked-up/{good_moral_request}', 'pickedUpGoodMoral')->name('admin.good-moral.picked_up');
        Route::get('counseling/pending', 'pendingCounseling')->name('admin.counseling.pending');
        Route::get('counseling/approved', 'approvedCounseling')->name('admin.counseling.approved');
        Route::put('counseling/date-scheduled/{virtual_counseling}', 'dateScheduledCounseling')->name('admin.couseling.date_scheduled');
        Route::get('counseling/record-history', 'recordHistory')->name('admin.counseling.record_history');
        Route::get('settings/history-logs', 'historyLogs')->name('admin.settings.history_logs');
    });
});

