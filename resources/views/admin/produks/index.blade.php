@extends('layout')
@section('title', 'Kelola Produk | Admin')
@section('content')

<div class="admin-header bg-primary text-white py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-6 fw-bold mb-2">
                    <i class="bi bi-box-seam me-3"></i>Kelola Produk
                </h1>
                <p class="lead mb-0">Kelola semua produk dan layanan HIMAKOM</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('produks.create') }}" class="btn btn-light btn-lg rounded-pill">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Produk
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

        <!-- Quick Stats -->
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card bg-white rounded-4 p-4 shadow-lg text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-box-seam text-primary" style="font-size: 2.5rem;"></i>
                    </div>
                    <h3 class="fw-bold text-primary mb-2">{{ $produks->count() }}</h3>
                    <p class="text-muted mb-0">Total Produk</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card bg-white rounded-4 p-4 shadow-lg text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-shield-check text-success" style="font-size: 2.5rem;"></i>
                    </div>
                    <h3 class="fw-bold text-success mb-2">{{ $produks->where('quality_guaranteed', true)->count() }}</h3>
                    <p class="text-muted mb-0">Kualitas Terjamin</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card bg-white rounded-4 p-4 shadow-lg text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-calendar-check text-info" style="font-size: 2.5rem;"></i>
                    </div>
                    <h3 class="fw-bold text-info mb-2">{{ $produks->where('periodic_support', true)->count() }}</h3>
                    <p class="text-muted mb-0">Support Berkala</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card bg-white rounded-4 p-4 shadow-lg text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-clock text-warning" style="font-size: 2.5rem;"></i>
                    </div>
                    <h3 class="fw-bold text-warning mb-2">{{ $produks->where('support_24_7', true)->count() }}</h3>
                    <p class="text-muted mb-0">24/7 Support</p>
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="products-table-card bg-white rounded-4 shadow-lg overflow-hidden">
            <div class="table-header bg-light p-4">
                <h4 class="fw-bold text-primary mb-0">
                    <i class="bi bi-list-ul me-2"></i>Daftar Produk
                </h4>
            </div>
            
            @if($produks->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th class="fw-semibold">#</th>
                                <th class="fw-semibold">
                                    <i class="bi bi-box-seam me-2"></i>Produk
                                </th>
                                <th class="fw-semibold">
                                    <i class="bi bi-image me-2"></i>Gambar
                                </th>
                                <th class="fw-semibold">
                                    <i class="bi bi-tag me-2"></i>Harga
                                </th>
                                <th class="fw-semibold">
                                    <i class="bi bi-gear me-2"></i>Fitur
                                </th>
                                <th class="fw-semibold text-center">
                                    <i class="bi bi-gear me-2"></i>Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produks as $produk)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">
                                    <div>
                                        <h6 class="fw-bold text-primary mb-1">{{ $produk->name }}</h6>
                                        <p class="text-muted small mb-0">{{ Str::limit($produk->description, 60) }}</p>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    @if($produk->image)
                                        <img src="{{ asset('storage/'.$produk->image) }}" 
                                             width="60" 
                                             height="60"
                                             class="rounded-3 shadow-sm"
                                             style="object-fit: cover;"
                                             alt="{{ $produk->name }}">
                                    @else
                                        <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" 
                                             style="width: 60px; height: 60px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if($produk->price)
                                        <span class="badge bg-success rounded-pill">
                                            Rp {{ number_format($produk->price,0,',','.') }}
                                        </span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex flex-wrap gap-1">
                                        @if($produk->quality_guaranteed)
                                            <span class="badge bg-success" title="Kualitas Terjamin">
                                                <i class="bi bi-shield-check me-1"></i>Kualitas
                                            </span>
                                        @endif
                                        @if($produk->periodic_support)
                                            <span class="badge bg-info" title="Support Berkala">
                                                <i class="bi bi-calendar-check me-1"></i>Berkala
                                            </span>
                                        @endif
                                        @if($produk->support_24_7)
                                            <span class="badge bg-warning" title="24/7 Support">
                                                <i class="bi bi-clock me-1"></i>24/7
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('produks.edit', $produk) }}" 
                                           class="btn btn-warning btn-sm rounded-pill me-2">
                                            <i class="bi bi-pencil me-1"></i>Edit
                                        </a>
                                        <form action="{{ route('produks.destroy', $produk) }}" 
                                              method="POST" 
                                              class="d-inline" 
                                              onsubmit="return confirm('Yakin hapus produk ini?')">
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
                    <i class="bi bi-box-seam text-muted" style="font-size: 4rem;"></i>
                    <h5 class="text-muted mt-3">Belum ada produk</h5>
                    <p class="text-muted">Mulai dengan menambahkan produk pertama.</p>
                    <a href="{{ route('produks.create') }}" class="btn btn-primary rounded-pill">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Produk Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.admin-header {
    background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%);
}

.stat-card {
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important;
}

.stat-icon {
    width: 60px;
    height: 60px;
    background: rgba(25, 118, 210, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.products-table-card {
    transition: all 0.3s ease;
}

.products-table-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}

.table-header {
    border-bottom: 2px solid #e9ecef;
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

@media (max-width: 768px) {
    .admin-header {
        text-align: center;
    }
    
    .btn-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .btn-group .btn {
        width: 100%;
    }
}
</style>

@endsection
