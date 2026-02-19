@extends('layouts.admin')

@section('content')
<!-- Main Content -->
<main class="container mx-auto px-6 py-8">
    <!-- Students Report Header -->
    <div class="page-header glass-card rounded-xl p-8 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="header-icon w-16 h-16 rounded-full flex items-center justify-center mr-6">
                    <i class="fas fa-user-graduate text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gradient mb-2">Users Report</h2>
                    <p class="text-zinc-600 text-lg">View and export all user information</p>
                </div>
            </div>
            <div class="flex space-x-4">
                <div class="text-center">
                    <p class="text-3xl font-bold text-teal-600">{{ $users->count() }}</p>
                    <p class="text-sm text-zinc-500">Total Students</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and Actions -->
    <div class="glass-card rounded-xl p-6 mb-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                <div class="relative">
                    <input type="text" placeholder="Search students..." class="pl-10 pr-4 py-2 border border-zinc-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent w-full md:w-64">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-search text-zinc-400"></i>
                    </div>
                </div>
                <select class="px-4 py-2 border border-zinc-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                    <option>All Classes</option>
                    <option>Class 10A</option>
                    <option>Class 10B</option>
                    <option>Class 9A</option>
                    <option>Class 9B</option>
                </select>
            </div>
            <div class="flex gap-3">
                <button class="px-4 py-2 bg-zinc-200 text-zinc-800 rounded-lg hover:bg-zinc-300 transition-colors flex items-center">
                    <i class="fas fa-filter mr-2"></i>Filter
                </button>
                <a href="{{ route('admin.reports.users.export') }}" class="submit-button px-4 py-2 text-white rounded-lg flex items-center shadow-md">
                    <i class="fas fa-file-excel mr-2"></i>Export  (Excel)
                </a>
            </div>
        </div>
    </div>

    <!-- Students Table -->
    <div class="glass-card rounded-xl p-6 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Class</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-zinc-200">
                    @foreach($users as $user)
                    <tr class="hover:bg-zinc-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-zinc-900">{{ $user->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-teal-100 flex items-center justify-center">
                                        <span class="text-teal-600 font-medium">{{ substr($user->name, 0, 1) }}</span>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-zinc-900">{{ $user->name }}</div>
                                    <div class="text-sm text-zinc-500">ID: {{ $user->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-zinc-900">{{ $user->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                Class 10A
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-teal-600 hover:text-teal-900 mr-3">View</a>
                            <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="mt-6 flex items-center justify-between">
            <div class="text-sm text-zinc-700">
                Showing <span class="font-medium">1</span> to <span class="font-medium">{{ $users->count() }}</span> of <span class="font-medium">{{ $users->count() }}</span> results
            </div>
            <div class="flex gap-2">
                <button class="px-3 py-1 border border-zinc-300 rounded-md text-sm hover:bg-zinc-50 transition-colors">Previous</button>
                <button class="px-3 py-1 bg-teal-600 text-white rounded-md text-sm">1</button>
                <button class="px-3 py-1 border border-zinc-300 rounded-md text-sm hover:bg-zinc-50 transition-colors">2</button>
                <button class="px-3 py-1 border border-zinc-300 rounded-md text-sm hover:bg-zinc-50 transition-colors">3</button>
                <button class="px-3 py-1 border border-zinc-300 rounded-md text-sm hover:bg-zinc-50 transition-colors">Next</button>
            </div>
        </div>
    </div>
</main>

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
    
    .text-gradient {
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .page-header {
        background: linear-gradient(135deg, rgba(20, 184, 166, 0.1), rgba(94, 234, 212, 0.05));
        border-left: 4px solid var(--primary-color);
    }
    
    .header-icon {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        box-shadow: 0 4px 15px rgba(20, 184, 166, 0.3);
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
</style>
@endsection