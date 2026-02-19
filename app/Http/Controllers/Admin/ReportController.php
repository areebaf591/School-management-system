<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Attendance;
use App\Exports\UsersExport;
use App\Exports\AttendanceExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    // USERS REPORT PAGE
    public function userReports()
    {
        $users = User::all();
        return view('admin.reports.user', compact('users'));
    }

    // ATTENDANCE REPORT PAGE
    public function attendanceReports()
    {
        $attendances = Attendance::with('student')->get();
        return view('admin.reports.attendance', compact('attendances'));
    }

    // EXPORT USERS EXCEL
    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    // EXPORT ATTENDANCE EXCEL
    public function exportAttendance()
    {
        return Excel::download(new AttendanceExport, 'attendance.xlsx');
    }
}
