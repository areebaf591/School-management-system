<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EduPortal</title>

    @vite(['resources/css/app.css', 'resources/js/app.css'])

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #0a5a5a;
            --secondary-color: #3b8882;
            --accent-color: #13a8be;
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
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            color: var(--zinc-900);
            overflow-x: hidden;
            height: 100vh;
        }
        
        .split-container {
            display: flex;
            height: 100vh;
            width: 100%;
            position: relative;
        }
        
        .left-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, rgba(3, 172, 149, 0.95), rgba(9, 139, 129, 0.9));
            position: relative;
            overflow: hidden;
            padding: 3rem;
        }
        
        .right-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(10px);
            position: relative;
            padding: 3rem;
        }
        
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        
        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation-duration: 60s;
            z-index: -1;
            filter: drop-shadow(0 0 10px rgba(8, 145, 178, 0.3));
        }
        
        .graduation-cap {
            top: 15%;
            left: 5%;
            animation: float 25s infinite ease-in-out;
        }
        
        .pen {
            top: 65%;
            right: 10%;
            animation: float 30s infinite ease-in-out reverse;
        }
        
        .book {
            bottom: 15%;
            left: 15%;
            animation: float 35s infinite ease-in-out;
        }
        
        .pencil {
            top: 35%;
            left: 8%;
            animation: float 40s infinite ease-in-out reverse;
        }
        
        .calculator {
            top: 10%;
            right: 20%;
            animation: float 45s infinite ease-in-out;
        }
        
        .ruler {
            bottom: 25%;
            right: 15%;
            animation: float 50s infinite ease-in-out reverse;
        }
        
        .backpack {
            top: 75%;
            left: 25%;
            animation: float 55s infinite ease-in-out;
        }
        
        .apple {
            top: 45%;
            right: 30%;
            animation: float 60s infinite ease-in-out reverse;
        }
        
        .school-bus {
            bottom: 35%;
            left: 35%;
            animation: float 65s infinite ease-in-out;
        }
        
        .degree {
            top: 25%;
            right: 5%;
            animation: float 70s infinite ease-in-out reverse;
        }
        
        .glasses {
            bottom: 10%;
            right: 25%;
            animation: float 75s infinite ease-in-out;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-20px) rotate(5deg); }
            75% { transform: translateY(20px) rotate(-5deg); }
        }
        
        .login-card {
            width: 380px;
            padding: 2rem;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            animation: slideInRight 0.8s ease;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        @keyframes slideInRight {
            from { opacity:0; transform:translateX(30px); }
            to { opacity:1; transform:translateX(0); }
        }

        .form-group {
            margin-bottom: 1.2rem;
            position: relative;
        }

        .form-input {
            width:100%;
            height:48px;
            border:2px solid var(--zinc-200);
            border-radius: 12px;
            padding:0 16px;
            font-size:15px;
            background:var(--zinc-50);
            transition:all 0.3s ease;
        }

        .form-input:focus {
            outline:none;
            border-color:var(--primary-color);
            background:white;
            box-shadow:0 0 0 4px rgba(8, 145, 178, 0.1);
        }
        
        .login-btn {
            height:48px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color:white;
            font-weight:600;
            font-size: 16px;
            letter-spacing:0.5px;
            transition:all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-top: 0.5rem;
        }
        
        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }
        
        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:hover {
            transform:translateY(-2px);
            box-shadow:0 10px 25px rgba(8, 145, 178, 0.3);
        }

        .login-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .login-btn.loading {
            color: transparent;
        }

        .login-btn.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spinner 0.8s linear infinite;
        }

        @keyframes spinner {
            to { transform: rotate(360deg); }
        }
        
        label {
            font-weight:600;
            color: var(--zinc-700);
            display: block;
            margin-bottom: 0.5rem;
            font-size: 14px;
        }
        
        .logo-container {
            position: relative;
            margin-bottom: 2.5rem;
            animation: slideInLeft 0.8s ease;
        }
        
        .open-book {
            width: 140px;
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: rotateBook 8s linear infinite;
            position: relative;
        }

        @keyframes rotateBook {
            0% { transform: rotateY(0deg); }
            100% { transform: rotateY(360deg); }
        }
        
        .open-book::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent,
                rgba(255, 255, 255, 0.4),
                transparent
            );
            transform: rotate(45deg);
            animation: shine 4s infinite;
        }
        
        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
        
        .open-book i {
            font-size: 5rem;
            color: white;
            z-index: 1;
            transform-style: preserve-3d;
        }
        
        .welcome-text {
            text-align: center;
            max-width: 450px;
            padding: 0 2rem;
            color: white;
            animation: slideInLeft 1s ease;
        }
        
        .welcome-text h1 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            text-shadow: 0 2px 15px rgba(0, 0, 0, 0.2);
            letter-spacing: -0.5px;
        }
        
        .welcome-text p {
            font-size: 1.15rem;
            line-height: 1.7;
            opacity: 0.95;
            font-weight: 400;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 1.2rem;
        }

        .checkbox-container input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            border-radius: 4px;
            accent-color: var(--primary-color);
            cursor: pointer;
        }

        .checkbox-container label {
            margin-bottom: 0;
            font-weight: 500;
            color: var(--zinc-600);
            font-size: 14px;
            cursor: pointer;
        }

        .forgot-link {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .forgot-link:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: var(--zinc-200);
        }

        .divider span {
            padding: 0 15px;
            font-size: 13px;
            color: var(--zinc-500);
            font-weight: 500;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 1.2rem;
        }

        .social-btn {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--zinc-200);
            background: white;
            color: var(--zinc-600);
            transition: all 0.3s;
            cursor: pointer;
        }

        .social-btn:hover {
            background: var(--zinc-50);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border-color: var(--zinc-300);
        }

        .signup-link {
            text-align: center;
            font-size: 14px;
            color: var(--zinc-600);
            margin-top: 1.5rem;
        }

        .signup-link a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }

        .signup-link a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .alert-message {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 14px;
            display: none;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        @keyframes slideInLeft {
            from { opacity:0; transform:translateX(-30px); }
            to { opacity:1; transform:translateX(0); }
        }
        
        @media (max-width: 768px) {
            .split-container {
                flex-direction: column;
            }
            
            .left-section, .right-section {
                flex: none;
                width: 100%;
                height: 50%;
            }
            
            .open-book {
                width: 100px;
                height: 100px;
            }
            
            .open-book i {
                font-size: 3rem;
            }
            
            .welcome-text h1 {
                font-size: 2.2rem;
            }
            
            .welcome-text p {
                font-size: 1rem;
            }
            
            .login-card {
                width: 90%;
                max-width: 380px;
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="floating-element graduation-cap">
            <i class="fas fa-graduation-cap text-5xl text-cyan-600"></i>
        </div>
        <div class="floating-element pen">
            <i class="fas fa-pen text-4xl text-cyan-500"></i>
        </div>
        <div class="floating-element book">
            <i class="fas fa-book text-5xl text-cyan-600"></i>
        </div>
        <div class="floating-element pencil">
            <i class="fas fa-pencil-alt text-4xl text-cyan-500"></i>
        </div>
        <div class="floating-element calculator">
            <i class="fas fa-calculator text-4xl text-cyan-500"></i>
        </div>
        <div class="floating-element ruler">
            <i class="fas fa-ruler text-4xl text-cyan-500"></i>
        </div>
        <div class="floating-element backpack">
            <i class="fas fa-backpack text-4xl text-cyan-400"></i>
        </div>
        <div class="floating-element apple">
            <i class="fas fa-apple-alt text-4xl text-cyan-400"></i>
        </div>
        <div class="floating-element school-bus">
            <i class="fas fa-bus text-5xl text-cyan-400"></i>
        </div>
        <div class="floating-element degree">
            <i class="fas fa-certificate text-5xl text-cyan-300"></i>
        </div>
        <div class="floating-element glasses">
            <i class="fas fa-glasses text-4xl text-cyan-300"></i>
        </div>
    </div>

    <div class="split-container">
        <!-- Left Section - Logo and Welcome Text -->
        <div class="left-section">
            <div class="logo-container">
                <div class="open-book">
                    <i class="fas fa-book-open"></i>
                </div>
            </div>
            
            <div class="welcome-text">
                <h1>EduPortal</h1>
                <p>Your comprehensive education management system. Access your dashboard, manage courses, and track your academic journey all in one place.</p>
            </div>
        </div>
        
        <!-- Right Section - Login Form -->
        <div class="right-section">
            <div class="login-card">
                <h2 class="text-3xl font-bold text-center mb-2" style="color: var(--primary-color);">
                    Welcome Back
                </h2>
                <p class="text-center text-zinc-500 text-sm mb-6">
                    Login to your account
                </p>

                <!-- Alert Messages -->
                <div id="alertMessage" class="alert-message"></div>

                @if(session('message'))
                    <div class="alert-message alert-success" style="display: block;">
                        {{ session('message') }}
                    </div>
                @endif

                <x-auth-session-status
                    class="mb-4 text-green-600 text-sm text-center"
                    :status="session('status')" />

                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="form-input" required autofocus>
                        <x-input-error :messages="$errors->get('email')" class="text-sm mt-1"/>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label>Password</label>
                        <div style="position: relative;">
                            <input type="password" name="password"
                                   class="form-input" id="password" required>
                            <i class="fas fa-eye" style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); color: var(--zinc-400); cursor: pointer; transition: color 0.3s;" onclick="togglePassword('password')"></i>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="text-sm mt-1"/>
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex justify-between items-center mb-4">
                        <div class="checkbox-container">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember me</label>
                        </div>

                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- Button -->
                    <button type="submit" class="login-btn" id="loginBtn">
                        Sign In
                    </button>
                </form>

                @if(Route::has('register'))
                <div class="signup-link">
                    Don't have an account? 
                    <a href="{{ route('register') }}">Sign up</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const toggleIcon = passwordField.parentElement.querySelector('.fa-eye');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
                toggleIcon.style.color = 'var(--primary-color)';
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
                toggleIcon.style.color = 'var(--zinc-400)';
            }
        }

        // Handle form submission
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const loginBtn = document.getElementById('loginBtn');
            const alertMessage = document.getElementById('alertMessage');

            loginForm.addEventListener('submit', function(e) {
                // Show loading state
                loginBtn.classList.add('loading');
                loginBtn.disabled = true;
                
                // Hide any previous alerts
                alertMessage.style.display = 'none';
                alertMessage.className = 'alert-message';
            });

            // Add focus effects to form inputs
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });
        });
    </script>
</body>
</html>