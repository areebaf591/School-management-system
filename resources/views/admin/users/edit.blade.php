<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #39726b; /* Teal color */
            --secondary-color: #3ba796; /* Light teal */
            --accent-color: #49c48a; /* Very light teal */
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
        
        .role-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .role-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(20, 184, 166, 0.1);
        }
        
        .role-card.selected {
            border-color: var(--primary-color);
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.05), rgba(94, 234, 212, 0.02));
        }
        
        .user-avatar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
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
        <!-- Edit User Header -->
        <div class="page-header glass-card rounded-xl p-8 mb-8">
            <div class="flex items-center">
                <div class="header-icon w-16 h-16 rounded-full flex items-center justify-center mr-6">
                    <i class="fas fa-user-edit text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gradient mb-2">Edit User</h2>
                    <p class="text-zinc-600 text-lg">Update user information and role</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Section -->
            <div class="lg:col-span-2">
                <div class="glass-card rounded-xl p-6">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <!-- User Profile Card -->
                        <div class="flex items-center p-4 bg-teal-50 rounded-lg mb-6">
                            <div class="user-avatar w-16 h-16 rounded-full mr-4">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-zinc-800">{{ $user->name }}</h3>
                                <p class="text-sm text-zinc-600">{{ $user->email }}</p>
                                <p class="text-xs text-zinc-500 mt-1">User ID: {{ $user->id }}</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-zinc-700 mb-2">
                                    <i class="fas fa-user mr-2 text-teal-600"></i>Full Name
                                </label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-input w-full px-4 py-3 border border-zinc-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent" required>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-zinc-700 mb-2">
                                    <i class="fas fa-envelope mr-2 text-teal-600"></i>Email Address
                                </label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-input w-full px-4 py-3 border border-zinc-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent" required>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-zinc-700 mb-2">
                                <i class="fas fa-lock mr-2 text-teal-600"></i>New Password
                            </label>
                            <input type="password" name="password" class="form-input w-full px-4 py-3 border border-zinc-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent" placeholder="Leave blank to keep current password">
                            <p class="text-xs text-zinc-500 mt-1">Only enter a new password if you want to change it</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-zinc-700 mb-2">
                                <i class="fas fa-user-shield mr-2 text-teal-600"></i>Assign Role
                            </label>
                            <select name="role" class="form-input w-full px-4 py-3 border border-zinc-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->roles->contains($role) ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="flex items-center justify-between pt-4">
                            <a href="{{ route('admin.users.index') }}" class="flex items-center text-teal-600 hover:text-teal-800 transition-colors duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Back to Users
                            </a>
                            <div class="flex space-x-3">
                                <button type="button" onclick="if(confirm('Are you sure you want to delete this user?')) window.location='{{ route('admin.users.destroy', $user->id) }}'" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200 flex items-center">
                                    <i class="fas fa-trash mr-2"></i>
                                    Delete
                                </button>
                                <button type="submit" class="submit-button px-6 py-3 text-white rounded-lg flex items-center shadow-md">
                                    <i class="fas fa-save mr-2"></i>
                                    Update User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- User Information Section -->
            <div class="lg:col-span-1">
                <div class="glass-card rounded-xl p-6 mb-6">
                    <h3 class="text-lg font-semibold text-zinc-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                        User Information
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm text-zinc-600">User ID</span>
                            <span class="text-sm font-medium text-zinc-800">#{{ $user->id }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-zinc-600">Status</span>
                            <span class="text-sm font-medium text-green-600">Active</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-zinc-600">Current Role</span>
                            <span class="text-sm font-medium text-zinc-800">{{ $user->roles->pluck('name')->first() ? ucfirst($user->roles->pluck('name')->first()) : 'No Role' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-zinc-600">Created</span>
                            <span class="text-sm font-medium text-zinc-800">{{ $user->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-zinc-600">Last Updated</span>
                            <span class="text-sm font-medium text-zinc-800">{{ $user->updated_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="glass-card rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-zinc-800 mb-4 flex items-center">
                        <i class="fas fa-shield-alt text-teal-500 mr-2"></i>
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
            </div>
        </div>
    </main>

    <script>
        // Add interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Add ripple effect to buttons
            const buttons = document.querySelectorAll('.nav-button, .submit-button');
            
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
            
            // Role selection interaction
            const roleCards = document.querySelectorAll('.role-card');
            const roleSelect = document.querySelector('select[name="role"]');
            
            // Set initial selected state
            const currentRole = roleSelect.value;
            roleCards.forEach(card => {
                const roleName = card.querySelector('.font-medium').textContent.toLowerCase();
                if (roleName === currentRole) {
                    card.classList.add('selected');
                }
            });
            
            roleCards.forEach(card => {
                card.addEventListener('click', function() {
                    const roleName = this.querySelector('.font-medium').textContent.toLowerCase();
                    const matchingOption = Array.from(roleSelect.options).find(option => 
                        option.text.toLowerCase() === roleName
                    );
                    
                    if (matchingOption) {
                        roleSelect.value = matchingOption.value;
                        
                        // Update selected state
                        roleCards.forEach(c => c.classList.remove('selected'));
                        this.classList.add('selected');
                    }
                });
            });
            
            // Update selected state when dropdown changes
            roleSelect.addEventListener('change', function() {
                const selectedText = this.options[this.selectedIndex].text.toLowerCase();
                roleCards.forEach(card => {
                    const roleName = card.querySelector('.font-medium').textContent.toLowerCase();
                    if (roleName === selectedText) {
                        card.classList.add('selected');
                    } else {
                        card.classList.remove('selected');
                    }
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