<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #14b8a6; /* Teal color */
            --secondary-color: #5eead4; /* Light teal */
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
        
        .stats-card {
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.05), rgba(94, 234, 212, 0.02));
            border-left: 3px solid var(--primary-color);
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(20, 184, 166, 0.1);
        }
        
        .course-item {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .course-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(20, 184, 166, 0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .course-item:hover::before {
            left: 100%;
        }
        
        .course-item:hover {
            background-color: rgba(20, 184, 166, 0.05);
            transform: translateX(5px);
        }
        
        .progress-bar {
            height: 8px;
            background-color: var(--zinc-200);
            border-radius: 4px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border-radius: 4px;
        }
        
        .attendance-day {
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 0.75rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        
        .attendance-day.present {
            background-color: rgba(34, 197, 94, 0.1);
            color: #16a34a;
        }
        
        .attendance-day.absent {
            background-color: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }
        
        .attendance-day.weekend {
            background-color: rgba(161, 161, 170, 0.1);
            color: var(--zinc-500);
        }
        
        .attendance-day:hover {
            transform: scale(1.1);
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
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
                    <div class="dashboard-logo w-10 h-10 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg flex items-center justify-center shadow-lg">
                        <i class="fas fa-graduation-cap text-white"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gradient">Student Dashboard</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button class="nav-button px-4 py-2 rounded-lg text-white flex items-center space-x-2">
                        <i class="fas fa-user-circle"></i>
                        <span>Profile</span>
                    </button>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
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
        <!-- Welcome Section -->
        <div class="glass-card rounded-xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-bold text-gradient mb-2">Welcome, {{ Auth::user()->name }} 👨‍🎓</h2>
                    <p class="text-zinc-600">View your courses, attendance, results & more</p>
                </div>
                <div class="w-20 h-20 bg-gradient-to-r from-teal-500 to-teal-600 rounded-full flex items-center justify-center shadow-lg pulse">
                    <i class="fas fa-user-graduate text-white text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="stats-card glass-card rounded-xl p-5">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-calendar-check text-teal-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500">Attendance</p>
                        <p class="text-2xl font-bold text-zinc-800">95%</p>
                    </div>
                </div>
            </div>
            
            <div class="stats-card glass-card rounded-xl p-5">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-book-open text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500">Courses</p>
                        <p class="text-2xl font-bold text-zinc-800">6 Subjects</p>
                    </div>
                </div>
            </div>
            
            <div class="stats-card glass-card rounded-xl p-5">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-tasks text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500">Assignments</p>
                        <p class="text-2xl font-bold text-zinc-800">3 Pending</p>
                    </div>
                </div>
            </div>
            
            <div class="stats-card glass-card rounded-xl p-5">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-trophy text-pink-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500">Class Rank</p>
                        <p class="text-2xl font-bold text-zinc-800">#5</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Courses Section -->
            <div class="lg:col-span-2 glass-card rounded-xl p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-book text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-zinc-800">My Courses</h3>
                </div>
                
                <div class="space-y-3">
                    <div class="course-item flex justify-between items-center bg-gray-50 p-3 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                                <span class="text-indigo-600 font-bold text-sm">M</span>
                            </div>
                            <span class="font-medium">Mathematics</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-20 mr-2">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 92%"></div>
                                </div>
                            </div>
                            <span class="text-indigo-600 font-semibold">92%</span>
                        </div>
                    </div>
                    
                    <div class="course-item flex justify-between items-center bg-gray-50 p-3 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                <span class="text-green-600 font-bold text-sm">S</span>
                            </div>
                            <span class="font-medium">Science</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-20 mr-2">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 88%"></div>
                                </div>
                            </div>
                            <span class="text-indigo-600 font-semibold">88%</span>
                        </div>
                    </div>
                    
                    <div class="course-item flex justify-between items-center bg-gray-50 p-3 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <span class="text-blue-600 font-bold text-sm">E</span>
                            </div>
                            <span class="font-medium">English</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-20 mr-2">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 90%"></div>
                                </div>
                            </div>
                            <span class="text-indigo-600 font-semibold">90%</span>
                        </div>
                    </div>
                    
                    <div class="course-item flex justify-between items-center bg-gray-50 p-3 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                                <span class="text-yellow-600 font-bold text-sm">U</span>
                            </div>
                            <span class="font-medium">Urdu</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-20 mr-2">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 86%"></div>
                                </div>
                            </div>
                            <span class="text-indigo-600 font-semibold">86%</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Attendance Section -->
            <div class="glass-card rounded-xl p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-calendar-alt text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-zinc-800">Attendance</h3>
                </div>
                
                <div class="space-y-4">
                    <div class="flex justify-between text-sm">
                        <p class="text-zinc-600">Present Days</p>
                        <p class="font-semibold text-green-600">24</p>
                    </div>
                    <div class="flex justify-between text-sm">
                        <p class="text-zinc-600">Absent Days</p>
                        <p class="font-semibold text-red-600">2</p>
                    </div>
                    <div class="flex justify-between text-sm">
                        <p class="text-zinc-600">Total Days</p>
                        <p class="font-semibold">26</p>
                    </div>
                    
                    <div class="mt-4">
                        <div class="flex justify-between items-center mb-2">
                            <p class="text-sm text-zinc-600">Attendance Rate</p>
                            <p class="text-sm font-semibold">95%</p>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 95%"></div>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <p class="text-sm text-zinc-600 mb-3">This Week</p>
                        <div class="grid grid-cols-7 gap-2">
                            <div class="attendance-day present">M</div>
                            <div class="attendance-day present">T</div>
                            <div class="attendance-day absent">W</div>
                            <div class="attendance-day present">T</div>
                            <div class="attendance-day present">F</div>
                            <div class="attendance-day weekend">S</div>
                            <div class="attendance-day weekend">S</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Activities Section -->
        <div class="glass-card rounded-xl p-6 mt-6">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-history text-white"></i>
                </div>
                <h3 class="text-xl font-semibold text-zinc-800">Recent Activities</h3>
            </div>
            
            <div class="space-y-4">
                <div class="flex items-start space-x-3 pb-3 border-b border-zinc-200">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-check text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-zinc-700">Submitted Mathematics Assignment</p>
                        <p class="text-sm text-zinc-500">2 hours ago</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3 pb-3 border-b border-zinc-200">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-book-open text-blue-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-zinc-700">Viewed Science Chapter 5</p>
                        <p class="text-sm text-zinc-500">Yesterday at 3:45 PM</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-clipboard-check text-purple-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-zinc-700">Completed English Quiz</p>
                        <p class="text-sm text-zinc-500">2 days ago</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Add interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Animate elements on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('.stats-card, .glass-card').forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = `opacity 0.3s ease ${index * 0.1}s, transform 0.3s ease ${index * 0.1}s`;
                observer.observe(card);
            });
        });
    </script>
</body>
</html>