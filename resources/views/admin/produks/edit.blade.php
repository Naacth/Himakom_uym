@extends('layout')
@section('title', 'Edit Produk | Admin')
@section('content')

<div class="admin-header bg-primary text-white py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-6 fw-bold mb-2">
                    <i class="bi bi-pencil-square me-3"></i>Edit Produk
                </h1>
                <p class="lead mb-0">Perbarui informasi produk "{{ $produk->name }}"</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('produks.index') }}" class="btn btn-light btn-lg rounded-pill">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<div class="form-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card bg-white rounded-4 shadow-lg p-5">
                    <div class="form-header text-center mb-4">
                        <div class="form-icon mb-3">
                            <i class="bi bi-box-seam text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h3 class="fw-bold text-primary mb-2">Form Edit Produk</h3>
                        <p class="text-muted">Perbarui informasi produk yang dipilih</p>
                    </div>

                    <form action="{{ route('produks.update', $produk) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-4">
                            <label for="name" class="form-label fw-semibold">
                                <i class="bi bi-box-seam text-primary me-2"></i>Nama Produk
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   class="form-control form-control-lg" 
                                   value="{{ $produk->name }}"
                                   required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="image" class="form-label fw-semibold">
                                <i class="bi bi-image text-primary me-2"></i>Gambar Produk
                                <span class="text-muted small">(Opsional)</span>
                            </label>
                            <input type="file" 
                                   name="image" 
                                   id="image"
                                   class="form-control form-control-lg" 
                                   accept="image/*">
                            @if($produk->image)
                                <div class="mt-3">
                                    <h6 class="fw-semibold text-primary mb-2">
                                        <i class="bi bi-image me-2"></i>Gambar Saat Ini
                                    </h6>
                                    <img src="{{ asset('storage/'.$produk->image) }}" 
                                         class="img-fluid rounded-3 shadow-sm" 
                                         style="max-height: 200px;"
                                         alt="{{ $produk->name }}">
                                </div>
                            @endif
                        </div>

                        <div class="form-group mb-4">
                            <label for="price" class="form-label fw-semibold">
                                <i class="bi bi-tag text-primary me-2"></i>Harga
                                <span class="text-muted small">(Opsional)</span>
                            </label>
                            <input type="number" 
                                   name="price" 
                                   id="price"
                                   class="form-control form-control-lg" 
                                   min="0"
                                   value="{{ $produk->price }}"
                                   placeholder="Masukkan harga produk">
                        </div>

                        <div class="form-group mb-4">
                            <label for="whatsapp_link" class="form-label fw-semibold">
                                <i class="bi bi-whatsapp text-success me-2"></i>Link WhatsApp Produk
                                <span class="text-muted small">(Contoh: https://wa.me/6281234567890)</span>
                            </label>
                            <input type="url" 
                                   name="whatsapp_link" 
                                   id="whatsapp_link"
                                   class="form-control form-control-lg" 
                                   placeholder="Masukkan link WhatsApp untuk pemesanan produk"
                                   value="{{ $produk->whatsapp_link }}">
                        </div>

                        <div class="form-group mb-4">
                            <label for="description" class="form-label fw-semibold">
                                <i class="bi bi-text-paragraph text-primary me-2"></i>Deskripsi Produk
                            </label>
                            <textarea name="description" 
                                      id="description"
                                      class="form-control" 
                                      rows="4"
                                      placeholder="Jelaskan detail produk, fitur, dan manfaatnya...">{{ $produk->description }}</textarea>
                        </div>

                        <!-- Product Features Section -->
                        <div class="features-section mb-4">
                            <h5 class="fw-bold text-primary mb-3">
                                <i class="bi bi-gear text-primary me-2"></i>Fitur Produk
                            </h5>
                            
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="quality_guaranteed" id="quality_guaranteed" value="1" {{ $produk->quality_guaranteed ? 'checked' : '' }}>
                                        <label class="form-check-label fw-semibold" for="quality_guaranteed">
                                            <i class="bi bi-shield-check text-success me-2"></i>Kualitas Terjamin
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="periodic_support" id="periodic_support" value="1" {{ $produk->periodic_support ? 'checked' : '' }}>
                                        <label class="form-check-label fw-semibold" for="periodic_support">
                                            <i class="bi bi-calendar-check text-info me-2"></i>Support Berkala
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="support_24_7" id="support_24_7" value="1" {{ $produk->support_24_7 ? 'checked' : '' }}>
                                        <label class="form-check-label fw-semibold" for="support_24_7">
                                            <i class="bi bi-clock text-warning me-2"></i>24/7 Support
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="features" class="form-label fw-semibold">
                                <i class="bi bi-list-check text-primary me-2"></i>Fitur Tambahan
                                <span class="text-muted small">(Opsional)</span>
                            </label>
                            <textarea name="features" 
                                      id="features"
                                      class="form-control" 
                                      rows="3"
                                      placeholder="Tambahkan fitur-fitur khusus produk ini...">{{ $produk->features }}</textarea>
                        </div>

                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 me-3">
                                <i class="bi bi-check-circle me-2"></i>Update Produk
                            </button>
                            <a href="{{ route('produks.index') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-5">
                                <i class="bi bi-x-circle me-2"></i>Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.admin-header {
    background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%);
}

.form-card {
    transition: all 0.3s ease;
}

.form-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}

.form-icon {
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

.features-section {
    background: #f8f9fa;
    border-radius: 0.75rem;
    padding: 1.5rem;
    border: 2px solid #e9ecef;
}

.form-actions .btn {
    transition: all 0.3s ease;
}

.form-actions .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

@media (max-width: 768px) {
    .admin-header {
        text-align: center;
    }
    
    .form-actions {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .form-actions .btn {
        width: 100%;
    }
}
</style>

@endsection
