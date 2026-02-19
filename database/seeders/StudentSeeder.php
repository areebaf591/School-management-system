<?php

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'name' => 'Ali Khan',
            'email' => 'ali@example.com',
            'classroom_id' => 1
        ]);

        Student::create([
            'name' => 'Sara Ahmed',
            'email' => 'sara@example.com',
            'classroom_id' => 1
        ]);
    }
}
