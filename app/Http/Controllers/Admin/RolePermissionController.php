<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.roles_permissions.index', compact('roles', 'permissions'));
    }

    public function assign(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'array',
        ]);

        $role = Role::findOrFail($request->role_id);

        // Convert IDs to names before syncing
        $permissionNames = Permission::whereIn('id', $request->permissions ?? [])
                            ->pluck('name')
                            ->toArray();

        $role->syncPermissions($permissionNames);

       return redirect()->route('admin.roles.permissions')
    ->with('success', 'Permissions assigned successfully ✅');

    }
}
