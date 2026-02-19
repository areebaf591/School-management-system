<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        $adminRole   = Role::firstOrCreate(['name' => 'admin']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);

        // Admin
        $admin = User::updateOrCreate(
            ['email' => 'areebaf591@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('29272927'),
                'status' => 'active',  // ✅ must be active for login
                'role_id' => $adminRole->id
            ]
        );
        $admin->syncRoles($adminRole);

        // Teacher
        $teacher = User::updateOrCreate(
            ['email' => 'babarhumerababar@gmail.com'],
            [
                'name' => 'Teacher User',
                'password' => Hash::make('password'),
                'status' => 'active', // ✅ active
                'role_id' => $teacherRole->id
            ]
        );
        $teacher->syncRoles($teacherRole);

        // Student
        $student = User::updateOrCreate(
            ['email' => 'student@gmail.com'],
            [
                'name' => 'Student User',
                'password' => Hash::make('password'),
                'status' => 'active', // ✅ active
                'role_id' => $studentRole->id
            ]
        );
        $student->syncRoles($studentRole);
    }
}
