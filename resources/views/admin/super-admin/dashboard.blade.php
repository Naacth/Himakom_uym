@extends('layout')
@section('title', 'Super Admin Dashboard | HIMAKOM UYM')
@section('content')

<div class="admin-header bg-primary text-white py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-6 fw-bold mb-2">
                    <i class="bi bi-shield-lock me-3"></i>Super Admin Dashboard
                </h1>
                <p class="lead mb-0">Kelola akun admin HIMAKOM</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('admin-dashboard') }}" class="btn btn-light btn-lg rounded-pill">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content-section py-5">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-4" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Quick Stats -->
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card bg-white rounded-4 p-4 shadow-lg text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-shield-lock text-primary" style="font-size: 2.5rem;"></i>
                    </div>
                    <h3 class="fw-bold text-primary mb-2">{{ $admins->count() }}</h3>
                    <p class="text-muted mb-0">Total Admin</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card bg-white rounded-4 p-4 shadow-lg text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-check-circle text-success" style="font-size: 2.5rem;"></i>
                    </div>
                    <h3 class="fw-bold text-success mb-2">{{ $admins->where('is_active', true)->count() }}</h3>
                    <p class="text-muted mb-0">Admin Aktif</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card bg-white rounded-4 p-4 shadow-lg text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-x-circle text-danger" style="font-size: 2.5rem;"></i>
                    </div>
                    <h3 class="fw-bold text-danger mb-2">{{ $admins->where('is_active', false)->count() }}</h3>
                    <p class="text-muted mb-0">Admin Nonaktif</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card bg-white rounded-4 p-4 shadow-lg text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-gear text-warning" style="font-size: 2.5rem;"></i>
                    </div>
                    <h3 class="fw-bold text-warning mb-2">Super Admin</h3>
                    <p class="text-muted mb-0">Akses Penuh</p>
                </div>
            </div>
        </div>

        <!-- Add New Admin -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card bg-white rounded-4 shadow-lg">
                    <div class="card-header bg-light border-0 rounded-top-4">
                        <h4 class="fw-bold text-primary mb-0">
                            <i class="bi bi-person-plus me-2"></i>Tambah Admin Baru
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.super-admin.create') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="username" class="form-label fw-semibold">
                                        <i class="bi bi-person text-primary me-2"></i>Username
                                    </label>
                                    <input type="text" 
                                           name="username" 
                                           id="username"
                                           class="form-control @error('username') is-invalid @enderror" 
                                           value="{{ old('username') }}"
                                           placeholder="Masukkan username"
                                           required>
                                </div>
                                <div class="col-md-3">
                                    <label for="name" class="form-label fw-semibold">
                                        <i class="bi bi-person-badge text-primary me-2"></i>Nama Lengkap
                                    </label>
                                    <input type="text" 
                                           name="name" 
                                           id="name"
                                           class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name') }}"
                                           placeholder="Masukkan nama lengkap"
                                           required>
                                </div>
                                <div class="col-md-3">
                                    <label for="email" class="form-label fw-semibold">
                                        <i class="bi bi-envelope text-primary me-2"></i>Email
                                    </label>
                                    <input type="email" 
                                           name="email" 
                                           id="email"
                                           class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email') }}"
                                           placeholder="Masukkan email"
                                           required>
                                </div>
                                <div class="col-md-3">
                                    <label for="password" class="form-label fw-semibold">
                                        <i class="bi bi-lock text-primary me-2"></i>Password
                                    </label>
                                    <input type="password" 
                                           name="password" 
                                           id="password"
                                           class="form-control @error('password') is-invalid @enderror" 
                                           placeholder="Minimal 8 karakter"
                                           required>
                                </div>
                                <div class="col-md-3">
                                    <label for="password_confirmation" class="form-label fw-semibold">
                                        <i class="bi bi-lock-fill text-primary me-2"></i>Konfirmasi Password
                                    </label>
                                    <input type="password" 
                                           name="password_confirmation" 
                                           id="password_confirmation"
                                           class="form-control" 
                                           placeholder="Ulangi password"
                                           required>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill w-100">
                                        <i class="bi bi-plus-circle me-2"></i>Tambah Admin
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin List -->
        <div class="row">
            <div class="col-12">
                <div class="card bg-white rounded-4 shadow-lg">
                    <div class="card-header bg-light border-0 rounded-top-4">
                        <h4 class="fw-bold text-primary mb-0">
                            <i class="bi bi-list-ul me-2"></i>Daftar Admin
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        @if($admins->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="fw-semibold">#</th>
                                            <th class="fw-semibold">
                                                <i class="bi bi-person me-2"></i>Admin
                                            </th>
                                            <th class="fw-semibold">
                                                <i class="bi bi-envelope me-2"></i>Email
                                            </th>
                                            <th class="fw-semibold">
                                                <i class="bi bi-shield me-2"></i>Status
                                            </th>
                                            <th class="fw-semibold text-center">
                                                <i class="bi bi-gear me-2"></i>Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admins as $admin)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">
                                                <div>
                                                    <h6 class="fw-bold text-primary mb-1">{{ $admin->name }}</h6>
                                                    <small class="text-muted">@{{ $admin->username }}</small>
                                                </div>
                                            </td>
                                            <td class="align-middle">{{ $admin->email }}</td>
                                            <td class="align-middle">
                                                @if($admin->is_active)
                                                    <span class="badge bg-success rounded-pill">
                                                        <i class="bi bi-check-circle me-1"></i>Aktif
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger rounded-pill">
                                                        <i class="bi bi-x-circle me-1"></i>Nonaktif
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group" role="group">
                                                    <button type="button" 
                                                            class="btn btn-warning btn-sm rounded-pill me-2"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#editAdminModal{{ $admin->id }}">
                                                        <i class="bi bi-pencil me-1"></i>Edit
                                                    </button>
                                                    <form action="{{ route('admin.super-admin.delete', $admin) }}"
                                                          method="POST"
                                                          class="d-inline"
                                                          onsubmit="return confirm('Yakin hapus admin ini?')">
                                                        @csrf @method('DELETE')
                                                        <button class="btn btn-danger btn-sm rounded-pill">
                                                            <i class="bi bi-trash me-1"></i>Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="bi bi-shield-lock text-muted" style="font-size: 4rem;"></i>
                                <h5 class="text-muted mt-3">Belum ada admin</h5>
                                <p class="text-muted">Mulai dengan menambahkan admin pertama.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Admin Modals -->
@foreach($admins as $admin)
<div class="modal fade" id="editAdminModal{{ $admin->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 bg-primary text-white rounded-top-4">
                <h5 class="modal-title fw-bold">
                    <i class="bi bi-pencil-square me-2"></i>Edit Admin
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('admin.super-admin.update', $admin) }}" method="POST">
                    @csrf @method('PUT')
                    
                    <div class="form-group mb-3">
                        <label for="edit_username_{{ $admin->id }}" class="form-label fw-semibold">
                            <i class="bi bi-person text-primary me-2"></i>Username
                        </label>
                        <input type="text" 
                               name="username" 
                               id="edit_username_{{ $admin->id }}"
                               class="form-control" 
                               value="{{ $admin->username }}"
                               required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="edit_name_{{ $admin->id }}" class="form-label fw-semibold">
                            <i class="bi bi-person-badge text-primary me-2"></i>Nama Lengkap
                        </label>
                        <input type="text" 
                               name="name" 
                               id="edit_name_{{ $admin->id }}"
                               class="form-control" 
                               value="{{ $admin->name }}"
                               required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="edit_email_{{ $admin->id }}" class="form-label fw-semibold">
                            <i class="bi bi-envelope text-primary me-2"></i>Email
                        </label>
                        <input type="email" 
                               name="email" 
                               id="edit_email_{{ $admin->id }}"
                               class="form-control" 
                               value="{{ $admin->email }}"
                               required>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="is_active" id="edit_is_active_{{ $admin->id }}" {{ $admin->is_active ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="edit_is_active_{{ $admin->id }}">
                            <i class="bi bi-check-circle text-success me-2"></i>Admin Aktif
                        </label>
                    </div>

                    <div class="modal-footer border-0 px-0 pb-0">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-2"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-primary rounded-pill">
                            <i class="bi bi-check-circle me-2"></i>Update Admin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<style>
.admin-header { background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%); }
.stat-card { transition: all 0.3s ease; } .stat-card:hover { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important; }
.stat-icon { width: 60px; height: 60px; background: rgba(25, 118, 210, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; }
.card { transition: all 0.3s ease; } .card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important; }
.form-control { border: 2px solid #e9ecef; border-radius: 0.75rem; transition: all 0.3s ease; } .form-control:focus { border-color: #1976d2; box-shadow: 0 0 0 0.2rem rgba(25, 118, 210, 0.25); }
.btn { transition: all 0.3s ease; } .btn:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
@media (max-width: 768px) { .admin-header { text-align: center; } .btn-group { display: flex; flex-direction: column; gap: 0.5rem; } .btn-group .btn { width: 100%; } }
</style>

@endsection 