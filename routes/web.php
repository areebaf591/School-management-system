<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OTPController;

/* Admin Controllers */
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\ReportController;

/* Teacher / Student Controllers */
use App\Http\Controllers\Teacher\TeacherDashboardController;
use App\Http\Controllers\Student\StudentDashboardController;


// | Home

Route::get('/', function () {
    return view('frontend.home');
})->name('home');




// OTP Routes

Route::get('/otp', [OTPController::class, 'show'])->name('otp.form');
Route::post('/otp/send', [OTPController::class, 'sendOtp'])->name('otp.send');
Route::post('/otp/verify', [OTPController::class, 'verify'])->name('otp.verify');

Route::get('/otp/resend', [OTPController::class, 'resend'])->name('otp.resend');


// | Authenticated Routes

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->status !== 'active') {
            auth()->logout();
            return redirect()->route('login')
                ->with('error', 'Your account is not active yet.');
        }

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('teacher')) {
            return redirect()->route('teacher.dashboard');
        }

        if ($user->hasRole('student')) {
            return redirect()->route('student.dashboard');
        }

        abort(403);
    })->name('dashboard');

    /* Profile */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Student */
    Route::middleware('role:student')->prefix('student')->name('student.')->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    });

    /* Teacher */
   Route::middleware('role:teacher')->prefix('teacher')->name('teacher.')->group(function () {

    Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('dashboard');

    Route::get('/attendance', [TeacherDashboardController::class, 'attendance'])->name('attendance');
    Route::post('/attendance', [TeacherDashboardController::class, 'saveAttendance'])->name('attendance.save');

    Route::post('/attendance/student/add', [TeacherDashboardController::class, 'addStudent'])
        ->name('attendance.student.add');

    Route::get('/attendance/all', [TeacherDashboardController::class, 'allAttendance'])
        ->name('attendance.all');

    Route::get('/syllabus', [TeacherDashboardController::class, 'syllabus'])
        ->name('syllabus');

    Route::get('/students', [TeacherDashboardController::class, 'students'])
        ->name('students');
});


    
    // | ADMIN ROUTES (FIXED)
   
  Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
Route::post('/users/{id}/reject', [UserController::class, 'rejectUser'])
    ->name('users.reject');


        /* Users CRUD */
        Route::resource('users', UserController::class);
        /* 🔥 TRASH ROUTES  */
        Route::get('/users/trash', [UserController::class, 'trash'])
            ->name('users.trash');
Route::post('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
Route::match(['get','post'], '/users/{id}/restore', [UserController::class, 'restore'])
    ->name('users.restore');



        Route::delete('/users/{id}/force-delete', [UserController::class, 'forceDelete'])
            ->name('users.forceDelete');

        /* USERS CRUD */
        Route::resource('users', UserController::class);

        /* Pending Users */
        Route::get('/users/pending', [UserController::class, 'pendingUsers'])->name('users.pending');
        Route::post('/users/approve/{id}', [UserController::class, 'approveUser'])->name('users.approve');

        /* Permissions */
        Route::resource('permissions', PermissionController::class);

        /* Roles & Permissions */
        Route::get('/roles-permissions', [RolePermissionController::class, 'index'])->name('roles.permissions');
        Route::post('/roles-permissions', [RolePermissionController::class, 'assign'])->name('roles.permissions.assign');

        /* Reports */
        Route::get('/reports/users', [ReportController::class, 'userReports'])->name('reports.users');
        Route::get('/reports/users/export', [ReportController::class, 'exportUsers'])->name('reports.users.export');
   Route::get('/reports', [ReportController::class, 'userReports'])
    ->name('reports.index');

        });
});
// Route::get('/', function () {
//     return view('app');
// });


require __DIR__ . '/auth.php';
