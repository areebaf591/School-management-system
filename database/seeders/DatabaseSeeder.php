<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1️⃣ Roles seed karo
        $this->call(RoleSeeder::class);

        // 2️⃣ Permissions seed karo
        $this->call(PermissionSeeder::class);

        // 3️⃣ Admin ko ALL permissions do
        $admin = Role::where('name', 'admin')->first();

        if ($admin) {
            $admin->syncPermissions(Permission::all());
        }
    }
}
