<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syllabus Management</title>
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
        
        .btn-secondary {
            background: white;
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--primary-color);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .btn-secondary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(20, 184, 166, 0.1);
            transition: left 0.5s ease;
        }
        
        .btn-secondary:hover::before {
            left: 100%;
        }
        
        .btn-secondary:hover {
            background: rgba(20, 184, 166, 0.05);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(20, 184, 166, 0.2);
        }
        
        .btn-danger {
            background: white;
            color: #dc2626;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #dc2626;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .btn-danger::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(220, 38, 38, 0.1);
            transition: left 0.5s ease;
        }
        
        .btn-danger:hover::before {
            left: 100%;
        }
        
        .btn-danger:hover {
            background: rgba(220, 38, 38, 0.05);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 38, 38, 0.2);
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
        
        .modal {
            display: none;
            position: fixed;
            z-index: 50;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.3s ease;
        }
        
        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 0.75rem;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
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
        
        .syllabus-card {
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.05), rgba(94, 234, 212, 0.02));
            border-left: 3px solid var(--primary-color);
            transition: all 0.3s ease;
        }
        
        .syllabus-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(20, 184, 166, 0.1);
        }
        
        .subject-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            font-weight: bold;
            margin-right: 1rem;
        }
        
        .tab-button {
            padding: 0.5rem 1rem;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .tab-button.active {
            border-bottom-color: var(--primary-color);
            color: var(--primary-color);
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease;
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
                    <h1 class="text-2xl font-bold text-gradient">Syllabus Management</h1>
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
        <!-- Filter Section -->
        <div class="glass-card filter-section rounded-xl p-4 mb-6">
            <div class="flex flex-wrap items-center gap-4">
                <div class="flex-1 min-w-[200px]">
                    <input type="text" placeholder="Search by class or subject..." class="filter-input w-full" id="searchInput">
                </div>
                <div class="min-w-[150px]">
                    <select class="filter-select w-full" id="classFilter">
                        <option value="">All Classes</option>
                        <option value="1">Class 1-A</option>
                        <option value="2">Class 1-B</option>
                        <option value="3">Class 2-A</option>
                        <option value="4">Class 2-B</option>
                        <option value="5">Class 3-A</option>
                        <option value="6">Class 3-B</option>
                    </select>
                </div>
                <div class="min-w-[150px]">
                    <select class="filter-select w-full" id="subjectFilter">
                        <option value="">All Subjects</option>
                        <option value="math">Mathematics</option>
                        <option value="science">Science</option>
                        <option value="english">English</option>
                        <option value="history">History</option>
                        <option value="geography">Geography</option>
                    </select>
                </div>
                <button class="btn-primary" id="filterBtn">
                    <i class="fas fa-filter mr-2"></i>Apply Filters
                </button>
                <button class="btn-primary" id="addSyllabusBtn">
                    <i class="fas fa-plus-circle mr-2"></i>Add New Syllabus
                </button>
            </div>
        </div>

        <!-- Tabs -->
        <div class="glass-card rounded-xl p-6 mb-6">
            <div class="flex border-b border-zinc-200 mb-6">
                <button class="tab-button active" data-tab="list">List View</button>
                <button class="tab-button" data-tab="card">Card View</button>
                <button class="tab-button" data-tab="progress">Progress</button>
            </div>
            
            <!-- List View Tab -->
            <div id="list-tab" class="tab-content active">
                <div class="table-container">
                    <table class="w-full">
                        <thead>
                            <tr class="table-header">
                                <th class="px-4 py-3 text-left text-xs font-medium text-zinc-700 uppercase tracking-wider">#</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-zinc-700 uppercase tracking-wider">Class</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-zinc-700 uppercase tracking-wider">Subject</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-zinc-700 uppercase tracking-wider">Chapters</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-zinc-700 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-zinc-700 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-zinc-200">
                            <tr class="table-row">
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">1</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">1-A</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">Mathematics</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">12</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-center text-sm font-medium">
                                    <button class="text-teal-600 hover:text-teal-900 mr-3" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-teal-600 hover:text-teal-900 mr-3" title="Edit" onclick="openEditModal()">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">2</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">2-B</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">Science</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">10</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-center text-sm font-medium">
                                    <button class="text-teal-600 hover:text-teal-900 mr-3" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-teal-600 hover:text-teal-900 mr-3" title="Edit" onclick="openEditModal()">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">3</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">3-A</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">English</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-900">8</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        In Progress
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-center text-sm font-medium">
                                    <button class="text-teal-600 hover:text-teal-900 mr-3" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-teal-600 hover:text-teal-900 mr-3" title="Edit" onclick="openEditModal()">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Card View Tab -->
            <div id="card-tab" class="tab-content">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="syllabus-card rounded-xl p-4">
                        <div class="flex items-start">
                            <div class="subject-icon">M</div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-zinc-800">Mathematics</h3>
                                <p class="text-sm text-zinc-500 mb-2">Class 1-A</p>
                                <p class="text-sm text-zinc-600 mb-3">12 Chapters • 48 Lessons</p>
                                <div class="flex justify-between items-center">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                    <div class="flex space-x-2">
                                        <button class="text-teal-600 hover:text-teal-900" title="View">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-teal-600 hover:text-teal-900" title="Edit" onclick="openEditModal()">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="syllabus-card rounded-xl p-4">
                        <div class="flex items-start">
                            <div class="subject-icon">S</div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-zinc-800">Science</h3>
                                <p class="text-sm text-zinc-500 mb-2">Class 2-B</p>
                                <p class="text-sm text-zinc-600 mb-3">10 Chapters • 40 Lessons</p>
                                <div class="flex justify-between items-center">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                    <div class="flex space-x-2">
                                        <button class="text-teal-600 hover:text-teal-900" title="View">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-teal-600 hover:text-teal-900" title="Edit" onclick="openEditModal()">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="syllabus-card rounded-xl p-4">
                        <div class="flex items-start">
                            <div class="subject-icon">E</div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-zinc-800">English</h3>
                                <p class="text-sm text-zinc-500 mb-2">Class 3-A</p>
                                <p class="text-sm text-zinc-600 mb-3">8 Chapters • 32 Lessons</p>
                                <div class="flex justify-between items-center">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        In Progress
                                    </span>
                                    <div class="flex space-x-2">
                                        <button class="text-teal-600 hover:text-teal-900" title="View">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-teal-600 hover:text-teal-900" title="Edit" onclick="openEditModal()">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Progress Tab -->
            <div id="progress-tab" class="tab-content">
                <div class="space-y-4">
                    <div class="glass-card rounded-xl p-4">
                        <div class="flex items-center mb-3">
                            <div class="subject-icon">M</div>
                            <div class="flex-1 ml-4">
                                <div class="flex justify-between items-center mb-1">
                                    <h3 class="text-lg font-semibold text-zinc-800">Mathematics - Class 1-A</h3>
                                    <span class="text-sm text-zinc-600">75% Complete</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 75%"></div>
                                </div>
                                <p class="text-sm text-zinc-500 mt-2">9 of 12 chapters completed</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="glass-card rounded-xl p-4">
                        <div class="flex items-center mb-3">
                            <div class="subject-icon">S</div>
                            <div class="flex-1 ml-4">
                                <div class="flex justify-between items-center mb-1">
                                    <h3 class="text-lg font-semibold text-zinc-800">Science - Class 2-B</h3>
                                    <span class="text-sm text-zinc-600">60% Complete</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 60%"></div>
                                </div>
                                <p class="text-sm text-zinc-500 mt-2">6 of 10 chapters completed</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="glass-card rounded-xl p-4">
                        <div class="flex items-center mb-3">
                            <div class="subject-icon">E</div>
                            <div class="flex-1 ml-4">
                                <div class="flex justify-between items-center mb-1">
                                    <h3 class="text-lg font-semibold text-zinc-800">English - Class 3-A</h3>
                                    <span class="text-sm text-zinc-600">40% Complete</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 40%"></div>
                                </div>
                                <p class="text-sm text-zinc-500 mt-2">3 of 8 chapters completed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Add/Edit Syllabus Modal -->
    <div id="syllabusModal" class="modal">
        <div class="modal-content">
            <div class="bg-teal-600 text-white px-6 py-4 rounded-t-xl flex justify-between items-center">
                <h3 class="text-xl font-semibold" id="modalTitle">Add New Syllabus</h3>
                <button onclick="closeModal()" class="text-white hover:text-gray-200">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div class="p-6">
                <form id="syllabusForm">
                    <div class="mb-4">
                        <label for="class" class="block text-sm font-medium text-zinc-700 mb-1">Class</label>
                        <select id="class" name="class" class="filter-select w-full" required>
                            <option value="">Select Class</option>
                            <option value="1-A">1-A</option>
                            <option value="1-B">1-B</option>
                            <option value="2-A">2-A</option>
                            <option value="2-B">2-B</option>
                            <option value="3-A">3-A</option>
                            <option value="3-B">3-B</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium text-zinc-700 mb-1">Subject</label>
                        <select id="subject" name="subject" class="filter-select w-full" required>
                            <option value="">Select Subject</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Science">Science</option>
                            <option value="English">English</option>
                            <option value="History">History</option>
                            <option value="Geography">Geography</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="chapters" class="block text-sm font-medium text-zinc-700 mb-1">Number of Chapters</label>
                        <input type="number" id="chapters" name="chapters" min="1" class="filter-input w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-zinc-700 mb-1">Description</label>
                        <textarea id="description" name="description" rows="3" class="filter-input w-full"></textarea>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeModal()" class="btn-secondary">Cancel</button>
                        <button type="submit" class="btn-primary">Save Syllabus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Add active class to clicked button and corresponding content
                    this.classList.add('active');
                    document.getElementById(`${tabId}-tab`).classList.add('active');
                });
            });
            
            // Modal functionality
            const modal = document.getElementById('syllabusModal');
            const addBtn = document.getElementById('addSyllabusBtn');
            const closeBtn = document.querySelector('.modal button[onclick="closeModal()"]');
            
            addBtn.addEventListener('click', function() {
                document.getElementById('modalTitle').textContent = 'Add New Syllabus';
                document.getElementById('syllabusForm').reset();
                modal.classList.add('active');
            });
            
            // Form submission
            document.getElementById('syllabusForm').addEventListener('submit', function(e) {
                e.preventDefault();
                // In a real application, this would submit the form data
                console.log('Form submitted');
                closeModal();
            });
            
            // Filter functionality
            document.getElementById('filterBtn').addEventListener('click', function() {
                const searchValue = document.getElementById('searchInput').value;
                const classValue = document.getElementById('classFilter').value;
                const subjectValue = document.getElementById('subjectFilter').value;
                
                // In a real application, this would filter the data
                console.log('Filtering with:', { searchValue, classValue, subjectValue });
            });
        });
        
        function openEditModal() {
            document.getElementById('modalTitle').textContent = 'Edit Syllabus';
            // In a real application, this would populate the form with existing data
            document.getElementById('syllabusModal').classList.add('active');
        }
        
        function closeModal() {
            document.getElementById('syllabusModal').classList.remove('active');
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('syllabusModal');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>