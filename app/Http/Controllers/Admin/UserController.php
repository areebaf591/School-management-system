<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User; // ✅ REQUIRED (was wrongly commented)
use App\Repositories\UserRepositoryInterface;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserApprovedMail;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name'     => 'required',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role'     => 'required|integer',
    ]);

    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'status'   => 'active',
        'role_id'  => $request->role,
    ]);

    $role = Role::find($request->role);
    if ($role) {
        $user->assignRole($role->name);
    }

    return redirect()->route('admin.users.index')
        ->with('success', 'User created and role assigned successfully.');
}

    
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|integer',
        ]);

        $user->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'role_id' => $request->role,
        ]);

        $role = Role::find($request->role);
        if ($role) {
            $user->syncRoles([$role->name]);
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    /* =========================
       SOFT DELETE USER
    ========================== */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'User moved to trash.');
    }

    /* =========================
       TRASHED USERS (REPOSITORY)
    ========================== */
    public function trash()
    {
        $trashedUsers = $this->userRepo->getTrashedUsers();
        return view('admin.users.trash', compact('trashedUsers'));
    }

    /* =========================
       RESTORE USER (REPOSITORY)
    ========================== */
    public function restore($id)
    {
        $this->userRepo->restoreUser($id);

        return redirect()->route('admin.users.index')
            ->with('success', 'User restored successfully');
    }

    /* =========================
       FORCE DELETE (REPOSITORY)
    ========================== */
    public function forceDelete($id)
    {
        $this->userRepo->forceDeleteUser($id);

        return redirect()->route('admin.users.trash')
            ->with('success', 'User permanently deleted.');
    }

    /* =========================
       PENDING USERS
    ========================== */
    public function pendingUsers()
    {
        $users = User::where('status', 'pending')->get();
        $roles = Role::all();

        return view('admin.users.pending', compact('users', 'roles'));
    }

   
   public function approveUser(Request $request, $id)
{
    $request->validate([
        'role_id' => 'required|integer',
    ]);

    $user = User::findOrFail($id);

    $user->update([
        'role_id' => $request->role_id,
        'status'  => 'active',
    ]);

    $role = Role::find($request->role_id);
    if ($role) {
        $user->assignRole($role->name);
    }

    // ✅ FIXED LINE (no error now)
    Mail::to($user->email)->send(
        new UserApprovedMail($user, $role->name)
    );

    return back()->with('success', 'User approved successfully.');
}


    /* =========================
       REJECT USER
    ========================== */
   public function rejectUser($id)
{
    $user = User::findOrFail($id);
    $user->status = 'rejected';
    $user->save();

    return redirect()->back()->with('success', 'User rejected successfully.');
}




    /* =========================
       SHOW
    ========================== */
    public function show(User $user)
    {
        return redirect()->route('admin.users.edit', $user->id);
    }
}
