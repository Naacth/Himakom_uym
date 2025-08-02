@extends('layout')
@section('title', 'Admin Login | HIMAKOM UYM')
@section('content')

<div class="auth-section py-5" style="background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%); min-height: 100vh; display: flex; align-items: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="auth-card bg-white rounded-4 shadow-lg p-5">
                    <div class="text-center mb-4">
                        <div class="auth-icon mb-3">
                            <i class="bi bi-shield-lock text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h2 class="fw-bold text-primary mb-2">Admin Login</h2>
                        <p class="text-muted">Masuk ke panel admin HIMAKOM</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="username" class="form-label fw-semibold">
                                <i class="bi bi-person text-primary me-2"></i>Username
                            </label>
                            <input type="text" 
                                   name="username" 
                                   id="username"
                                   class="form-control form-control-lg @error('username') is-invalid @enderror" 
                                   value="{{ old('username') }}"
                                   placeholder="Masukkan username"
                                   required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="password" class="form-label fw-semibold">
                                <i class="bi bi-lock text-primary me-2"></i>Password
                            </label>
                            <input type="password" 
                                   name="password" 
                                   id="password"
                                   class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   placeholder="Masukkan password"
                                   required>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill mb-3">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Login Admin
                        </button>

                        <div class="text-center">
                            <p class="text-muted mb-0">
                                <small>
                                    <i class="bi bi-info-circle me-1"></i>
                                    Akses khusus untuk admin HIMAKOM
                                </small>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.auth-card {
    transition: all 0.3s ease;
}

.auth-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}

.auth-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin: 0 auto;
}

.form-control {
    border: 2px solid #e9ecef;
    border-radius: 0.75rem;
    transition: all 0.3s ease;
    padding: 0.75rem 1rem;
}

.form-control:focus {
    border-color: #1976d2;
    box-shadow: 0 0 0 0.2rem rgba(25, 118, 210, 0.25);
}

.form-control-lg {
    font-size: 1rem;
}

.form-check-input:checked {
    background-color: #1976d2;
    border-color: #1976d2;
}

.form-check-input:focus {
    border-color: #1976d2;
    box-shadow: 0 0 0 0.2rem rgba(25, 118, 210, 0.25);
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}
</style>

@endsection 