<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role; // 👈 Required for roles

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'pending')->get();
        $roles = Role::all(); // dropdown ke liye

        $totalUsers    = User::count();
        $totalTeachers = User::role('teacher')->count();
        $totalStudents = User::role('student')->count();

        return view('admin.dashboard', compact(
            'users',
            'roles',
            'totalUsers',
            'totalTeachers',
            'totalStudents'
        ));
    }
}
