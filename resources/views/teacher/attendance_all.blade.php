<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Attendance Records</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #168d7f; /* Teal color */
            --secondary-color: #1ec7ae; /* Light teal */
            --accent-color: #9dfcd0; /* Very light teal */
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
            animation-duration: 80s; /* Even slower animation */
        }
        
        .graduation-cap {
            top: 20%;
            left: -10%;
            animation: float-right 120s infinite linear; /* Much slower */
        }
        
        .pen {
            top: 60%;
            right: -10%;
            animation: float-left 100s infinite linear; /* Much slower */
        }
        
        .book {
            bottom: 10%;
            left: 10%;
            animation: float-up 120s infinite linear; /* Much slower */
        }
        
        .pencil {
            top: 40%;
            left: 5%;
            animation: float-diagonal 140s infinite linear; /* Much slower */
        }
        
        .calculator {
            top: 10%;
            right: 15%;
            animation: float-diagonal-reverse 130s infinite linear; /* Much slower */
        }
        
        .ruler {
            bottom: 20%;
            right: 5%;
            animation: float-right-reverse 110s infinite linear; /* Much slower */
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
        
        .table-row:hover {
            background-color: rgba(20, 184, 166, 0.05);
        }
        
        .table-container {
            overflow-x: auto;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }
        
        .table-header {
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.1), rgba(94, 234, 212, 0.05));
        }
        
        .dashboard-logo {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .dashboard-logo:hover {
            transform: scale(1.05);
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .status-present {
            background-color: rgba(34, 197, 94, 0.1);
            color: #16a34a;
        }
        
        .status-absent {
            background-color: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }
        
        .student-avatar {
            transition: all 0.3s ease;
        }
        
        .table-row:hover .student-avatar {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(20, 184, 166, 0.2);
        }
        
        .filter-section {
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.05), rgba(94, 234, 212, 0.02));
            border-left: 3px solid var(--primary-color);
        }
        
        .filter-input {
            border: 1px solid var(--zinc-300);
            border-radius: 0.5rem;
            padding: 0.5rem 0.75rem;
            transition: all 0.2s ease;
            background-color: white;
        }
        
        .filter-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
        }
        
        .filter-select {
            border: 1px solid var(--zinc-300);
            border-radius: 0.5rem;
            padding: 0.5rem 0.75rem;
            transition: all 0.2s ease;
            background-color: white;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }
        
        .filter-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s ease;
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(20, 184, 166, 0.3);
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 1.5rem;
        }
        
        .pagination-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            margin: 0 0.25rem;
            border-radius: 0.375rem;
            background-color: white;
            color: var(--zinc-700);
            border: 1px solid var(--zinc-300);
            transition: all 0.2s ease;
        }
        
        .pagination-link:hover {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .pagination-link.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .stats-card {
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.05), rgba(94, 234, 212, 0.02));
            border-left: 3px solid var(--primary-color);
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
                    <div class="dashboard-logo w-10 h-10 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg flex items-center justify-center shadow-lg" onclick="window.location='{{ route('teacher.dashboard') }}'">
                        <i class="fas fa-graduation-cap text-white"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gradient">All Attendance Records</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button class="nav-button px-4 py-2 rounded-lg text-white flex items-center space-x-2">
                        <i class="fas fa-user-circle"></i>
                        <span>Profile</span>
                    </button>
                    <button class="nav-button px-4 py-2 rounded-lg text-white flex items-center space-x-2">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="glass-card stats-card rounded-xl p-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-users text-teal-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500">Total Students</p>
                        <p class="text-xl font-bold text-zinc-800">{{ $totalStudents ?? 0 }}</p>
                    </div>
                </div>
            </div>
            
            <div class="glass-card stats-card rounded-xl p-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-check-circle text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500">Present Today</p>
                        <p class="text-xl font-bold text-zinc-800">{{ $presentToday ?? 0 }}</p>
                    </div>
                </div>
            </div>
            
            <div class="glass-card stats-card rounded-xl p-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-times-circle text-red-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500">Absent Today</p>
                        <p class="text-xl font-bold text-zinc-800">{{ $absentToday ?? 0 }}</p>
                    </div>
                </div>
            </div>
            
            <div class="glass-card stats-card rounded-xl p-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-percentage text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500">Attendance Rate</p>
                        <p class="text-xl font-bold text-zinc-800">{{ $attendanceRate ?? 0 }}%</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="glass-card filter-section rounded-xl p-4 mb-6">
            <div class="flex flex-wrap items-center gap-4">
                <div class="flex-1 min-w-[200px]">
                    <input type="text" placeholder="Search by student name..." class="filter-input w-full" id="searchInput">
                </div>
                <div class="min-w-[150px]">
                    <select class="filter-select w-full" id="classFilter">
                        <option value="">All Classes</option>
                        @if(isset($classrooms))
                            @foreach($classrooms as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        @else
                            <option value="1">Class 10-A</option>
                            <option value="2">Class 10-B</option>
                            <option value="3">Class 9-A</option>
                            <option value="4">Class 9-B</option>
                        @endif
                    </select>
                </div>
                <div class="min-w-[150px]">
                    <select class="filter-select w-full" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="1">Present</option>
                        <option value="0">Absent</option>
                    </select>
                </div>
                <div class="min-w-[150px]">
                    <input type="date" class="filter-input w-full" id="dateFilter">
                </div>
                <button class="btn-primary" id="filterBtn">
                    <i class="fas fa-filter mr-2"></i>Apply Filters
                </button>
                <button class="btn-primary" id="exportBtn">
                    <i class="fas fa-download mr-2"></i>Export
                </button>
            </div>
        </div>

        <!-- Attendance Table -->
        <div class="glass-card rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-list-alt text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-zinc-800">Attendance Records</h3>
                </div>
                <div class="text-sm text-zinc-500">
                    Showing {{ $attendances->count() }} of {{ $totalRecords ?? 0 }} records
                </div>
            </div>
            
            <div class="table-container">
                <table class="w-full">
                    <thead>
                        <tr class="table-header">
                            <th class="px-4 py-3 text-left text-xs font-medium text-zinc-700 uppercase tracking-wider">#</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-zinc-700 uppercase tracking-wider">Student Name</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-zinc-700 uppercase tracking-wider">Class</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-zinc-700 uppercase tracking-wider">Date</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-zinc-700 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-zinc-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-zinc-200">
                        @if(isset($attendances) && count($attendances) > 0)
                            @foreach($attendances as $attendance)
                                <tr class="table-row">
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="student-avatar h-10 w-10 rounded-full bg-teal-100 flex items-center justify-center">
                                                    <span class="text-teal-600 font-medium">{{ substr($attendance->student->name, 0, 1) }}</span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-zinc-900">{{ $attendance->student->name }}</div>
                                                <div class="text-sm text-zinc-500">{{ $attendance->student->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">{{ $attendance->student->classroom->name ?? '-' }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">{{ $attendance->date }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-center">
                                        <span class="status-badge {{ $attendance->present ? 'status-present' : 'status-absent' }}">
                                            {{ $attendance->present ? 'Present' : 'Absent' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-center text-sm font-medium">
                                        <button class="text-teal-600 hover:text-teal-900 mr-3" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-zinc-500">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-inbox text-4xl text-zinc-300 mb-3"></i>
                                        <p>No attendance records found</p>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <a href="#" class="pagination-link">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="pagination-link active">1</a>
                <a href="#" class="pagination-link">2</a>
                <a href="#" class="pagination-link">3</a>
                <a href="#" class="pagination-link">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </main>

    <script>
        // Add interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Add ripple effect to buttons
            const buttons = document.querySelectorAll('.btn-primary');
            
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
            
            // Animate table rows on scroll
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
            
            document.querySelectorAll('.table-row').forEach((row, index) => {
                row.style.opacity = '0';
                row.style.transform = 'translateY(20px)';
                row.style.transition = `opacity 0.3s ease ${index * 0.05}s, transform 0.3s ease ${index * 0.05}s`;
                observer.observe(row);
            });
            
            // Filter functionality
            document.getElementById('filterBtn').addEventListener('click', function() {
                // In a real application, this would filter the table based on the input values
                const searchValue = document.getElementById('searchInput').value;
                const classValue = document.getElementById('classFilter').value;
                const statusValue = document.getElementById('statusFilter').value;
                const dateValue = document.getElementById('dateFilter').value;
                
                // For demonstration purposes, we'll just show an alert
                console.log('Filtering with:', { searchValue, classValue, statusValue, dateValue });
                
                // In a real app, you would make an AJAX request to filter the data
                // and update the table with the filtered results
            });
            
            // Export functionality
            document.getElementById('exportBtn').addEventListener('click', function() {
                // In a real application, this would export the table data
                console.log('Exporting attendance data');
                
                // For demonstration purposes, we'll just show an alert
                // In a real app, you would make an AJAX request to export the data
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