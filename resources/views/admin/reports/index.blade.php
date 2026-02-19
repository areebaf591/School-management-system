<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Admin Dashboard</title>
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
        
        .report-card {
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .report-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(20, 184, 166, 0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .report-card:hover::before {
            left: 100%;
        }
        
        .report-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(20, 184, 166, 0.15);
        }
        
        .report-icon {
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
        
        .report-icon::after {
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
        
        .report-card:hover .report-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 5px 15px rgba(20, 184, 166, 0.4);
        }
        
        .report-card:hover .report-icon::after {
            transform: scale(1.2);
            opacity: 0.6;
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
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
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
        
        .report-card:hover .feature-badge {
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
                    <h1 classa="text-2xl font-bold text-gradient">Admin Dashboard</h1>
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
        <!-- Reports Header -->
        <div class="page-header glass-card rounded-xl p-8 mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="header-icon w-16 h-16 rounded-full flex items-center justify-center mr-6">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gradient mb-2">Reports & Analytics</h2>
                        <p class="text-zinc-600 text-lg">Generate and view comprehensive system reports</p>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="text-center">
                        <p class="text-3xl font-bold text-teal-600">24</p>
                        <p class="text-sm text-zinc-500">Total Reports</p>
                    </div>
                    <div class="text-center">
                        <p class="text-3xl font-bold text-green-600">5</p>
                        <p class="text-sm text-zinc-500">Generated Today</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="stat-card glass-card rounded-xl p-6 text-center">
                <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-file-alt text-teal-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-zinc-700 mb-2">User Reports</h3>
                <p class="text-3xl font-bold text-zinc-800 pulse">8</p>
                <div class="mt-3 text-sm text-zinc-500">
                    <i class="fas fa-arrow-up text-green-500 mr-1"></i> 3 this week
                </div>
            </div>
            
            <div class="stat-card glass-card rounded-xl p-6 text-center">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-chart-bar text-green-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-zinc-700 mb-2">Attendance</h3>
                <p class="text-3xl font-bold text-zinc-800 pulse">12</p>
                <div class="mt-3 text-sm text-zinc-500">
                    <i class="fas fa-arrow-up text-green-500 mr-1"></i> 5 this week
                </div>
            </div>
            
            <div class="stat-card glass-card rounded-xl p-6 text-center">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-graduation-cap text-blue-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-zinc-700 mb-2">Academic</h3>
                <p class="text-3xl font-bold text-zinc-800 pulse">6</p>
                <div class="mt-3 text-sm text-zinc-500">
                    <i class="fas fa-arrow-up text-green-500 mr-1"></i> 2 this week
                </div>
            </div>
            
            <div class="stat-card glass-card rounded-xl p-6 text-center">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-dollar-sign text-purple-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-zinc-700 mb-2">Financial</h3>
                <p class="text-3xl font-bold text-zinc-800 pulse">4</p>
                <div class="mt-3 text-sm text-zinc-500">
                    <i class="fas fa-arrow-up text-green-500 mr-1"></i> 1 this week
                </div>
            </div>
        </div>

        <!-- Report Categories -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- User Reports -->
           <div class="report-card glass-card rounded-xl p-6 cursor-pointer"
     onclick="window.location='{{ route('admin.reports.users') }}'">
    <span class="feature-badge">Popular</span>

    <div class="report-icon">
        <i class="fas fa-users text-white text-2xl"></i>
    </div>

    <h3 class="text-xl font-semibold text-teal-600 mb-2">User Reports</h3>

    <p class="text-zinc-500 mb-4">
        Generate comprehensive user statistics and activity reports
    </p>

    <div class="flex items-center justify-between text-sm text-zinc-400">
        <span><i class="fas fa-clock mr-1"></i> 5 min to generate</span>
        <span><i class="fas fa-download mr-1"></i> PDF, Excel</span>
    </div>
</div>


            <!-- Attendance Reports -->
            <!-- Attendance Reports -->
<div class="report-card glass-card rounded-xl p-6 cursor-pointer"
     onclick="window.location='{{ route('admin.reports.attendance') }}'">
    <div class="report-icon">
        <i class="fas fa-calendar-check text-white text-2xl"></i>
    </div>
    <h3 class="text-xl font-semibold text-teal-600 mb-2">Attendance Reports</h3>
    <p class="text-zinc-500 mb-4">
        Track and analyze attendance patterns across all classes
    </p>
    <div class="flex items-center justify-between text-sm text-zinc-400">
        <span><i class="fas fa-clock mr-1"></i> 3 min to generate</span>
        <span><i class="fas fa-download mr-1"></i> Excel</span>
    </div>
</div>


            <!-- Academic Performance -->
            <div class="report-card glass-card rounded-xl p-6" onclick="window.location='#'">
                <span class="feature-badge">New</span>
                <div class="report-icon">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-teal-600 mb-2">Academic Performance</h3>
                <p class="text-zinc-500 mb-4">Analyze student grades and academic progress reports</p>
                <div class="flex items-center justify-between text-sm text-zinc-400">
                    <span><i class="fas fa-clock mr-1"></i> 8 min to generate</span>
                    <span><i class="fas fa-download mr-1"></i> PDF, Excel</span>
                </div>
            </div>

            <!-- Financial Reports -->
            <div class="report-card glass-card rounded-xl p-6" onclick="window.location='#'">
                <div class="report-icon">
                    <i class="fas fa-money-bill-wave text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-teal-600 mb-2">Financial Reports</h3>
                <p class="text-zinc-500 mb-4">Generate fee collection and expense reports</p>
                <div class="flex items-center justify-between text-sm text-zinc-400">
                    <span><i class="fas fa-clock mr-1"></i> 6 min to generate</span>
                    <span><i class="fas fa-download mr-1"></i> PDF, Excel</span>
                </div>
            </div>

            <!-- Class Reports -->
            <div class="report-card glass-card rounded-xl p-6" onclick="window.location='#'">
                <div class="report-icon">
                    <i class="fas fa-chalkboard text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-teal-600 mb-2">Class Reports</h3>
                <p class="text-zinc-500 mb-4">View class-wise performance and statistics</p>
                <div class="flex items-center justify-between text-sm text-zinc-400">
                    <span><i class="fas fa-clock mr-1"></i> 4 min to generate</span>
                    <span><i class="fas fa-download mr-1"></i> PDF</span>
                </div>
            </div>

            <!-- Custom Reports -->
            <div class="report-card glass-card rounded-xl p-6" onclick="window.location='#'">
                <div class="report-icon">
                    <i class="fas fa-cog text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-teal-600 mb-2">Custom Reports</h3>
                <p class="text-zinc-500 mb-4">Create custom reports with specific parameters</p>
                <div class="flex items-center justify-between text-sm text-zinc-400">
                    <span><i class="fas fa-clock mr-1"></i> Variable</span>
                    <span><i class="fas fa-download mr-1"></i> Multiple</span>
                </div>
            </div>
        </div>

        <!-- Recent Reports -->
        <div class="glass-card rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-history text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-zinc-800">Recently Generated Reports</h3>
                </div>
                <button class="px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-colors">
                    <i class="fas fa-sync-alt mr-2"></i>Refresh
                </button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-zinc-200">
                            <th class="text-left py-3 px-4 text-sm font-medium text-zinc-700">Report Name</th>
                            <th class="text-left py-3 px-4 text-sm font-medium text-zinc-700">Type</th>
                            <th class="text-left py-3 px-4 text-sm font-medium text-zinc-700">Generated By</th>
                            <th class="text-left py-3 px-4 text-sm font-medium text-zinc-700">Date</th>
                            <th class="text-left py-3 px-4 text-sm font-medium text-zinc-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-zinc-100 hover:bg-zinc-50 transition-colors">
                            <td class="py-3 px-4">
                                <div class="flex items-center">
                                    <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                                    <span class="font-medium">Monthly User Activity</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 bg-teal-100 text-teal-800 text-xs rounded-full">User Report</span>
                            </td>
                            <td class="py-3 px-4">Admin</td>
                            <td class="py-3 px-4 text-sm text-zinc-600">Today, 10:30 AM</td>
                            <td class="py-3 px-4">
                                <button class="text-teal-600 hover:text-teal-800 mr-3">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="border-b border-zinc-100 hover:bg-zinc-50 transition-colors">
                            <td class="py-3 px-4">
                                <div class="flex items-center">
                                    <i class="fas fa-file-excel text-green-500 mr-2"></i>
                                    <span class="font-medium">Q1 Attendance Summary</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Attendance</span>
                            </td>
                            <td class="py-3 px-4">John Doe</td>
                            <td class="py-3 px-4 text-sm text-zinc-600">Yesterday, 3:45 PM</td>
                            <td class="py-3 px-4">
                                <button class="text-teal-600 hover:text-teal-800 mr-3">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="border-b border-zinc-100 hover:bg-zinc-50 transition-colors">
                            <td class="py-3 px-4">
                                <div class="flex items-center">
                                    <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                                    <span class="font-medium">Class 10A Performance</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Academic</span>
                            </td>
                            <td class="py-3 px-4">Admin</td>
                            <td class="py-3 px-4 text-sm text-zinc-600">2 days ago</td>
                            <td class="py-3 px-4">
                                <button class="text-teal-600 hover:text-teal-800 mr-3">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        // Add interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Add ripple effect to buttons
            const buttons = document.querySelectorAll('.nav-button, .report-card');
            
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