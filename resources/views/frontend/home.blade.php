<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Valley International School</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #10b981;
            --secondary-color: #059669;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f9fafb;
            --white: #ffffff;
            --border-color: #e5e7eb;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .navbar.scrolled {
            box-shadow: var(--shadow-md);
            background: rgba(255, 255, 255, 0.98);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-link {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text-dark);
            cursor: pointer;
        }

        /* Buttons */
        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-secondary:hover {
            background: var(--primary-color);
            color: white;
        }

        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-outline:hover {
            background: white;
            color: var(--primary-color);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, rgba(27, 129, 62, 0.9), rgba(5, 48, 31, 0.9)),
                url('/images/school.jpg') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 2rem;
            position: relative;
        }

        .hero-content {
            max-width: 800px;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-title {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Sections */
        .section {
            padding: 5rem 2rem;
        }

        .bg-light {
            background: var(--bg-light);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .section-subtitle {
            font-size: 1.125rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .gradient-text {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* About Section */
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            margin-bottom: 3rem;
        }

        .about-text {
            line-height: 1.8;
        }

        .about-text p {
            margin-bottom: 1rem;
            color: var(--text-light);
        }

        .about-image {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        .about-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            text-align: center;
            box-shadow: var(--shadow-md);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-xl);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--text-light);
            font-weight: 500;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            text-align: center;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            color: white;
        }

        .feature-title {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .feature-description {
            color: var(--text-light);
            line-height: 1.6;
        }

        /* Teachers Grid */
        .teachers-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .teacher-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .teacher-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }

        .teacher-image {
            height: 250px;
            overflow: hidden;
        }

        .teacher-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .teacher-card:hover .teacher-image img {
            transform: scale(1.1);
        }

        .teacher-info {
            padding: 1.5rem;
            text-align: center;
        }

        .teacher-name {
            font-size: 1.125rem;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .teacher-subject {
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .teacher-social {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-link {
            width: 35px;
            height: 35px;
            background: var(--bg-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        /* Gallery */
        .gallery-filters {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.5rem 1.5rem;
            border: 2px solid var(--border-color);
            background: white;
            border-radius: 2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.03);
            box-shadow: var(--shadow-xl);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white;
            padding: 1.5rem;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
        }

        .gallery-title {
            font-size: 1.125rem;
            margin-bottom: 0.25rem;
        }

        .gallery-category {
            font-size: 0.875rem;
            opacity: 0.9;
        }

        /* Testimonials */
        .testimonials-slider {
            max-width: 800px;
            margin: 0 auto;
        }

        .testimonial-card {
            background: white;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: var(--shadow-lg);
            text-align: center;
        }

        .rating {
            color: #fbbf24;
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .testimonial-text {
            font-size: 1.125rem;
            line-height: 1.8;
            color: var(--text-light);
            margin-bottom: 2rem;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .author-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .author-info {
            text-align: left;
        }

        .author-name {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.25rem;
        }

        .author-role {
            color: var(--text-light);
            font-size: 0.875rem;
        }

        /* Contact */
        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-top: 3rem;
        }

        .contact-form {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--shadow-lg);
        }

        .contact-form h3 {
            margin-bottom: 1.5rem;
            color: var(--text-dark);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-dark);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .info-card {
            background: white;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateX(10px);
            box-shadow: var(--shadow-lg);
        }

        .info-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
        }

        .info-text h3 {
            margin-bottom: 0.25rem;
            color: var(--text-dark);
        }

        .info-text p {
            color: var(--text-light);
            line-height: 1.5;
        }

        /* Footer */
        .footer {
            background: #111827;
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: white;
        }

        .footer-section p {
            color: #9ca3af;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section ul li a {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: var(--primary-color);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary-color);
            transform: scale(1.1);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #9ca3af;
        }

        /* Back to Top */
        .back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background: #059669;
            transform: scale(1.1);
        }

        /* Loading Animation */
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loader.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid var(--border-color);
            border-top-color: var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-menu {
                position: fixed;
                left: -100%;
                top: 70px;
                flex-direction: column;
                background: white;
                width: 100%;
                text-align: center;
                transition: 0.3s;
                box-shadow: var(--shadow-lg);
                padding: 2rem 0;
            }

            .nav-menu.active {
                left: 0;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .about-content,
            .contact-content {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .features-grid,
            .teachers-grid,
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .social-links {
                justify-content: center;
            }
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .slide-in-left {
            animation: slideInLeft 0.5s ease-out;
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .slide-in-right {
            animation: slideInRight 0.5s ease-out;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Notification Toast */
        .toast {
            position: fixed;
            top: 100px;
            right: -400px;
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            box-shadow: var(--shadow-xl);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: right 0.3s ease;
            z-index: 1001;
        }

        .toast.show {
            right: 2rem;
        }

        .toast.success {
            border-left: 4px solid var(--primary-color);
        }

        .toast.error {
            border-left: 4px solid #ef4444;
        }

        .toast-icon {
            font-size: 1.5rem;
        }

        .toast.success .toast-icon {
            color: var(--primary-color);
        }

        .toast.error .toast-icon {
            color: #ef4444;
        }
    </style>
</head>
<body>
    <!-- Loader -->
    <div class="loader" id="loader">
        <div class="spinner"></div>
    </div>

    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="#" class="logo">
                <i class="fas fa-graduation-cap"></i>
                Green Valley
            </a>
            
            <ul class="nav-menu" id="navMenu">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#features" class="nav-link">Features</a></li>
                <li><a href="#teachers" class="nav-link">Teachers</a></li>
                <li><a href="#gallery" class="nav-link">Gallery</a></li>
                <li><a href="#testimonials" class="nav-link">Testimonials</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
            
            <div class="nav-actions">
               <a href="{{ route('login') }}" class="btn btn-secondary">
    <i class="fas fa-sign-in-alt"></i> Login
</a>
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1 class="hero-title">
                Welcome to <span class="gradient-text">Green Valley</span><br>
                International School
            </h1>
            <p class="hero-subtitle">
                Nurturing excellence in education since 2008. Where every child discovers their potential and dreams take flight.
            </p>
            <div class="hero-buttons">
                <a href="#admissions" class="btn btn-primary">
                    <i class="fas fa-rocket"></i> Start Your Journey
                </a>
                <a href="#tour" class="btn btn-outline" onclick="playVirtualTour()">
                    <i class="fas fa-play-circle"></i> Virtual Tour
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section" id="about">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">About <span class="gradient-text">Green Valley</span></h2>
                <p class="section-subtitle">
                    A premier educational institution committed to holistic development and academic excellence
                </p>
            </div>
            
            <div class="about-content">
                <div class="about-text" data-aos="fade-right">
                    <p>
                        Green Valley International School has been a beacon of educational excellence for over 15 years. 
                        Our mission is to provide a nurturing environment where students can thrive academically, 
                        socially, and emotionally.
                    </p>
                    <br>
                    <p>
                        We believe in fostering creativity, critical thinking, and character development alongside 
                        rigorous academic programs. Our state-of-the-art facilities and dedicated faculty ensure that 
                        every student receives the best possible education.
                    </p>
                    <br>
                    <p>
                        Join us in shaping the future leaders of tomorrow, where tradition meets innovation and 
                        dreams become reality.
                    </p>
                </div>
                
                <div class="about-image" data-aos="fade-left">
    <img src="/images/about.jpg" alt="About School">
</div>
            </div>
            
            <div class="stats-grid" data-aos="fade-up">
                <div class="stat-card">
                    <div class="stat-number" data-count="2000">0</div>
                    <div class="stat-label">Students</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" data-count="150">0</div>
                    <div class="stat-label">Faculty Members</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" data-count="50">0</div>
                    <div class="stat-label">Programs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" data-count="15">0</div>
                    <div class="stat-label">Years of Excellence</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section bg-light" id="features">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Why Choose <span class="gradient-text">Green Valley</span></h2>
                <p class="section-subtitle">
                    Discover the features that make us the best choice for your child's education
                </p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon">
                        <i class="fas fa-microscope"></i>
                    </div>
                    <h3 class="feature-title">Advanced Labs</h3>
                    <p class="feature-description">
                        State-of-the-art science and computer labs equipped with modern technology for hands-on learning
                    </p>
                </div>
                
                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="feature-title">Expert Faculty</h3>
                    <p class="feature-description">
                        Highly qualified and experienced teachers dedicated to nurturing each student's potential
                    </p>
                </div>
                
                <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon">
                        <i class="fas fa-running"></i>
                    </div>
                    <h3 class="feature-title">Sports Facilities</h3>
                    <p class="feature-description">
                        Comprehensive sports infrastructure including swimming pool, basketball courts, and athletic tracks
                    </p>
                </div>
                
                <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3 class="feature-title">Arts & Culture</h3>
                    <p class="feature-description">
                        Vibrant arts programs encouraging creativity and cultural expression through various mediums
                    </p>
                </div>
                
                <div class="feature-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3 class="feature-title">Global Curriculum</h3>
                    <p class="feature-description">
                        Internationally recognized curriculum preparing students for global opportunities
                    </p>
                </div>
                
                <div class="feature-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">Safe Environment</h3>
                    <p class="feature-description">
                        Secure campus with 24/7 surveillance and trained staff ensuring student safety
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Teachers Section -->
    <section class="section" id="teachers">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Meet Our <span class="gradient-text">Faculty</span></h2>
                <p class="section-subtitle">
                    Learn from the best minds in education
                </p>
            </div>
            
            <div class="teachers-grid">
                <div class="teacher-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="teacher-image">
    <img src="/images/miss.jpg" alt="About School">
                    </div>
                    <div class="teacher-info">
                        <h3 class="teacher-name">Dr. Sarah Johnson</h3>
                        <p class="teacher-subject">Principal & Science Head</p>
                        <div class="teacher-social">
                            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="teacher-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="teacher-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80" alt="Teacher">
                    </div>
                    <div class="teacher-info">
                        <h3 class="teacher-name">Mr. Michael Chen</h3>
                        <p class="teacher-subject">Mathematics Department</p>
                        <div class="teacher-social">
                            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="teacher-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="teacher-image">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="Teacher">
                    </div>
                    <div class="teacher-info">
                        <h3 class="teacher-name">Ms. Emily Rodriguez</h3>
                        <p class="teacher-subject">English Literature</p>
                        <div class="teacher-social">
                            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="teacher-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="teacher-image">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="Teacher">
                    </div>
                    <div class="teacher-info">
                        <h3 class="teacher-name">Mr. David Kim</h3>
                        <p class="teacher-subject">Computer Science</p>
                        <div class="teacher-social">
                            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="section bg-light" id="gallery">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">School <span class="gradient-text">Gallery</span></h2>
                <p class="section-subtitle">
                    A glimpse into life at Green Valley
                </p>
            </div>
            
            <div class="gallery-filters" data-aos="fade-up">
                <button class="filter-btn active" onclick="filterGallery('all')">All</button>
                <button class="filter-btn" onclick="filterGallery('campus')">Campus</button>
                <button class="filter-btn" onclick="filterGallery('classroom')">Classroom</button>
                <button class="filter-btn" onclick="filterGallery('sports')">Sports</button>
                <button class="filter-btn" onclick="filterGallery('events')">Events</button>
            </div>
            
            <div class="gallery-grid">
                <div class="gallery-item" data-category="campus" data-aos="fade-up" data-aos-delay="100">
                    <img src="https://images.unsplash.com/photo-1581078426770-6d336e5de7bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="School Building">
                    <div class="gallery-overlay">
                        <h3 class="gallery-title">Main Campus Building</h3>
                        <p class="gallery-category">Campus</p>
                    </div>
                </div>
                
                <div class="gallery-item" data-category="classroom" data-aos="fade-up" data-aos-delay="200">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="Modern Classroom">
                    <div class="gallery-overlay">
                        <h3 class="gallery-title">Smart Classroom</h3>
                        <p class="gallery-category">Classroom</p>
                    </div>
                </div>
                
                <div class="gallery-item" data-category="sports" data-aos="fade-up" data-aos-delay="300">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="Basketball Court">
                    <div class="gallery-overlay">
                        <h3 class="gallery-title">Basketball Championship</h3>
                        <p class="gallery-category">Sports</p>
                    </div>
                </div>
                
                <div class="gallery-item" data-category="events" data-aos="fade-up" data-aos-delay="400">
                    <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="Annual Day">
                    <div class="gallery-overlay">
                        <h3 class="gallery-title">Annual Day Celebration</h3>
                        <p class="gallery-category">Events</p>
                    </div>
                </div>
                
                <div class="gallery-item" data-category="campus" data-aos="fade-up" data-aos-delay="500">
                    <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="Library">
                    <div class="gallery-overlay">
                        <h3 class="gallery-title">School Library</h3>
                        <p class="gallery-category">Campus</p>
                    </div>
                </div>
                
                <div class="gallery-item" data-category="sports" data-aos="fade-up" data-aos-delay="600">
                    <img src="https://images.unsplash.com/photo-1576610616656-d3aa5d1f4534?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="Swimming Pool">
                    <div class="gallery-overlay">
                        <h3 class="gallery-title">Swimming Complex</h3>
                        <p class="gallery-category">Sports</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section" id="testimonials">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">What Our <span class="gradient-text">Students Say</span></h2>
                <p class="section-subtitle">
                    Hear from our students about their experience at Green Valley
                </p>
            </div>
            
            <div class="testimonials-slider" data-aos="fade-up">
                <div class="testimonial-card">
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "Green Valley has transformed my life. The teachers are amazing and the facilities are world-class. 
                        I've grown not just academically but as a person too. This school truly cares about each student's success."
                    </p>
                    <div class="testimonial-author">
                        <img src="/images/miss.jpg" alt="Student" class="author-image">
                        <div class="author-info">
                            <h4 class="author-name">Priya Sharma</h4>
                            <p class="author-role">Class 12 Student</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section bg-light" id="contact">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Get in <span class="gradient-text">Touch</span></h2>
                <p class="section-subtitle">
                    We're here to answer your questions and help you learn more about Green Valley
                </p>
            </div>
            
            <div class="contact-content">
                <div class="contact-form" data-aos="fade-right">
                    <h3>Send us a Message</h3>
                    <form id="contactForm">
                        <div class="form-group">
                            <label class="form-label">Your Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Subject</label>
                            <select class="form-control">
                                <option>Admission Inquiry</option>
                                <option>General Information</option>
                                <option>Facilities Tour</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
                
                <div class="contact-info" data-aos="fade-left">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-text">
                            <h3>Visit Us</h3>
                            <p>123 Education Lane, Green Valley<br>New Delhi, 110001, India</p>
                        </div>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-text">
                            <h3>Call Us</h3>
                            <p>+91 11 2345 6789<br>+91 11 2345 6780</p>
                        </div>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-text">
                            <h3>Email Us</h3>
                            <p>info@greenvalley.edu<br>admissions@greenvalley.edu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Green Valley School</h3>
                    <p>Nurturing excellence in education since 2008. Where every child discovers their potential.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#teachers">Faculty</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Admissions</h3>
                    <ul>
                        <li><a href="#">Admission Process</a></li>
                        <li><a href="#">Fee Structure</a></li>
                        <li><a href="#">Scholarships</a></li>
                        <li><a href="#">Download Brochure</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Newsletter</h3>
                    <p>Subscribe to get updates on school events and news</p>
                    <form id="newsletterForm" style="margin-top: 1rem;">
                        <div style="display: flex; gap: 0.5rem;">
                            <input type="email" class="form-control" placeholder="Your email" style="flex: 1;">
                            <button type="submit" class="btn btn-primary">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2024 Green Valley International School. All rights reserved. | Privacy Policy | Terms of Service</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <i class="fas fa-check-circle toast-icon"></i>
        <div>
            <strong id="toastTitle">Success!</strong>
            <p id="toastMessage" style="margin: 0; font-size: 0.875rem;">Your message has been sent.</p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Loader
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.getElementById('loader').classList.add('hidden');
            }, 1000);
        });

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navMenu = document.getElementById('navMenu');

        mobileMenuBtn.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            const icon = mobileMenuBtn.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            const backToTop = document.getElementById('backToTop');
            
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
                backToTop.classList.add('show');
            } else {
                navbar.classList.remove('scrolled');
                backToTop.classList.remove('show');
            }
        });

        // Smooth Scrolling with offset for fixed navbar
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const navbarHeight = document.getElementById('navbar').offsetHeight;
                    const targetPosition = target.offsetTop - navbarHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    navMenu.classList.remove('active');
                    const icon = mobileMenuBtn.querySelector('i');
                    icon.classList.add('fa-bars');
                    icon.classList.remove('fa-times');
                }
            });
        });

        // Back to Top
        document.getElementById('backToTop').addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Counter Animation
        const counters = document.querySelectorAll('.stat-number');
        const speed = 200;

        const countUp = () => {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-count');
                const count = +counter.innerText;
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(countUp, 10);
                } else {
                    counter.innerText = target + '+';
                }
            });
        };

        // Trigger counter animation when in view
        const observerOptions = {
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    countUp();
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        const statsSection = document.querySelector('.stats-grid');
        if (statsSection) {
            observer.observe(statsSection);
        }

        // Gallery Filter
        function filterGallery(category) {
            const items = document.querySelectorAll('.gallery-item');
            const buttons = document.querySelectorAll('.filter-btn');
            
            buttons.forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            items.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        }

        // Toast Notification
        function showToast(title, message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastTitle = document.getElementById('toastTitle');
            const toastMessage = document.getElementById('toastMessage');
            const toastIcon = toast.querySelector('.toast-icon');
            
            toastTitle.textContent = title;
            toastMessage.textContent = message;
            
            toast.className = `toast ${type} show`;
            
            if (type === 'success') {
                toastIcon.className = 'fas fa-check-circle toast-icon';
            } else if (type === 'error') {
                toastIcon.className = 'fas fa-exclamation-circle toast-icon';
            }
            
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        // Contact Form
        document.getElementById('contactForm').addEventListener('submit', (e) => {
            e.preventDefault();
            showToast('Success!', 'Your message has been sent successfully. We will get back to you soon.');
            e.target.reset();
        });

        // Newsletter Form
        document.getElementById('newsletterForm').addEventListener('submit', (e) => {
            e.preventDefault();
            showToast('Subscribed!', 'Thank you for subscribing to our newsletter.');
            e.target.reset();
        });

        // Virtual Tour
        function playVirtualTour() {
            showToast('Virtual Tour', 'Virtual tour feature coming soon! Contact us for a campus visit.', 'success');
        }

        // Login Modal
        function showLoginModal() {
            showToast('Login', 'Student/Parent portal coming soon!', 'success');
        }

        // Add hover effect to gallery items
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('click', function() {
                const img = this.querySelector('img');
                const modal = document.createElement('div');
                modal.style.cssText = `
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0,0,0,0.9);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 9999;
                    cursor: pointer;
                `;
                
                const modalImg = document.createElement('img');
                modalImg.src = img.src;
                modalImg.style.cssText = `
                    max-width: 90%;
                    max-height: 90%;
                    object-fit: contain;
                    border-radius: 10px;
                `;
                
                modal.appendChild(modalImg);
                document.body.appendChild(modal);
                
                modal.addEventListener('click', () => {
                    modal.remove();
                });
            });
        });
    </script>
</body>
</html>