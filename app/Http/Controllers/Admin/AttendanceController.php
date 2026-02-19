<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use App\Exports\AttendanceExport;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    // Show all attendance records
    public function index()
    {
        $attendances = Attendance::with('student')->orderBy('date','desc')->get();
        return view('admin.attendance.index', compact('attendances'));
    }

    // Show form to add attendance
    public function create()
    {
        $students = User::all(); // list all students
        return view('admin.attendance.create', compact('students'));
    }

    // Store attendance
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'attendance' => 'required|array',
        ]);

        foreach($request->attendance as $student_id => $status){
            Attendance::updateOrCreate(
                [
                    'student_id' => $student_id,
                    'date' => $request->date
                ],
                [
                    'present' => $status == 'present' ? true : false
                ]
            );
        }

        return redirect()->route('attendance.index')->with('success','Attendance saved successfully!');
    }

    // Export to Excel
    public function export()
    {
        return Excel::download(new AttendanceExport, 'attendance.xlsx');
    }
}
