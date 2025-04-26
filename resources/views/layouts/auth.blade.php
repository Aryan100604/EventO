<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') | EventO </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
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
        }

        body {
            background-color: var(--bg-dark);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            color: var(--text-light);
            display: flex;
            flex-direction: column;
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

        .form-control:focus, .form-select:focus {
            box-shadow: none;
            border-color: #dee2e6;
        }
        
        .input-group-text {
            color: #6c757d;
        }
        
        .btn-outline-dark:hover {
            background-color: #212529;
            color: #fff;
        }

        .form-check-input:checked {
            background-color: #000;
            border-color: #000;
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

        /* Footer styles */
        .auth-footer {
            background-color: var(--footer-bg);
            color: #ffffff;
            padding: 1rem 0;
            margin-top: auto;
            border-top: 1px solid var(--border-color);
        }

        .auth-footer a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .auth-footer a:hover {
            color: #cccccc;
        }

        .auth-footer .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .auth-footer .social-links a {
            margin-left: 1rem;
            font-size: 1.25rem;
        }

        @media (max-width: 768px) {
            .auth-footer .container {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .auth-footer .social-links {
                margin-top: 0.5rem;
            }

            .auth-footer .social-links a {
                margin: 0 0.5rem;
            }
        }
    </style>
</head>

<body>
    @yield('content')

    <footer class="auth-footer">
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
</body>

</html> 