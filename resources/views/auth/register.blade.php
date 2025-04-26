@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Left side with background image and welcome text -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center position-relative">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('{{ asset('assets/img/study.jpg') }}') center/cover no-repeat;"></div>
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-75"></div>
            <div class="text-center p-5 position-relative z-1">
                <h1 class="display-4 fw-bold mb-4 text-white">Join EventO</h1>
                <p class="lead text-light">Create your account and start managing events</p>
            </div>
        </div>

        <!-- Right side with registration form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="w-100 p-4" style="max-width: 400px;">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Create Account</h2>
                    <p class="text-muted">Fill in your details to get started</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                    @csrf
                    
                    <div class="mb-4">
                        <label for="name" class="form-label">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 @error('name') is-invalid @enderror" 
                                id="name" name="name" value="{{ old('name') }}" required autofocus
                                placeholder="Enter your full name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                id="email" name="email" value="{{ old('email') }}" required
                                placeholder="Enter your email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" 
                                id="password" name="password" required placeholder="Create a password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Must be at least 8 characters long</small>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="bi bi-lock-fill"></i>
                            </span>
                            <input type="password" class="form-control border-start-0" 
                                id="password_confirmation" name="password_confirmation" required 
                                placeholder="Confirm your password">
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and 
                                <a href="#" class="text-decoration-none">Privacy Policy</a>
                            </label>
                        </div>
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-person-plus me-2"></i> Create Account
                        </button>
                    </div>

                    <div class="text-center">
                        <p class="mb-0">Already have an account? 
                            <a href="{{ route('login') }}" class="text-decoration-none fw-bold">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </a>
                        </p>
                    </div>

                    <div class="mt-4">
                        <div class="d-flex align-items-center mb-3">
                            <hr class="flex-grow-1">
                            <span class="mx-3 text-muted">or sign up with</span>
                            <hr class="flex-grow-1">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-outline-dark">
                                <i class="bi bi-google me-2"></i> Google
                            </button>
                            <button type="button" class="btn btn-outline-dark">
                                <i class="bi bi-github me-2"></i> GitHub
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
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
</style>
@endsection 