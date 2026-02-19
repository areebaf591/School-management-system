<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <div class="w-64 bg-white shadow h-screen p-4">
        <h1 class="text-2xl font-bold mb-6 text-purple-700">School Admin</h1>
        <ul>
            <li class="mb-2">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-purple-100 rounded">
                    Dashboard
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 hover:bg-purple-100 rounded">
                    Users
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('admin.permissions.index') }}" class="block px-4 py-2 hover:bg-purple-100 rounded">
                    Permissions
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('admin.roles.permissions') }}" class="block px-4 py-2 hover:bg-purple-100 rounded">
                    Roles & Permissions
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('admin.reports.index') }}" class="block px-4 py-2 hover:bg-purple-100 rounded">
                    Reports
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        @yield('content')
    </div>
</body>
</html>
