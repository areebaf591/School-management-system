<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        // Example stats
        $classesCount = Classroom::count(); 
        $studentsCount = Student::count();
        $pendingAttendance = 5; // example, implement your own logic

        return view('teacher.dashboard', compact('classesCount','studentsCount','pendingAttendance'));
    }

    public function attendance()
    {
        $students = Student::all(); // teacher-specific students logic can be added
        return view('teacher.attendance', compact('students'));
    }

    public function syllabus()
    {
        return view('teacher.syllabus');
    }

    public function students()
    {
        $students = Student::all(); // teacher-specific students
        return view('teacher.students', compact('students'));
    }
}
