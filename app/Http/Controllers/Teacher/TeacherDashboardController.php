<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\Attendance;
use Carbon\Carbon;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $classesCount = Classroom::count();
        $studentsCount = Student::count();
        $pendingAttendance = 0; // optional

        return view('teacher.dashboard', compact('classesCount','studentsCount','pendingAttendance'));
    }

    // Attendance page
    public function attendance()
    {
        $students = Student::with('classroom')->get(); // load classroom relation
        $classrooms = Classroom::all(); // classroom dropdown

        // Today's attendance array [student_id => present]
        $today = Carbon::today()->toDateString();
        $attendances = Attendance::where('date', $today)
                        ->pluck('present', 'student_id')
                        ->toArray();

        return view('teacher.attendance', compact('students','attendances','classrooms'));
    }

    // Save attendance
    public function saveAttendance(Request $request)
    {
        $today = Carbon::today()->toDateString();
        $students = Student::all();

        foreach($students as $student) {
            // Dropdown value: 1=Present, 0=Absent
            $present = $request->attendance[$student->id] ?? 0;

            Attendance::updateOrCreate(
                ['student_id' => $student->id, 'date' => $today],
                ['present' => $present]
            );
        }

        return redirect()->back()->with('success', 'Attendance saved successfully ✅');
    }

    // Add student from attendance page
    public function addStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'classroom_id' => $request->classroom_id,
        ]);

        return redirect()->back()->with('success', 'Student added successfully ✅');
    }

    // All Attendance page
    public function allAttendance()
    {
        $attendances = Attendance::with('student.classroom')
                        ->orderBy('date', 'desc')
                        ->get();

        return view('teacher.attendance_all', compact('attendances'));
    }

    // Syllabus page
    public function syllabus()
    {
        return view('teacher.syllabus');
    }

    // Students page
    public function students()
    {
        $students = Student::with('classroom')->get();
        return view('teacher.students', compact('students'));
    }
}
