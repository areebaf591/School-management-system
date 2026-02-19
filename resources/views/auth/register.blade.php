<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
           --primary-color: #0c2c28; /* Teal color */
            --secondary-color: #298a7b; /* Light teal */
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
            font-family: 'Poppins', sans-serif;
            background-color: var(--zinc-100); /* Changed to light zinc */
            color: #18181b;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            background: linear-gradient(135deg, var(--zinc-100) 0%, var(--zinc-200) 100%); /* Updated to zinc colors */
        }
        
        .floating-element {
            position: absolute;
            opacity: 0.08;
            animation-duration: 60s; /* Slowed down animation */
            z-index: -1;
        }
        
        .graduation-cap {
            top: 50%;
            left: -10%;
            animation: float-right 20s infinite linear; /* Much slower */
        }
        
        .pen {
            top: 60%;
            right: -10%;
            animation: float-left 80s infinite linear; /* Much slower */
        }
        
        .book {
            bottom: 10%;
            left: 10%;
            animation: float-up 30s infinite linear; /* Much slower */
        }
        
        .pencil {
            top: 40%;
            left: 5%;
            animation: float-diagonal 60s infinite linear; /* Much slower */
        }
        
        .calculator {
            top: 10%;
            right: 15%;
            animation: float-diagonal-reverse 70s infinite linear; /* Much slower */
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
        
        .register-card {
            width: 400px;
            padding: 2rem;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 25px 45px rgba(0,0,0,.12);
            animation: fadeIn .6s ease;
            border: 1px solid rgba(244, 244, 245, 0.8);
            z-index: 1;
        }

        @keyframes fadeIn {
            from { opacity:0; transform:translateY(20px); }
            to { opacity:1; transform:translateY(0); }
        }

        .form-input {
            width:100%;
            height:44px;
            border:1px solid var(--zinc-300);
            border-radius:12px;
            padding:0 14px;
            font-size:14px;
            background:var(--zinc-100);
            transition:.3s;
        }

        .form-input:focus {
            outline:none;
            border-color:var(--primary-color);
            background:white;
            box-shadow:0 0 0 4px rgba(20, 184, 166, 0.15);
        }
        
        .password-wrapper {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--zinc-500);
            transition: color 0.3s;
            font-size: 16px;
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
        }
        
        .password-input {
            padding-right: 45px;
        }
        
        .register-btn {
            height:44px;
            border-radius:12px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color:white;
            font-weight:600;
            letter-spacing:.3px;
            transition:.3s;
            position: relative;
            overflow: hidden;
        }
        
        .register-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s ease;
        }
        
        .register-btn:hover::before {
            left: 100%;
        }

        .register-btn:hover {
            transform:translateY(-2px);
            box-shadow:0 8px 18px rgba(20, 184, 166, 0.35);
        }
        
        label {
            font-weight:500;
            color: var(--zinc-700);
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
        
        .header-logo {
            display: inline-block;
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            vertical-align: middle;
            animation: float 3s ease-in-out infinite;
            box-shadow: 0 5px 15px rgba(20, 184, 166, 0.3);
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .header-logo i {
            font-size: 1.2rem;
            color: white;
        }
        
        .header-title {
            display: inline-flex;
            align-items: center;
        }
        
        .success-message {
            display: none;
            background-color: rgba(20, 184, 166, 0.1);
            border-left: 4px solid var(--primary-color);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            animation: slideDown 0.5s ease;
        }
        
        @keyframes slideDown {
            from { opacity:0; transform:translateY(-20px); }
            to { opacity:1; transform:translateY(0); }
        }
        
        .success-message h3 {
            color: var(--primary-color);
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 18px;
        }
        
        .success-message p {
            margin: 0;
            color: var(--zinc-600);
            font-size: 14px;
        }
        
        .success-message i {
            font-size: 24px;
            color: var(--primary-color);
            margin-right: 10px;
        }
        
        @media (max-width: 768px) {
            .register-card {
                width: 90%;
                max-width: 360px;
            }
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

    <!-- Register Form -->
    <div class="register-card">
        <h2 class="text-3xl font-bold text-center text-teal-600 mb-1">
            <div class="header-title">
                <div class="header-logo">
                    <i class="fas fa-user-plus"></i>
                </div>
                Create Account 
            </div>
        </h2>
        
        <!-- Success Message -->
        <div class="success-message" id="successMessage">
            <div style="display: flex; align-items: center;">
                <i class="fas fa-check-circle"></i>
                <div>
                    <h3>Registration Successful!</h3>
                    <p>Your account has been created successfully. Please wait for admin approval before you can login.</p>
                </div>
            </div>
        </div>
        
        <p class="text-center text-zinc-500 text-sm mb-7">
            Join us by creating your account
        </p>

        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label class="text-sm text-zinc-700">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="form-input mt-1" required autofocus>
                <x-input-error :messages="$errors->get('name')" class="text-sm mt-1"/>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="text-sm text-zinc-700">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="form-input mt-1" required>
                <x-input-error :messages="$errors->get('email')" class="text-sm mt-1"/>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="text-sm text-zinc-700">Password</label>
                <div class="password-wrapper">
                    <input type="password" name="password" id="password"
                           class="form-input mt-1 password-input" required>
                    <i class="fas fa-eye password-toggle" onclick="togglePassword('password')"></i>
                </div>
                <x-input-error :messages="$errors->get('password')" class="text-sm mt-1"/>
            </div>

            <!-- Confirm Password -->
            <div class="mb-5">
                <label class="text-sm text-zinc-700">Confirm Password</label>
                <div class="password-wrapper">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="form-input mt-1 password-input" required>
                    <i class="fas fa-eye password-toggle" onclick="togglePassword('password_confirmation')"></i>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="text-sm mt-1"/>
            </div>

            <!-- Button -->
            <button class="register-btn w-full" type="submit">
                Register
            </button>
        </form>

        <!-- Login Link -->
        <p class="text-center text-sm text-zinc-500 mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-teal-600 font-semibold hover:underline">
                Login
            </a>
        </p>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const toggleIcon = passwordField.nextElementSibling;
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
        
        // Handle form submission and show success message
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            // Prevent default form submission
            e.preventDefault();
            
            // Show success message
            document.getElementById('successMessage').style.display = 'block';
            
            // Scroll to top to show the success message
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            
            // Actually submit the form after showing the message
            setTimeout(() => {
                this.submit();
            }, 2000);
        });
        
        // Check for approval notification
        window.addEventListener('load', function() {
            // Check if there's a notification in session storage or URL parameter
            const urlParams = new URLSearchParams(window.location.search);
            const approved = urlParams.get('approved');
            
            if (approved === 'true') {
                // Create and show approval notification
                const notification = document.createElement('div');
                notification.className = 'notification';
                notification.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: white;
                    padding: 15px 20px;
                    border-radius: 8px;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                    border-left: 4px solid var(--primary-color);
                    z-index: 1000;
                    display: flex;
                    align-items: center;
                    animation: slideIn 0.5s ease;
                    max-width: 350px;
                `;
                
                notification.innerHTML = `
                    <i class="fas fa-check-circle" style="color: var(--primary-color); font-size: 24px; margin-right: 15px;"></i>
                    <div>
                        <h4 style="margin: 0; color: var(--zinc-800); font-weight: 600;">Account Approved!</h4>
                        <p style="margin: 5px 0 0; color: var(--zinc-600); font-size: 14px;">Your account has been approved. You can now login.</p>
                    </div>
                    <button onclick="this.parentElement.remove()" style="background: none; border: none; margin-left: 15px; cursor: pointer; color: var(--zinc-500);">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                
                document.body.appendChild(notification);
                
                // Auto remove after 10 seconds
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 10000);
                
                // Clean URL
                window.history.replaceState({}, document.title, window.location.pathname);
            }
        });
    </script>
</body>
</html>