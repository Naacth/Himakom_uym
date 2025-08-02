@extends('layout')
@section('title', 'Edit Event | Admin')
@section('content')

<!-- Admin Header -->
<div class="admin-header bg-primary text-white py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-6 fw-bold mb-2">
                    <i class="bi bi-pencil-square me-3"></i>Edit Event
                </h1>
                <p class="lead mb-0">Perbarui informasi event "{{ $event->title }}"</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('events.index') }}" class="btn btn-light btn-lg rounded-pill">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Form Section -->
<div class="form-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card bg-white rounded-4 shadow-lg p-5">
                    <div class="form-header text-center mb-4">
                        <div class="form-icon mb-3">
                            <i class="bi bi-calendar-event text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h3 class="fw-bold text-primary mb-2">Form Edit Event</h3>
                        <p class="text-muted">Perbarui informasi event yang dipilih</p>
                    </div>

                    <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
                        
                        <!-- Event Title -->
                        <div class="form-group mb-4">
                            <label for="title" class="form-label fw-semibold">
                                <i class="bi bi-calendar-event text-primary me-2"></i>Judul Event
                            </label>
                            <input type="text" 
                                   name="title" 
                                   id="title"
                                   class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                   placeholder="Masukkan judul event"
                                   value="{{ old('title', $event->title) }}"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Event Date -->
                        <div class="form-group mb-4">
                            <label for="date" class="form-label fw-semibold">
                                <i class="bi bi-calendar-date text-primary me-2"></i>Tanggal Event
                            </label>
                            <input type="date" 
                                   name="date" 
                                   id="date"
                                   class="form-control form-control-lg @error('date') is-invalid @enderror" 
                                   value="{{ old('date', $event->date) }}"
                                   required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Google Form Link -->
                        <div class="form-group mb-4">
                            <label for="google_form_link" class="form-label fw-semibold">
                                <i class="bi bi-link-45deg text-success me-2"></i>Link Google Form Pendaftaran
                                <span class="text-muted small">(Opsional, contoh: https://forms.gle/xxxx)</span>
                            </label>
                            <input type="url" 
                                   name="google_form_link" 
                                   id="google_form_link"
                                   class="form-control form-control-lg"
                                   placeholder="Masukkan link Google Form untuk pendaftaran event"
                                   value="{{ old('google_form_link', $event->google_form_link) }}">
                        </div>

                        <!-- Event Location -->
                        <div class="form-group mb-4">
                            <label for="location" class="form-label fw-semibold">
                                <i class="bi bi-geo-alt text-primary me-2"></i>Lokasi Event
                                <span class="text-muted small">(Opsional)</span>
                            </label>
                            <input type="text" 
                                   name="location" 
                                   id="location"
                                   class="form-control form-control-lg @error('location') is-invalid @enderror" 
                                   placeholder="Contoh: Aula Kampus, Ruang Lab, Auditorium"
                                   value="{{ old('location', $event->location) }}">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Event Image -->
                        <div class="form-group mb-4">
                            <label for="image" class="form-label fw-semibold">
                                <i class="bi bi-image text-primary me-2"></i>Gambar Event
                                <span class="text-muted small">(Opsional)</span>
                            </label>
                            <div class="image-upload-container">
                                <input type="file" 
                                       name="image" 
                                       id="image"
                                       class="form-control form-control-lg @error('image') is-invalid @enderror" 
                                       accept="image/*"
                                       onchange="previewImage(this)">
                                
                                <!-- Current Image Preview -->
                                @if($event->image)
                                <div class="current-image-preview mt-3">
                                    <h6 class="fw-semibold text-primary mb-2">
                                        <i class="bi bi-image me-2"></i>Gambar Saat Ini
                                    </h6>
                                    <div class="current-image-container">
                                        <img src="{{ asset('storage/'.$event->image) }}" 
                                             class="img-fluid rounded-3 shadow-sm" 
                                             style="max-height: 200px;"
                                             alt="{{ $event->title }}">
                                        <div class="current-image-overlay">
                                            <span class="badge bg-primary">Gambar Saat Ini</span>
                                        </div>
                                    </div>
                                    <p class="text-muted small mt-2">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Upload gambar baru untuk mengganti gambar saat ini
                                    </p>
                                </div>
                                @endif
                                
                                <!-- New Image Preview -->
                                <div class="image-preview mt-3" id="imagePreview" style="display: none;">
                                    <h6 class="fw-semibold text-success mb-2">
                                        <i class="bi bi-eye me-2"></i>Preview Gambar Baru
                                    </h6>
                                    <img id="previewImg" class="img-fluid rounded-3 shadow-sm" style="max-height: 200px;">
                                </div>
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Event Description -->
                        <div class="form-group mb-4">
                            <label for="description" class="form-label fw-semibold">
                                <i class="bi bi-text-paragraph text-primary me-2"></i>Deskripsi Event
                            </label>
                            <textarea name="description" 
                                      id="description"
                                      class="form-control @error('description') is-invalid @enderror" 
                                      rows="5"
                                      placeholder="Jelaskan detail event, tujuan, dan informasi penting lainnya..."
                                      required>{{ old('description', $event->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 me-3">
                                <i class="bi bi-check-circle me-2"></i>Update Event
                            </button>
                            <a href="{{ route('events.index') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-5">
                                <i class="bi bi-x-circle me-2"></i>Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Event Info Section -->
<div class="event-info-section py-5" style="background: #f8f9fa;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold text-primary mb-3">Informasi Event</h2>
            <p class="lead text-muted">Detail lengkap event yang sedang diedit</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="info-card bg-white rounded-4 p-4 shadow-lg">
                    <h4 class="fw-bold text-primary mb-3">
                        <i class="bi bi-info-circle me-2"></i>Detail Event
                    </h4>
                    <div class="info-item mb-3">
                        <strong>Judul:</strong> {{ $event->title }}
                    </div>
                    <div class="info-item mb-3">
                        <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}
                    </div>
                    <div class="info-item mb-3">
                        <strong>Lokasi:</strong> {{ $event->location ?? 'Tidak ditentukan' }}
                    </div>
                    <div class="info-item mb-3">
                        <strong>Status:</strong> 
                        @if($event->date >= now())
                            <span class="badge bg-success">Mendatang</span>
                        @else
                            <span class="badge bg-secondary">Selesai</span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="info-card bg-white rounded-4 p-4 shadow-lg">
                    <h4 class="fw-bold text-primary mb-3">
                        <i class="bi bi-image me-2"></i>Gambar Event
                    </h4>
            @if($event->image)
                        <div class="event-image-display">
                            <img src="{{ asset('storage/'.$event->image) }}" 
                                 class="img-fluid rounded-3 shadow-sm" 
                                 alt="{{ $event->title }}">
                        </div>
                    @else
                        <div class="no-image-placeholder text-center py-4">
                            <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-2">Tidak ada gambar</p>
                        </div>
            @endif
        </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Admin Header */
.admin-header {
    background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%);
}

/* Form Card */
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

/* Form Controls */
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

/* Image Upload */
.image-upload-container {
    border: 2px dashed #dee2e6;
    border-radius: 0.75rem;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
}

.image-upload-container:hover {
    border-color: #1976d2;
    background: rgba(25, 118, 210, 0.05);
}

.current-image-container {
    position: relative;
    display: inline-block;
}

.current-image-overlay {
    position: absolute;
    top: 10px;
    right: 10px;
}

.image-preview {
    border: 1px solid #dee2e6;
    border-radius: 0.5rem;
    padding: 1rem;
    background: #f8f9fa;
}

.no-image-placeholder {
    border: 2px dashed #dee2e6;
    border-radius: 0.5rem;
    background: #f8f9fa;
}

/* Info Cards */
.info-card {
    transition: all 0.3s ease;
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important;
}

.info-item {
    padding: 0.5rem 0;
    border-bottom: 1px solid #f1f3f4;
}

.info-item:last-child {
    border-bottom: none;
}

.event-image-display {
    text-align: center;
}

/* Form Actions */
.form-actions .btn {
    transition: all 0.3s ease;
}

.form-actions .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

/* Responsive Adjustments */
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

<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
    }
}

// Form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>

@endsection
