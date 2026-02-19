<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1b534d; /* Teal color */
            --secondary-color: #42af9f; /* Light teal */
            --accent-color: #48af7f; /* Very light teal */
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
            transform: translateY(-5px);
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
            animation-duration: 40s; /* Slowed down animation */
        }
        
        .graduation-cap {
            top: 20%;
            left: -10%;
            animation: float-right 60s infinite linear; /* Slowed down */
        }
        
        .pen {
            top: 60%;
            right: -10%;
            animation: float-left 50s infinite linear; /* Slowed down */
        }
        
        .book {
            bottom: 10%;
            left: 10%;
            animation: float-up 70s infinite linear; /* Slowed down */
        }
        
        .pencil {
            top: 40%;
            left: 5%;
            animation: float-diagonal 80s infinite linear; /* Slowed down */
        }
        
        .calculator {
            top: 10%;
            right: 15%;
            animation: float-diagonal-reverse 75s infinite linear; /* New element */
        }
        
        .ruler {
            bottom: 20%;
            right: 5%;
            animation: float-right-reverse 65s infinite linear; /* New element */
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
        
        .logout-button {
            background: linear-gradient(135deg, #dc2626, #ef4444);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .logout-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s ease;
        }
        
        .logout-button:hover::before {
            left: 100%;
        }
        
        .logout-button:hover {
            background: linear-gradient(135deg, #b91c1c, #dc2626);
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(220, 38, 38, 0.4);
        }
        
        .stat-card {
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.05), rgba(94, 234, 212, 0.02));
            border-left: 3px solid var(--primary-color);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(20, 184, 166, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .stat-card:hover::after {
            opacity: 1;
        }
        
        .stat-card:hover {
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.1), rgba(94, 234, 212, 0.05));
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(20, 184, 166, 0.1);
        }
        
        .feature-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(20, 184, 166, 0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .feature-card:hover::before {
            left: 100%;
        }
        
        .feature-icon {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 1rem;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }
        
        .feature-icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: inherit;
            filter: blur(10px);
            opacity: 0.4;
            z-index: -1;
            transform: scale(0.8);
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 5px 15px rgba(20, 184, 166, 0.4);
        }
        
        .feature-card:hover .feature-icon::after {
            transform: scale(1.2);
            opacity: 0.6;
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .text-gradient {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .welcome-card {
            position: relative;
            overflow: hidden;
        }
        
        .welcome-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.05), rgba(94, 234, 212, 0.02));
            z-index: -1;
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
        
        .notification-dot {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 12px;
            height: 12px;
            background-color: #ef4444;
            border-radius: 50%;
            animation: blink 2s infinite;
        }
        
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .stat-icon-container {
            position: relative;
            width: 60px;
            height: 60px;
            margin: 0 auto 1rem;
        }
        
        .stat-icon-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.1), rgba(94, 234, 212, 0.05));
            transform: scale(1);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover .stat-icon-bg {
            transform: scale(1.1);
        }
        
        .feature-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: var(--primary-color);
            color: white;
            font-size: 0.7rem;
            padding: 2px 8px;
            border-radius: 12px;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(20, 184, 166, 0.3);
        }
        
        .feature-card:hover .feature-badge {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(20, 184, 166, 0.4);
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
    </div>

    <!-- Navigation Header -->
    <header class="glass-card sticky top-0 z-50 nav-header">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg flex items-center justify-center shadow-lg">
                        <i class="fas fa-graduation-cap text-white"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gradient">Teacher Dashboard</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="nav-button px-4 py-2 rounded-lg text-white flex items-center space-x-2">
                            <i class="fas fa-bell"></i>
                            <span>Notifications</span>
                            <span class="notification-dot"></span>
                        </button>
                    </div>
                    <button class="nav-button px-4 py-2 rounded-lg text-white flex items-center space-x-2">
                        <i class="fas fa-user-circle"></i>
                        <span>Profile</span>
                    </button>
                    
                    <!-- Logout Form -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="logout-button px-4 py-2 rounded-lg text-white flex items-center space-x-2">
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
        <!-- Welcome Section -->
        <div class="glass-card welcome-card rounded-xl p-8 mb-8 text-center">
            <h2 class="text-3xl font-bold mb-2 text-gradient">Welcome, {{ Auth::user()->name }} 👨‍🏫</h2>
            <p class="text-zinc-600 text-lg">Here you can manage your students, classes, syllabus and attendance.</p>
            <div class="mt-6 flex justify-center space-x-4">
                <button class="px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition-colors">
                    <i class="fas fa-plus-circle mr-2"></i>Quick Add
                </button>
                <button class="px-4 py-2 border border-teal-500 text-teal-500 rounded-lg hover:bg-teal-50 transition-colors">
                    <i class="fas fa-calendar-alt mr-2"></i>View Schedule
                </button>
            </div>
        </div>

        <!-- Feature Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Attendance Card -->
            <div class="glass-card feature-card rounded-xl p-6 cursor-pointer" onclick="window.location='{{ route('teacher.attendance') }}'">
                <span class="feature-badge">New</span>
                <div class="feature-icon">
                    <i class="fas fa-user-check text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-teal-600 mb-2">Manage Attendance</h3>
                <p class="text-zinc-500">Mark student attendance for your classes.</p>
                <div class="mt-4 text-sm text-zinc-400">
                    <i class="fas fa-clock mr-1"></i> Last updated: Today at 9:30 AM
                </div>
            </div>

            <!-- Syllabus Card -->
            <div class="glass-card feature-card rounded-xl p-6 cursor-pointer" onclick="window.location='{{ route('teacher.syllabus') }}'">
                <div class="feature-icon">
                    <i class="fas fa-book-open text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-teal-600 mb-2">Syllabus</h3>
                <p class="text-zinc-500">Manage your syllabus for different classes and subjects.</p>
                <div class="mt-4 text-sm text-zinc-400">
                    <i class="fas fa-file-alt mr-1"></i> 5 documents uploaded
                </div>
            </div>

            <!-- Students Card -->
            <div class="glass-card feature-card rounded-xl p-6 cursor-pointer" onclick="window.location='{{ route('teacher.students') }}'">
                <span class="feature-badge">Updated</span>
                <div class="feature-icon">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-teal-600 mb-2">Students</h3>
                <p class="text-zinc-500">View and edit student details assigned to you.</p>
                <div class="mt-4 text-sm text-zinc-400">
                    <i class="fas fa-user-graduate mr-1"></i> 120 students enrolled
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="stat-card glass-card rounded-xl p-6 text-center">
                <div class="stat-icon-container">
                    <div class="stat-icon-bg"></div>
                    <i class="fas fa-chalkboard text-3xl text-teal-600 relative z-10"></i>
                </div>
                <h3 class="text-lg font-semibold text-zinc-700 mb-2">Total Classes</h3>
                <p class="text-3xl font-bold text-zinc-800 pulse">{{ $classesCount ?? 0 }}</p>
                <div class="mt-3 text-sm text-zinc-500">
                    <i class="fas fa-arrow-up text-green-500 mr-1"></i> 2 more than last month
                </div>
            </div>
            
            <div class="stat-card glass-card rounded-xl p-6 text-center">
                <div class="stat-icon-container">
                    <div class="stat-icon-bg"></div>
                    <i class="fas fa-user-graduate text-3xl text-teal-600 relative z-10"></i>
                </div>
                <h3 class="text-lg font-semibold text-zinc-700 mb-2">Total Students</h3>
                <p class="text-3xl font-bold text-zinc-800 pulse">{{ $studentsCount ?? 0 }}</p>
                <div class="mt-3 text-sm text-zinc-500">
                    <i class="fas fa-arrow-up text-green-500 mr-1"></i> 12% increase this semester
                </div>
            </div>
            
            <div class="stat-card glass-card rounded-xl p-6 text-center">
                <div class="stat-icon-container">
                    <div class="stat-icon-bg"></div>
                    <i class="fas fa-clock text-3xl text-teal-600 relative z-10"></i>
                </div>
                <h3 class="text-lg font-semibold text-zinc-700 mb-2">Pending Attendance</h3>
                <p class="text-3xl font-bold text-zinc-800 pulse">{{ $pendingAttendance ?? 0 }}</p>
                <div class="mt-3 text-sm text-zinc-500">
                    <i class="fas fa-exclamation-circle text-amber-500 mr-1"></i> Due by end of day
                </div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="glass-card rounded-xl p-6">
            <h3 class="text-xl font-semibold text-zinc-700 mb-4">Recent Activity</h3>
            <div class="space-y-4">
                <div class="flex items-start space-x-3 pb-3 border-b border-zinc-200">
                    <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-user-check text-teal-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-zinc-700">Attendance marked for <span class="font-semibold">Class 10-A</span></p>
                        <p class="text-sm text-zinc-500">2 hours ago</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3 pb-3 border-b border-zinc-200">
                    <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-file-alt text-teal-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-zinc-700">New syllabus uploaded for <span class="font-semibold">Mathematics</span></p>
                        <p class="text-sm text-zinc-500">Yesterday at 3:45 PM</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-user-plus text-teal-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-zinc-700">New student <span class="font-semibold">Amit Kumar</span> added to your class</p>
                        <p class="text-sm text-zinc-500">2 days ago</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Add interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Add ripple effect to buttons
            const buttons = document.querySelectorAll('.nav-button, .feature-card');
            
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
            
            // Animate stats on scroll
            const observerOptions = {
                threshold: 0.5,
                rootMargin: '0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('.stat-card').forEach(card => {
                observer.observe(card);
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
        
        .stat-card.animate .stat-icon-bg {
            animation: pulse-bg 1s ease-out;
        }
        
        @keyframes pulse-bg {
            0% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0.8; }
            100% { transform: scale(1); opacity: 0.5; }
        }
    </style>
</body>
</html>