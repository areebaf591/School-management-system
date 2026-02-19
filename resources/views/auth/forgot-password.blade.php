<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,#eef2ff,#fdf2f8);
        }

        .card{
            width: 380px;
            padding: 30px;
            border-radius: 20px;
            background: white;
            box-shadow: 0 25px 45px rgba(0,0,0,.12);
            animation: fade .6s ease;
        }

        @keyframes fade{
            from{opacity:0;transform:translateY(20px)}
            to{opacity:1;transform:translateY(0)}
        }

        .form-input{
            width:100%;
            height:44px;
            border-radius:12px;
            border:1px solid #e5e7eb;
            padding:0 14px;
            font-size:14px;
            background:#f9fafb;
            transition:.3s;
        }

        .form-input:focus{
            outline:none;
            border-color:#6366f1;
            background:white;
            box-shadow:0 0 0 4px rgba(99,102,241,.15);
        }

        .btn{
            height:44px;
            border-radius:12px;
            background:linear-gradient(135deg,#6366f1,#8b5cf6);
            color:white;
            font-weight:600;
            letter-spacing:.3px;
            transition:.3s;
        }

        .btn:hover{
            transform:translateY(-2px);
            box-shadow:0 8px 18px rgba(99,102,241,.35);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">

    <!-- CARD -->
    <div class="card">

        <h2 class="text-3xl font-bold text-center text-indigo-600 mb-2">
            Forgot Password 🔐
        </h2>

        <p class="text-center text-sm text-gray-500 mb-6">
            Enter your email and we’ll send you a reset link
        </p>

        <!-- Status Message -->
        <x-auth-session-status class="mb-4 text-sm text-green-600" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <div class="mb-5">
                <label class="text-sm text-gray-600">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="form-input mt-1" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="text-sm mt-1"/>
            </div>

            <button class="btn w-full">
                Send Reset Link
            </button>
        </form>

        <!-- Back to Login -->
        <p class="text-center text-sm text-gray-500 mt-6">
            Remember your password?
            <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:underline">
                Back to Login
            </a>
        </p>

    </div>

</body>
</html>
