@extends('layout')
@section('title', 'Register | HIMAKOM UYM')
@section('content')

<div class="auth-section py-5" style="background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%); min-height: 100vh; display: flex; align-items: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="auth-card bg-white rounded-4 shadow-lg p-5">
                    <div class="text-center mb-4">
                        <div class="auth-icon mb-3">
                            <i class="bi bi-person-plus text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h2 class="fw-bold text-primary mb-2">Daftar</h2>
                        <p class="text-muted">Buat akun baru di HIMAKOM</p>
                    </div>

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

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label fw-semibold">
                                        <i class="bi bi-person text-primary me-2"></i>Nama Lengkap
                                    </label>
                                    <input type="text" 
                                           name="name" 
                                           id="name"
                                           class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                           value="{{ old('name') }}"
                                           placeholder="Masukkan nama lengkap"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label fw-semibold">
                                        <i class="bi bi-envelope text-primary me-2"></i>Email
                                    </label>
                                    <input type="email" 
                                           name="email" 
                                           id="email"
                                           class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                           value="{{ old('email') }}"
                                           placeholder="Masukkan email"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label fw-semibold">
                                        <i class="bi bi-lock text-primary me-2"></i>Password
                                    </label>
                                    <input type="password" 
                                           name="password" 
                                           id="password"
                                           class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                           placeholder="Minimal 8 karakter"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password_confirmation" class="form-label fw-semibold">
                                        <i class="bi bi-lock-fill text-primary me-2"></i>Konfirmasi Password
                                    </label>
                                    <input type="password" 
                                           name="password_confirmation" 
                                           id="password_confirmation"
                                           class="form-control form-control-lg" 
                                           placeholder="Ulangi password"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nim" class="form-label fw-semibold">
                                        <i class="bi bi-card-text text-primary me-2"></i>NIM
                                        <span class="text-muted small">(Opsional)</span>
                                    </label>
                                    <input type="text" 
                                           name="nim" 
                                           id="nim"
                                           class="form-control form-control-lg @error('nim') is-invalid @enderror" 
                                           value="{{ old('nim') }}"
                                           placeholder="Masukkan NIM jika mahasiswa UYM">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="kelas" class="form-label fw-semibold">
                                        <i class="bi bi-people text-primary me-2"></i>Kelas
                                        <span class="text-muted small">(Opsional)</span>
                                    </label>
                                    <input type="text" 
                                           name="kelas" 
                                           id="kelas"
                                           class="form-control form-control-lg @error('kelas') is-invalid @enderror" 
                                           value="{{ old('kelas') }}"
                                           placeholder="Contoh: TI-3A">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label fw-semibold">
                                        <i class="bi bi-telephone text-primary me-2"></i>No. WhatsApp
                                        <span class="text-muted small">(Opsional)</span>
                                    </label>
                                    <input type="text" 
                                           name="phone" 
                                           id="phone"
                                           class="form-control form-control-lg @error('phone') is-invalid @enderror" 
                                           value="{{ old('phone') }}"
                                           placeholder="Contoh: 081234567890">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="address" class="form-label fw-semibold">
                                        <i class="bi bi-geo-alt text-primary me-2"></i>Alamat
                                        <span class="text-muted small">(Opsional)</span>
                                    </label>
                                    <textarea name="address" 
                                              id="address"
                                              class="form-control @error('address') is-invalid @enderror" 
                                              rows="3"
                                              placeholder="Masukkan alamat lengkap">{{ old('address') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill mb-3">
                            <i class="bi bi-person-plus me-2"></i>Daftar
                        </button>

                        <div class="text-center">
                            <p class="text-muted mb-0">
                                Sudah punya akun? 
                                <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">
                                    Login di sini
                                </a>
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

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}
</style>

@endsection 