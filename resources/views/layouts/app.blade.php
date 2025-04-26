<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') | EventO </title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-circle.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>

    <style>
        :root {
            --primary-color: #000000;
            --primary-hover: #333333;
            --text-light: #ffffff;
            --text-dark: #000000;
            --bg-dark: #000000;
            --bg-light: #ffffff;
            --card-bg: #1a1a1a;
            --border-color: #333333;
            --footer-bg: #1e1e1e;
            --nav-height: 70px;
            --nav-bg: rgba(0, 0, 0, 0.8);
            --nav-blur: blur(10px);
        }

        body {
            background-color: var(--bg-dark);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: var(--text-light);
            padding-top: var(--nav-height);
        }

        .btn-primary {
            background-color: var(--bg-light);
            border-color: var(--bg-light);
            color: var(--text-dark);
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            color: var(--text-light);
        }

        .btn-secondary {
            background-color: var(--card-bg);
            border-color: var(--border-color);
            color: var(--text-light);
        }

        .btn-secondary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            color: var(--text-light);
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: var(--text-light);
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: var(--text-dark);
        }

        .btn-success {
            background-color: #198754;
            border-color: #198754;
            color: var(--text-light);
        }

        /* Modern Navbar Styles */
        .navbar {
            height: var(--nav-height);
            background-color: var(--nav-bg);
            backdrop-filter: var(--nav-blur);
            -webkit-backdrop-filter: var(--nav-blur);
            padding: 0 2rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background-color: var(--nav-bg);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--text-light);
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            letter-spacing: -0.5px;
        }

        .navbar-brand span {
            background: linear-gradient(45deg, #fff, #ccc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            color: var(--text-light) !important;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            font-weight: 500;
            position: relative;
            margin: 0 0.25rem;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--text-light);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--text-light) !important;
        }

        .nav-link .bi {
            margin-right: 0.5rem;
            font-size: 1.1rem;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(45deg, #fff, #ccc);
            color: var(--text-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-right: 0.75rem;
            transition: transform 0.3s ease;
        }

        .user-avatar:hover {
            transform: scale(1.1);
        }

        .dropdown-menu {
            background-color: var(--nav-bg);
            backdrop-filter: var(--nav-blur);
            -webkit-backdrop-filter: var(--nav-blur);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 0.75rem;
            padding: 0.5rem;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            color: var(--text-light);
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--text-light);
        }

        .dropdown-divider {
            border-color: rgba(255, 255, 255, 0.1);
            margin: 0.5rem 0;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            color: var(--text-light);
            transition: transform 0.3s ease;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler:hover {
            transform: rotate(90deg);
        }

        @media (max-width: 991.98px) {
            .navbar {
                padding: 0 1rem;
            }

            .navbar-collapse {
                position: absolute;
                top: var(--nav-height);
                left: 0;
                right: 0;
                margin: 0 1rem;
                background-color: var(--nav-bg);
                backdrop-filter: var(--nav-blur);
                -webkit-backdrop-filter: var(--nav-blur);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 0.75rem;
                padding: 1rem;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            }

            .navbar-nav {
                padding: 0.5rem 0;
            }

            .nav-link {
                padding: 0.75rem 1rem;
                margin: 0.25rem 0;
            }

            .user-avatar {
                margin: 0.5rem 0;
            }

            .dropdown-menu {
                background-color: transparent;
                border: none;
                box-shadow: none;
                padding-left: 1rem;
            }
        }

        .main-content {
            flex: 1;
            padding: 2rem;
        }

        .card {
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
            background-color: var(--card-bg);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px -1px rgba(0, 0, 0, 0.4);
        }

        .card-body {
            padding: 1.5rem;
        }

        .form-control {
            background-color: var(--bg-dark);
            border: 1px solid var(--border-color);
            color: var(--text-light);
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
        }

        .form-control:focus {
            background-color: var(--bg-dark);
            border-color: var(--bg-light);
            color: var(--text-light);
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.1);
        }

        .navbar-collapse {
            background-color: var(--bg-dark);
            padding: 1rem;
            border-radius: 0.5rem;
        }

        /* Footer styles */
        footer {
            background-color: var(--footer-bg);
            color: #ffffff;
            padding: 1rem 0;
            margin-top: auto;
            border-top: 1px solid var(--border-color);
        }

        footer a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        footer a:hover {
            color: #cccccc;
        }

        footer .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        footer .social-links a {
            margin-left: 1rem;
            font-size: 1.25rem;
        }

        @media (max-width: 768px) {
            footer .container {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            footer .social-links {
                margin-top: 0.5rem;
            }

            footer .social-links a {
                margin: 0 0.5rem;
            }
        }

        /* Custom scrollbar for Webkit browsers */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-dark);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--text-dark);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand me-5" href="{{ route('dashboard') }}">
                <span>EventO</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('projects*') ? 'active' : '' }}" href="{{ route('projects.index') }}">
                            <i class="bi bi-folder"></i> Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('routines*') ? 'active' : '' }}" href="{{ route('routines.index') }}">
                            <i class="bi bi-calendar-check"></i> Routines
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('notes*') ? 'active' : '' }}" href="{{ route('notes.index') }}">
                            <i class="bi bi-sticky"></i> Notes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('reminders*') ? 'active' : '' }}" href="{{ route('reminders.index') }}">
                            <i class="bi bi-bell"></i> Reminders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('files*') ? 'active' : '' }}" href="{{ route('files.index') }}">
                            <i class="bi bi-file"></i> Files
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center ms-5">
                    @auth
                        <div class="user-avatar me-2">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="main-content">
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="copyright">
                &copy; {{ date('Y') }} EventO. All rights reserved.
            </div>
            <div class="social-links">
                <a href="#" title="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" title="Twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" title="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        function updateDateTime() {
            const now = new Date();
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            document.getElementById('currentDateTime').textContent = now.toLocaleDateString('en-US', options);
        }
        updateDateTime();
        setInterval(updateDateTime, 60000);
    </script>
</body>

</html>
