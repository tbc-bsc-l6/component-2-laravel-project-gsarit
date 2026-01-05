
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Administrative Site</title>

    <!-- If you have Vite/Tailwind set up like the default Laravel page -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- fallback to your own CSS -->
    @endif
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <div class="logo">
                <h1>EduAdministrative</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/students">Students</a></li>
                    <li><a href="/staff">Staff</a></li>
                    <li><a href="/courses">Courses</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>

                    <!-- Authentication Links (same style as Laravel default welcome page) -->
                    @if (Route::has('login'))
                        @auth
                            <li>
                                <a href="{{ url('/dashboard') }}"
                                   class="inline-block px-5 py-1.5 text-[#1b1b18] dark:text-[#EDEDEC] border border-[#19140035] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-sm text-sm">
                                    Dashboard
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}"
                                   class="inline-block px-5 py-1.5 text-[#1b1b18] dark:text-[#EDEDEC] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm">
                                    Log in
                                </a>
                            </li>

                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}"
                                       class="inline-block px-5 py-1.5 text-[#1b1b18] dark:text-[#EDEDEC] border border-[#19140035] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-sm text-sm">
                                        Register
                                    </a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Welcome to Educational Administrative Site</h2>
            <p>Efficiently manage students, staff, courses, and academic reports</p>
            <a href="#" class="btn">Get Started</a>
        </div>
    </section>

    <!-- Info Cards -->
    <section class="info-cards">
        <div class="container cards-container">
            <div class="card">
                <h3>Students</h3>
                <p>450 Active Students</p>
            </div>
            <div class="card">
                <h3>Staff</h3>
                <p>50 Teaching & Non-Teaching</p>
            </div>
            <div class="card">
                <h3>Courses</h3>
                <p>12 Academic Courses</p>
            </div>
            <div class="card">
                <h3>Reports</h3>
                <p>Monthly & Annual Reports</p>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2>Our Services</h2>
            <div class="feature-grid">
                <div class="feature">
                    <h3>Student Management</h3>
                    <p>Track attendance, grades, and personal info efficiently.</p>
                </div>
                <div class="feature">
                    <h3>Staff Management</h3>
                    <p>Manage schedules, payroll, and staff information.</p>
                </div>
                <div class="feature">
                    <h3>Course Management</h3>
                    <p>Create courses, assign instructors, and monitor progress.</p>
                </div>
                <div class="feature">
                    <h3>Reports & Analytics</h3>
                    <p>Generate detailed academic and administrative reports.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Announcements Section -->
    <section class="announcements">
        <div class="container">
            <h2>Latest Announcements</h2>
            <ul>
                <li>Spring semester starts on 10th January 2026.</li>
                <li>Staff meeting scheduled for 8th January 2026.</li>
                <li>Student registration for new courses is open now.</li>
                <li>Annual report submission deadline: 20th January 2026.</li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container footer-container">
            <div class="footer-info">
                <h3>Educational Administrative Site</h3>
                <p>123 Hattiban, Knowledge City, Country</p>
                <p>Email: info@educational.com | Phone: +123 456 7890</p>
            </div>
            <div class="footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Students</a></li>
                    <li><a href="#">Staff</a></li>
                    <li><a href="#">Courses</a></li>
                </ul>
            </div>
        </div>
        <p class="footer-bottom">&copy; {{ date('Y') }} Educational Administrative Site. All rights reserved.</p>
    </footer>
</body>
</html>