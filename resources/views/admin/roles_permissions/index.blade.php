<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles & Permissions - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
           --primary-color: #0c2c28; /* Teal color */
            --secondary-color: #298a7b; /* Light teal */
            --accent-color: #a7f3d0; /* Very light teal */
            --zinc-100: #f4f4f5;
            --zinc-200: #e4e4e7;
            --zinc-300: #d4d4d8;
            --zinc-400: #a1a1aa;
            --zinc-500: #71717a;
            --zinc-600: #52525b;
            --zinc-700: #3f3f46;
            --zinc-800: #27272a;
            --zinc-900: #18181b;
        }
        
        body {
            background-color: #ffffff;
            color: #18181b;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(244, 244, 245, 0.8);
            box-shadow: 0 8px 32px rgba(20, 184, 166, 0.08);
        }
        
        .glass-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(20, 184, 166, 0.15);
            border-color: rgba(20, 184, 166, 0.2);
        }
        
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            background: linear-gradient(135deg, #ffffff 0%, #f4f4f5 100%);
        }
        
        .floating-element {
            position: absolute;
            opacity: 0.08;
            animation-duration: 60s; /* Slowed down animation */
        }
        
        .graduation-cap {
            top: 20%;
            left: -10%;
            animation: float-right 90s infinite linear; /* Much slower */
        }
        
        .pen {
            top: 60%;
            right: -10%;
            animation: float-left 80s infinite linear; /* Much slower */
        }
        
        .book {
            bottom: 10%;
            left: 10%;
            animation: float-up 100s infinite linear; /* Much slower */
        }
        
        .pencil {
            top: 40%;
            left: 5%;
            animation: float-diagonal 120s infinite linear; /* Much slower */
        }
        
        .calculator {
            top: 10%;
            right: 15%;
            animation: float-diagonal-reverse 110s infinite linear; /* Much slower */
        }
        
        .ruler {
            bottom: 20%;
            right: 5%;
            animation: float-right-reverse 95s infinite linear; /* Much slower */
        }
        
        .backpack {
            top: 70%;
            left: 15%;
            animation: float-up 150s infinite linear; /* New element */
        }
        
        .apple {
            top: 30%;
            right: 25%;
            animation: float-diagonal 160s infinite linear; /* New element */
        }
        
        .school-bus {
            bottom: 30%;
            left: 20%;
            animation: float-right 140s infinite linear; /* New element */
        }
        
        @keyframes float-right {
            0% { transform: translateX(0) rotate(0deg); }
            100% { transform: translateX(calc(100vw + 20%)) rotate(360deg); }
        }
        
        @keyframes float-left {
            0% { transform: translateX(0) rotate(0deg); }
            100% { transform: translateX(calc(-100vw - 20%)) rotate(-360deg); }
        }
        
        @keyframes float-up {
            0% { transform: translateY(0) rotate(0deg); }
            100% { transform: translateY(calc(-100vh - 20%)) rotate(360deg); }
        }
        
        @keyframes float-diagonal {
            0% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(30vw, -10vh) rotate(90deg); }
            50% { transform: translate(60vw, 10vh) rotate(180deg); }
            75% { transform: translate(30vw, 30vh) rotate(270deg); }
            100% { transform: translate(0, 0) rotate(360deg); }
        }
        
        @keyframes float-diagonal-reverse {
            0% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(-30vw, 10vh) rotate(-90deg); }
            50% { transform: translate(-60vw, -10vh) rotate(-180deg); }
            75% { transform: translate(-30vw, -30vh) rotate(-270deg); }
            100% { transform: translate(0, 0) rotate(-360deg); }
        }
        
        @keyframes float-right-reverse {
            0% { transform: translateX(0) rotate(0deg); }
            100% { transform: translateX(calc(-100vw - 20%)) rotate(-360deg); }
        }
        
        .nav-button {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .nav-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s ease;
        }
        
        .nav-button:hover::before {
            left: 100%;
        }
        
        .nav-button:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(20, 184, 166, 0.4);
        }
        
        .text-gradient {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .pattern-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(var(--zinc-200) 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.5;
            z-index: -1;
        }
        
        .nav-header {
            position: relative;
            z-index: 10;
        }
        
        .nav-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--zinc-300), transparent);
        }
        
        .dashboard-logo {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .dashboard-logo:hover {
            transform: scale(1.05);
        }
        
        .page-header {
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.1), rgba(94, 234, 212, 0.05));
            border-left: 4px solid var(--primary-color);
        }
        
        .header-icon {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 4px 15px rgba(20, 184, 166, 0.3);
        }
        
        .form-input {
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(57, 114, 107, 0.1);
        }
        
        .submit-button {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            transition: all 0.3s ease;
        }
        
        .submit-button:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(20, 184, 166, 0.4);
        }
        
        .permission-checkbox {
            transition: all 0.2s ease;
        }
        
        .permission-checkbox:checked + label {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .permission-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .permission-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(20, 184, 166, 0.1);
        }
        
        .permission-card.selected {
            border-color: var(--primary-color);
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.05), rgba(94, 234, 212, 0.02));
        }
        
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s ease;
        }
        
        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 500px;
            max-height: 80vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .role-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .role-admin {
            background-color: rgba(139, 92, 246, 0.1);
            color: #6d28d9;
        }
        
        .role-teacher {
            background-color: rgba(34, 197, 94, 0.1);
            color: #15803d;
        }
        
        .role-student {
            background-color: rgba(59, 130, 246, 0.1);
            color: #1e40af;
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="pattern-bg"></div>
        <div class="floating-element graduation-cap">
            <i class="fas fa-graduation-cap text-6xl text-teal-600"></i>
        </div>
        <div class="floating-element pen">
            <i class="fas fa-pen text-5xl text-teal-500"></i>
        </div>
        <div class="floating-element book">
            <i class="fas fa-book text-6xl text-teal-600"></i>
        </div>
        <div class="floating-element pencil">
            <i class="fas fa-pencil-alt text-5xl text-teal-500"></i>
        </div>
        <div class="floating-element calculator">
            <i class="fas fa-calculator text-5xl text-teal-400"></i>
        </div>
        <div class="floating-element ruler">
            <i class="fas fa-ruler text-5xl text-teal-400"></i>
        </div>
        <div class="floating-element backpack">
            <i class="fas fa-backpack text-5xl text-teal-300"></i>
        </div>
        <div class="floating-element apple">
            <i class="fas fa-apple-alt text-5xl text-teal-300"></i>
        </div>
        <div class="floating-element school-bus">
            <i class="fas fa-bus text-6xl text-teal-300"></i>
        </div>
    </div>

    <!-- Navigation Header -->
    <header class="glass-card sticky top-0 z-50 nav-header">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="dashboard-logo w-10 h-10 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg flex items-center justify-center shadow-lg" onclick="window.location='{{ route('dashboard') }}'">
                        <i class="fas fa-graduation-cap text-white"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gradient">Admin Dashboard</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                   <a href="{{ route('admin.users.index') }}" class="nav-button px-4 py-2 rounded-lg text-white flex items-center space-x-2">
    <i class="fas fa-users"></i>
    <span>Users</span>
</a>

                    <button class="nav-button px-4 py-2 rounded-lg text-white flex items-center space-x-2">
                        <i class="fas fa-user-circle"></i>
                        <span>Profile</span>
                    </button>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="nav-button px-4 py-2 rounded-lg text-white flex items-center space-x-2">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Roles & Permissions Header -->
        <div class="page-header glass-card rounded-xl p-8 mb-8">
            <div class="flex items-center">
                <div class="header-icon w-16 h-16 rounded-full flex items-center justify-center mr-6">
                    <i class="fas fa-user-shield text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gradient mb-2">Roles & Permissions</h2>
                    <p class="text-zinc-600 text-lg">Manage user roles and their associated permissions</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Section -->
            <div class="lg:col-span-2">
                <div class="glass-card rounded-xl p-6">
                    @if(session('success'))
                        <div class="p-4 mb-6 bg-green-100 text-green-800 rounded-lg flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

<form action="{{ route('admin.roles.permissions.assign') }}" method="POST" id="permissionForm">
                        @csrf

                        <!-- Role Select -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-zinc-700 mb-2">
                                <i class="fas fa-user-tag mr-2 text-teal-600"></i>Select Role
                            </label>
                            <select name="role_id" id="roleSelect" class="form-input w-full px-4 py-3 border border-zinc-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Permissions -->
                        <div class="mb-6" id="permissionsContainer">
                            <label class="block text-sm font-medium text-zinc-700 mb-3">
                                <i class="fas fa-key mr-2 text-teal-600"></i>Assign Permissions
                            </label>
                            
                            <!-- Group permissions by category -->
                            <div class="space-y-4">
                                <!-- User Management Permissions -->
                                <div class="permission-card bg-zinc-50 rounded-lg p-4 border border-zinc-200">
                                    <h4 class="font-medium text-zinc-800 mb-3 flex items-center">
                                        <i class="fas fa-users-cog mr-2 text-teal-600"></i>
                                        User Management
                                    </h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        @foreach($permissions->where('name', 'like', 'user%') as $permission)
                                            <div class="flex items-center space-x-2">
                                                <input type="checkbox"
                                                       id="perm-{{ $permission->id }}"
                                                       name="permissions[]"
                                                       value="{{ $permission->id }}"
                                                       data-role-permissions="{{ $permission->roles->pluck('id')->join(',') }}"
                                                       class="permission-checkbox w-4 h-4 text-teal-600 border-zinc-300 rounded focus:ring-teal-500">
                                                <label for="perm-{{ $permission->id }}" class="text-sm text-zinc-700 cursor-pointer">
                                                    {{ ucfirst(str_replace('-', ' ', $permission->name)) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <!-- Content Management Permissions -->
                                <div class="permission-card bg-zinc-50 rounded-lg p-4 border border-zinc-200">
                                    <h4 class="font-medium text-zinc-800 mb-3 flex items-center">
                                        <i class="fas fa-file-alt mr-2 text-teal-600"></i>
                                        Content Management
                                    </h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        @foreach($permissions->where('name', 'like', 'content%') as $permission)
                                            <div class="flex items-center space-x-2">
                                                <input type="checkbox"
                                                       id="perm-{{ $permission->id }}"
                                                       name="permissions[]"
                                                       value="{{ $permission->id }}"
                                                       data-role-permissions="{{ $permission->roles->pluck('id')->join(',') }}"
                                                       class="permission-checkbox w-4 h-4 text-teal-600 border-zinc-300 rounded focus:ring-teal-500">
                                                <label for="perm-{{ $permission->id }}" class="text-sm text-zinc-700 cursor-pointer">
                                                    {{ ucfirst(str_replace('-', ' ', $permission->name)) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <!-- System Permissions -->
                                <div class="permission-card bg-zinc-50 rounded-lg p-4 border border-zinc-200">
                                    <h4 class="font-medium text-zinc-800 mb-3 flex items-center">
                                        <i class="fas fa-cog mr-2 text-teal-600"></i>
                                        System Settings
                                    </h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        @foreach($permissions->where('name', 'like', 'system%') as $permission)
                                            <div class="flex items-center space-x-2">
                                                <input type="checkbox"
                                                       id="perm-{{ $permission->id }}"
                                                       name="permissions[]"
                                                       value="{{ $permission->id }}"
                                                       data-role-permissions="{{ $permission->roles->pluck('id')->join(',') }}"
                                                       class="permission-checkbox w-4 h-4 text-teal-600 border-zinc-300 rounded focus:ring-teal-500">
                                                <label for="perm-{{ $permission->id }}" class="text-sm text-zinc-700 cursor-pointer">
                                                    {{ ucfirst(str_replace('-', ' ', $permission->name)) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <!-- Other Permissions -->
                                <div class="permission-card bg-zinc-50 rounded-lg p-4 border border-zinc-200">
                                    <h4 class="font-medium text-zinc-800 mb-3 flex items-center">
                                        <i class="fas fa-ellipsis-h mr-2 text-teal-600"></i>
                                        Other Permissions
                                    </h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        @foreach($permissions->whereNotIn('name', $permissions->where('name', 'like', 'user%')->pluck('name'))
                                                                ->whereNotIn('name', $permissions->where('name', 'like', 'content%')->pluck('name'))
                                                                ->whereNotIn('name', $permissions->where('name', 'like', 'system%')->pluck('name')) as $permission)
                                            <div class="flex items-center space-x-2">
                                                <input type="checkbox"
                                                       id="perm-{{ $permission->id }}"
                                                       name="permissions[]"
                                                       value="{{ $permission->id }}"
                                                       data-role-permissions="{{ $permission->roles->pluck('id')->join(',') }}"
                                                       class="permission-checkbox w-4 h-4 text-teal-600 border-zinc-300 rounded focus:ring-teal-500">
                                                <label for="perm-{{ $permission->id }}" class="text-sm text-zinc-700 cursor-pointer">
                                                    {{ ucfirst(str_replace('-', ' ', $permission->name)) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" id="previewButton" class="submit-button px-6 py-3 text-white rounded-lg flex items-center shadow-md">
                                <i class="fas fa-eye mr-2"></i>
                                Preview & Assign
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Role Information Section -->
            <div class="lg:col-span-1">
                <div class="glass-card rounded-xl p-6 mb-6">
                    <h3 class="text-lg font-semibold text-zinc-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                        Role Information
                    </h3>
                    <div class="space-y-3">
                        <div class="role-card flex items-center p-3 bg-purple-50 rounded-lg border border-purple-100">
                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-crown text-purple-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="font-medium text-zinc-800">Admin</p>
                                <p class="text-xs text-zinc-600">Full system access</p>
                            </div>
                        </div>
                        <div class="role-card flex items-center p-3 bg-green-50 rounded-lg border border-green-100">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-chalkboard-teacher text-green-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="font-medium text-zinc-800">Teacher</p>
                                <p class="text-xs text-zinc-600">Can manage classes</p>
                            </div>
                        </div>
                        <div class="role-card flex items-center p-3 bg-blue-50 rounded-lg border border-blue-100">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user-graduate text-blue-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="font-medium text-zinc-800">Student</p>
                                <p class="text-xs text-zinc-600">Limited access</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="glass-card rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-zinc-800 mb-4 flex items-center">
                        <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>
                        Permission Tips
                    </h3>
                    <ul class="space-y-3 text-sm text-zinc-600">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Assign only necessary permissions to each role</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Admin role should have all system permissions</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Regularly review and update role permissions</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Use the preview button to confirm before assigning</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <div class="bg-gradient-to-r from-teal-500 to-teal-600 text-white p-6 rounded-t-xl">
                <h3 class="text-xl font-semibold flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    Confirm Permission Assignment
                </h3>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <p class="text-zinc-700 mb-2">You are about to assign the following permissions to:</p>
                    <div class="bg-zinc-100 rounded-lg p-3 mb-4">
                        <p class="font-semibold text-teal-600" id="selectedRoleName">Role Name</p>
                    </div>
                    <p class="text-zinc-700 mb-2">Selected Permissions:</p>
                    <div class="bg-zinc-50 rounded-lg p-3 max-h-60 overflow-y-auto" id="selectedPermissionsList">
                        <!-- Permissions will be listed here -->
                    </div>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" id="cancelButton" class="px-4 py-2 bg-zinc-200 text-zinc-800 rounded-lg hover:bg-zinc-300 transition-colors">
                        Cancel
                    </button>
                    <button type="button" id="confirmButton" class="px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-colors">
                        Confirm Assignment
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const roleSelect = document.getElementById('roleSelect');
        const checkboxes = document.querySelectorAll('.permission-checkbox');
        const permissionForm = document.getElementById('permissionForm');
        const previewButton = document.getElementById('previewButton');
        const confirmationModal = document.getElementById('confirmationModal');
        const cancelButton = document.getElementById('cancelButton');
        const confirmButton = document.getElementById('confirmButton');
        const selectedRoleName = document.getElementById('selectedRoleName');
        const selectedPermissionsList = document.getElementById('selectedPermissionsList');

        function updateCheckboxes() {
            const roleId = roleSelect.value;
            checkboxes.forEach(cb => {
                const permittedRoles = cb.dataset.rolePermissions ? cb.dataset.rolePermissions.split(',') : [];
                cb.checked = permittedRoles.includes(roleId);
                
                // Update parent card styling
                const card = cb.closest('.permission-card');
                if (card) {
                    const cardCheckboxes = card.querySelectorAll('.permission-checkbox');
                    const allChecked = Array.from(cardCheckboxes).every(c => c.checked);
                    const someChecked = Array.from(cardCheckboxes).some(c => c.checked);
                    
                    if (allChecked) {
                        card.classList.add('selected');
                    } else {
                        card.classList.remove('selected');
                    }
                }
            });
        }

        function showConfirmationModal() {
            // Get selected role name
            const selectedOption = roleSelect.options[roleSelect.selectedIndex];
            selectedRoleName.textContent = selectedOption.text;
            
            // Get selected permissions
            const selectedPermissions = [];
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    const label = document.querySelector(`label[for="${cb.id}"]`);
                    if (label) {
                        selectedPermissions.push(label.textContent);
                    }
                }
            });
            
            // Display selected permissions
            if (selectedPermissions.length > 0) {
                selectedPermissionsList.innerHTML = selectedPermissions.map(perm => 
                    `<div class="flex items-center mb-2">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>${perm}</span>
                    </div>`
                ).join('');
            } else {
                selectedPermissionsList.innerHTML = '<p class="text-zinc-500 italic">No permissions selected</p>';
            }
            
            // Show modal
            confirmationModal.classList.add('active');
        }

        function hideConfirmationModal() {
            confirmationModal.classList.remove('active');
        }

        function submitForm() {
            permissionForm.submit();
        }

        // Event listeners
        roleSelect.addEventListener('change', updateCheckboxes);
        
        previewButton.addEventListener('click', function(e) {
            e.preventDefault();
            showConfirmationModal();
        });
        
        cancelButton.addEventListener('click', hideConfirmationModal);
        
        confirmButton.addEventListener('click', function() {
            hideConfirmationModal();
            submitForm();
        });
        
        // Close modal when clicking outside
        confirmationModal.addEventListener('click', function(e) {
            if (e.target === confirmationModal) {
                hideConfirmationModal();
            }
        });

        // Initial load
        updateCheckboxes();

        // Add ripple effect to buttons
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.nav-button, .submit-button, #previewButton, #confirmButton');
            
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });
    </script>
    
    <style>
        .ripple {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(20, 184, 166, 0.3);
            transform: scale(0);
            animation: ripple-animation 0.6s ease-out;
            pointer-events: none;
        }
        
        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>
</body>
</html>