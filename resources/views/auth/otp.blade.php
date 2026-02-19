<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification - EduPortal</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #0c2c28;
            --secondary-color: #298a7b;
            --accent-color: #a7f3d0;
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
            font-family: 'Poppins', sans-serif;
            background-color: var(--zinc-100);
            color: #18181b;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            min-height: 100vh;
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
            background: linear-gradient(135deg, var(--zinc-100) 0%, var(--zinc-200) 100%);
        }
        
        .floating-element {
            position: absolute;
            opacity: 0.08;
            animation-duration: 60s;
            z-index: -1;
        }
        
        .graduation-cap {
            top: 50%;
            left: -10%;
            animation: float-right 20s infinite linear;
        }
        
        .pen {
            top: 60%;
            right: -10%;
            animation: float-left 80s infinite linear;
        }
        
        .book {
            bottom: 10%;
            left: 10%;
            animation: float-up 30s infinite linear;
        }
        
        .pencil {
            top: 40%;
            left: 5%;
            animation: float-diagonal 60s infinite linear;
        }
        
        .calculator {
            top: 10%;
            right: 15%;
            animation: float-diagonal-reverse 70s infinite linear;
        }
        
        .ruler {
            bottom: 20%;
            right: 5%;
            animation: float-right-reverse 95s infinite linear;
        }
        
        .backpack {
            top: 70%;
            left: 15%;
            animation: float-up 150s infinite linear;
        }
        
        .apple {
            top: 30%;
            right: 25%;
            animation: float-diagonal 160s infinite linear;
        }
        
        .school-bus {
            bottom: 30%;
            left: 20%;
            animation: float-right 140s infinite linear;
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
        
        .otp-container {
            width: 100%;
            max-width: 450px;
            padding: 2rem;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 25px 45px rgba(0,0,0,.12);
            animation: fadeIn .6s ease;
            border: 1px solid rgba(244, 244, 245, 0.8);
            position: relative;
        }

        @keyframes fadeIn {
            from { opacity:0; transform:translateY(20px); }
            to { opacity:1; transform:translateY(0); }
        }

        .header-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .header-logo {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: float 3s ease-in-out infinite;
            box-shadow: 0 5px 15px rgba(20, 184, 166, 0.3);
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .header-logo i {
            color: white;
            font-size: 24px;
        }

        .header-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .header-subtitle {
            color: var(--zinc-500);
            font-size: 14px;
            margin-bottom: 0.5rem;
        }

        .email-display {
            color: var(--zinc-700);
            font-size: 14px;
            font-weight: 500;
            background: var(--zinc-100);
            padding: 8px 16px;
            border-radius: 8px;
            display: inline-block;
            margin-top: 0.5rem;
        }

        .alert-message {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 14px;
            display: none;
            animation: slideDown 0.5s ease;
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

        @keyframes slideDown {
            from { opacity:0; transform:translateY(-20px); }
            to { opacity:1; transform:translateY(0); }
        }

        .otp-input-wrapper {
            position: relative;
            margin: 1.5rem 0;
        }

        .otp-input {
            width: 100%;
            height: 60px;
            text-align: center;
            font-size: 28px;
            font-weight: 600;
            letter-spacing: 8px;
            border: 2px solid var(--zinc-300);
            border-radius: 12px;
            background: white;
            transition: all 0.3s;
            color: var(--zinc-800);
            font-family: 'Courier New', monospace;
        }

        .otp-input:focus {
            outline: none;
            border-color: var(--primary-color);
            background: white;
            box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.15);
            transform: scale(1.02);
        }

        .otp-input.filled {
            border-color: var(--secondary-color);
            background: rgba(20, 184, 166, 0.05);
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--zinc-400);
            font-size: 20px;
            pointer-events: none;
            transition: color 0.3s;
        }

        .otp-input:focus ~ .input-icon {
            color: var(--primary-color);
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--zinc-700);
            font-size: 14px;
        }

        .verify-btn {
            width: 100%;
            height: 48px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            font-weight: 600;
            font-size: 16px;
            letter-spacing: 0.3px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .verify-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s ease;
        }

        .verify-btn:hover::before {
            left: 100%;
        }

        .verify-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(20, 184, 166, 0.35);
        }

        .verify-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .verify-btn.loading {
            pointer-events: none;
        }

        .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .resend-section {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--zinc-200);
        }

        .resend-text {
            color: var(--zinc-600);
            font-size: 14px;
            margin-bottom: 0.5rem;
        }

        .resend-link {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            padding: 8px 16px;
            border-radius: 8px;
            display: inline-block;
            cursor: pointer;
        }

        .resend-link:hover:not(.disabled) {
            color: var(--secondary-color);
            background: rgba(20, 184, 166, 0.1);
            text-decoration: none;
        }

        .resend-link.disabled {
            color: var(--zinc-400);
            cursor: not-allowed;
            opacity: 0.6;
        }

        .timer {
            display: inline-block;
            margin-left: 8px;
            font-weight: 500;
            color: var(--zinc-600);
            font-size: 14px;
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-link a {
            color: var(--zinc-600);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .back-link a:hover {
            color: var(--primary-color);
            text-decoration: none;
        }

        @media (max-width: 480px) {
            .otp-container {
                width: 95%;
                padding: 1.5rem;
            }

            .otp-input {
                height: 55px;
                font-size: 24px;
                letter-spacing: 6px;
            }

            .header-title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <!-- Animated Background -->
    <div class="animated-bg">
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

    <!-- OTP Verification Container -->
    <div class="otp-container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="logo-wrapper">
                <div class="header-logo">
                    <i class="fas fa-shield-alt"></i>
                </div>
            </div>
            <h1 class="header-title">Verify OTP</h1>
            <p class="header-subtitle">Enter the 6-digit code sent to your email</p>
            @if(session('email'))
                <div class="email-display">
                    <i class="fas fa-envelope" style="margin-right: 5px;"></i>
                    {{ session('email') }}
                </div>
            @endif
        </div>

        <!-- Alert Messages -->
        <div id="alertMessage" class="alert-message"></div>
        
        @if(session('message'))
            <div class="alert-message alert-success" style="display: block;">
                <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                {{ session('message') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert-message alert-error" style="display: block;">
                <i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- OTP Form -->
        <form method="POST" action="{{ route('otp.verify') }}" id="otpForm">
            @csrf
            
            <div class="mb-4">
                <label class="form-label">Verification Code</label>
                <div class="otp-input-wrapper">
                    <input type="text" 
                           class="otp-input" 
                           name="otp" 
                           id="otpInput" 
                           placeholder="000000"
                           maxlength="6" 
                           pattern="[0-9]{6}"
                           inputmode="numeric"
                           autocomplete="off"
                           required>
                    <i class="fas fa-key input-icon"></i>
                </div>
                <x-input-error :messages="$errors->get('otp')" class="text-sm mt-2 text-red-600"/>
            </div>

            <button type="submit" class="verify-btn" id="verifyBtn">
                <span id="btnText">Verify Code</span>
                <div class="spinner" id="spinner"></div>
            </button>
        </form>

        <!-- Resend Section -->
        <div class="resend-section">
            <p class="resend-text">Didn't receive the code?</p>
            <a href="#" class="resend-link" id="resendLink">
                Resend OTP
                <span class="timer" id="timer"></span>
            </a>
        </div>

        <!-- Back to Login -->
        <div class="back-link">
            <a href="{{ route('login') }}">
                <i class="fas fa-arrow-left"></i>
                Back to Login
            </a>
        </div>
    </div>

    <script>
        // OTP Input Handling
        const otpInput = document.getElementById('otpInput');
        const verifyBtn = document.getElementById('verifyBtn');
        const btnText = document.getElementById('btnText');
        const spinner = document.getElementById('spinner');
        const resendLink = document.getElementById('resendLink');
        const timer = document.getElementById('timer');
        const alertMessage = document.getElementById('alertMessage');

        // Handle OTP input
        otpInput.addEventListener('input', (e) => {
            // Only allow numbers
            e.target.value = e.target.value.replace(/[^0-9]/g, '');
            
            // Add filled class for styling
            if (e.target.value.length === 6) {
                e.target.classList.add('filled');
            } else {
                e.target.classList.remove('filled');
            }
        });

        // Handle paste event
        otpInput.addEventListener('paste', (e) => {
            e.preventDefault();
            const pastedData = e.clipboardData.getData('text').replace(/[^0-9]/g, '').slice(0, 6);
            otpInput.value = pastedData;
            
            if (pastedData.length === 6) {
                otpInput.classList.add('filled');
            }
        });

        // Timer for resend OTP
        let timeLeft = 60;
        let timerInterval;

        function startTimer() {
            timeLeft = 60;
            resendLink.classList.add('disabled');
            updateTimerDisplay();
            
            timerInterval = setInterval(() => {
                timeLeft--;
                updateTimerDisplay();
                
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    resendLink.classList.remove('disabled');
                    timer.textContent = '';
                }
            }, 1000);
        }

        function updateTimerDisplay() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timer.textContent = `(${minutes}:${seconds.toString().padStart(2, '0')})`;
        }

        // Initialize timer on page load
        startTimer();

        // Resend OTP link click handler
        resendLink.addEventListener('click', async (e) => {
            e.preventDefault();
            
            if (timeLeft <= 0 && !resendLink.classList.contains('disabled')) {
                try {
                    // Show loading state
                    resendLink.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
                    resendLink.classList.add('disabled');
                    
                    // Make AJAX request to resend OTP
                    const response = await fetch('{{ route("otp.resend") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            email: '{{ session("email") }}'
                        })
                    });
                    
                    const data = await response.json();
                    
                    if (response.ok) {
                        showAlert(data.message || 'OTP has been resent to your email', 'success');
                        startTimer();
                    } else {
                        showAlert(data.error || 'Failed to resend OTP', 'error');
                    }
                } catch (error) {
                    showAlert('Network error. Please try again.', 'error');
                } finally {
                    resendLink.innerHTML = 'Resend OTP<span class="timer" id="timer"></span>';
                    timer = document.getElementById('timer');
                }
            }
        });

        // Form submission handling
        document.getElementById('otpForm').addEventListener('submit', function(e) {
            // Validate OTP length
            if (otpInput.value.length !== 6) {
                e.preventDefault();
                showAlert('Please enter a valid 6-digit OTP', 'error');
                otpInput.focus();
                return;
            }
            
            // Show loading state
            verifyBtn.classList.add('loading');
            verifyBtn.disabled = true;
            btnText.style.display = 'none';
            spinner.style.display = 'block';
            
            // Hide any previous alerts
            alertMessage.style.display = 'none';
            alertMessage.className = 'alert-message';
        });

        // Show alert function
        function showAlert(message, type) {
            alertMessage.textContent = message;
            alertMessage.className = `alert-message alert-${type}`;
            alertMessage.style.display = 'block';
            
            // Auto hide after 5 seconds
            setTimeout(() => {
                alertMessage.style.display = 'none';
            }, 5000);
        }

        // Focus input on page load
        window.addEventListener('load', () => {
            otpInput.focus();
        });

        // Auto-submit when 6 digits are entered
        otpInput.addEventListener('input', (e) => {
            if (e.target.value.length === 6) {
                // Small delay to show the filled state
                setTimeout(() => {
                    document.getElementById('otpForm').requestSubmit();
                }, 300);
            }
        });
    </script>
</body>
</html>