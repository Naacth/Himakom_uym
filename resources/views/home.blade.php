@extends('layout')
@section('title', 'Home | HIMAKOM UYM')
@section('content')

<!-- Hero Section -->
<div class="hero-section position-relative overflow-hidden" style="background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%); min-height: 100vh; display: flex; align-items: center;">
    <div class="container position-relative z-3">
        <div class="row align-items-center">
            <div class="col-lg-6 text-white">
                <div class="hero-content animate__animated animate__fadeInLeft">
                    <div class="hero-logo mb-4">
                        <div class="">
                            <i class="bi bi-code-slash text-primary" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                    <h1 class="display-3 fw-bold mb-4">
                        Selamat Datang di <span class="text-warning">HIMAKOM</span>
                    </h1>
                    <p class="lead mb-4" style="font-size: 1.3rem; line-height: 1.6;">
                        Himpunan Mahasiswa Ilmu Komputer Universitas Yatsi Madani
                    </p>
                    <p class="mb-5" style="font-size: 1.1rem; opacity: 0.9;">
                        Wadah pengembangan potensi, kreativitas, dan solidaritas mahasiswa Ilmu Komputer yang berkomitmen membangun generasi digital yang inovatif, profesional, dan berdaya saing global.
                    </p>
                    <div class="hero-buttons">
                        <a href="/about" class="btn btn-light btn-lg rounded-pill me-3 mb-3 shadow-sm">
                            <i class="bi bi-info-circle me-2"></i>Tentang Kami
                        </a>
                        <a href="/event" class="btn btn-outline-light btn-lg rounded-pill mb-3 shadow-sm">
                            <i class="bi bi-calendar-event me-2"></i>Lihat Event
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center animate__animated animate__fadeInRight">
                <div class="hero-image-container">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=800&q=80" 
                         class="hero-image rounded-4 shadow-2xl" 
                         style="max-width: 100%; height: auto; border: 4px solid rgba(255,255,255,0.3);">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Animated Background Elements -->
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
        <div class="shape shape-5"></div>
    </div>
</div>

<!-- Stats Section -->
<div class="stats-section py-5" style="background: #f8f9fa;">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="stat-card bg-white rounded-4 shadow-sm p-4">
                    <i class="bi bi-people-fill text-primary display-4 mb-3"></i>
                    <h3 class="fw-bold text-primary mb-2">50+</h3>
                    <p class="text-muted mb-0">Anggota Aktif</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-white rounded-4 shadow-sm p-4">
                    <i class="bi bi-calendar-check text-primary display-4 mb-3"></i>
                    <h3 class="fw-bold text-primary mb-2">5+</h3>
                    <p class="text-muted mb-0">Event Tahunan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-white rounded-4 shadow-sm p-4">
                    <i class="bi bi-trophy text-primary display-4 mb-3"></i>
                    <h3 class="fw-bold text-primary mb-2">5+</h3>
                    <p class="text-muted mb-0">Prestasi</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-white rounded-4 shadow-sm p-4">
                    <i class="bi bi-award text-primary display-4 mb-3"></i>
                    <h3 class="fw-bold text-primary mb-2">2+</h3>
                    <p class="text-muted mb-0">Tahun Berdiri</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Section -->
<div class="about-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="about-content">
                    <h2 class="display-5 fw-bold text-primary mb-4">Tentang HIMAKOM UYM</h2>
                    <p class="lead mb-4">
                        HIMAKOM UYM adalah organisasi mahasiswa yang berdedikasi untuk mengembangkan potensi mahasiswa Ilmu Komputer melalui berbagai kegiatan akademik, sosial, dan profesional.
                    </p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="feature-item d-flex align-items-start">
                                <div class="feature-icon me-3">
                                    <i class="bi bi-bullseye text-primary" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-2">Visi</h5>
                                    <p class="text-muted small">Mewujudkan HIMAKOM sebagai organisasi mahasiswa yang unggul, inovatif, dan berkontribusi aktif dalam pengembangan teknologi informasi.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item d-flex align-items-start">
                                <div class="feature-icon me-3">
                                    <i class="bi bi-lightbulb text-primary" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-2">Misi</h5>
                                    <p class="text-muted small">Mengembangkan potensi dan kreativitas mahasiswa Ilmu Komputer melalui berbagai program dan kegiatan yang inovatif.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image text-center">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80" 
                         class="img-fluid rounded-4 shadow-lg" 
                         alt="HIMAKOM Team">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="features-section py-5" style="background: #f8f9fa;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">Keunggulan HIMAKOM</h2>
            <p class="lead text-muted">Mengapa memilih bergabung dengan HIMAKOM?</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card bg-white rounded-4 shadow-sm h-100 p-4 text-center transition-all">
                    <div class="feature-icon-container mb-4">
                        <i class="bi bi-people-fill text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Komunitas Solid</h4>
                    <p class="text-muted">Lingkungan yang suportif, kekeluargaan, dan kolaboratif untuk semua anggota dengan networking yang luas.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card bg-white rounded-4 shadow-sm h-100 p-4 text-center transition-all">
                    <div class="feature-icon-container mb-4">
                        <i class="bi bi-award-fill text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Pengembangan Diri</h4>
                    <p class="text-muted">Beragam pelatihan, seminar, workshop, dan kompetisi untuk meningkatkan skill dan wawasan teknologi.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card bg-white rounded-4 shadow-sm h-100 p-4 text-center transition-all">
                    <div class="feature-icon-container mb-4">
                        <i class="bi bi-lightning-fill text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Inovasi & Kreativitas</h4>
                    <p class="text-muted">Ruang untuk menuangkan ide kreatif dan inovatif di bidang teknologi informasi dengan dukungan penuh.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="cta-section py-5 text-center" style="background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%);">
    <div class="container">
        <h2 class="display-5 fw-bold text-white mb-4">Bergabunglah dengan HIMAKOM</h2>
        <p class="lead text-white mb-5" style="opacity: 0.9;">
            Mari bersama-sama membangun masa depan teknologi yang lebih baik
        </p>
        <a href="/event" class="btn btn-light btn-lg rounded-pill px-5 py-3 shadow-sm">
            <i class="bi bi-calendar-event me-2"></i>Lihat Event & Kegiatan
        </a>
    </div>
</div>

<!-- Gallery Preview Section -->
<div class="gallery-preview py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">Galeri Kegiatan</h2>
            <p class="lead text-muted">Momen-momen berharga dari berbagai kegiatan HIMAKOM</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="gallery-item rounded-4 overflow-hidden shadow-sm">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=600&q=80" 
                         class="img-fluid w-100" 
                         style="height: 250px; object-fit: cover;" 
                         alt="Kegiatan Akademik">
                    <div class="gallery-overlay p-3 bg-white">
                        <h5 class="fw-bold mb-2">Kegiatan Akademik</h5>
                        <p class="text-muted small mb-0">Seminar, workshop, dan pelatihan untuk meningkatkan kompetensi mahasiswa.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item rounded-4 overflow-hidden shadow-sm">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" 
                         class="img-fluid w-100" 
                         style="height: 250px; object-fit: cover;" 
                         alt="Solidaritas">
                    <div class="gallery-overlay p-3 bg-white">
                        <h5 class="fw-bold mb-2">Solidaritas & Kebersamaan</h5>
                        <p class="text-muted small mb-0">Membangun kekeluargaan dan solidaritas antar anggota.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item rounded-4 overflow-hidden shadow-sm">
                    <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=600&q=80" 
                         class="img-fluid w-100" 
                         style="height: 250px; object-fit: cover;" 
                         alt="Inovasi">
                    <div class="gallery-overlay p-3 bg-white">
                        <h5 class="fw-bold mb-2">Inovasi & Kreativitas</h5>
                        <p class="text-muted small mb-0">Mendukung pengembangan ide kreatif dan inovatif mahasiswa.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="/galeri" class="btn btn-outline-primary btn-lg rounded-pill">
                <i class="bi bi-images me-2"></i>Lihat Galeri Lengkap
            </a>
        </div>
    </div>
</div>

<style>
/* Hero Section Styles */
.hero-section {
    position: relative;
    overflow: hidden;
}

.z-3 {
    z-index: 3;
}

/* Floating Shapes Animation */
.floating-shapes {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 1;
}

.shape {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

.shape-1 {
    width: 80px;
    height: 80px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.shape-2 {
    width: 120px;
    height: 120px;
    top: 60%;
    right: 10%;
    animation-delay: 2s;
}

.shape-3 {
    width: 60px;
    height: 60px;
    top: 40%;
    left: 80%;
    animation-delay: 4s;
}

.shape-4 {
    width: 100px;
    height: 100px;
    bottom: 20%;
    left: 20%;
    animation-delay: 1s;
}

.shape-5 {
    width: 70px;
    height: 70px;
    top: 80%;
    right: 30%;
    animation-delay: 3s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

/* Hero Image */
.hero-image-container {
    position: relative;
}

.hero-image {
    transition: transform 0.3s ease;
}

.hero-image:hover {
    transform: scale(1.05);
}

/* Stats Cards */
.stat-card {
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}

/* Feature Cards */
.feature-card {
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(25, 118, 210, 0.15) !important;
}

.feature-icon-container {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.feature-icon-container i {
    color: white !important;
    font-size: 2rem !important;
}

/* Gallery Items */
.gallery-item {
    transition: all 0.3s ease;
    position: relative;
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
}

.gallery-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
    transform: translateY(0);
}

/* Button Styles */
.btn-light {
    background: rgba(255, 255, 255, 0.9);
    border: none;
    transition: all 0.3s ease;
}

.btn-light:hover {
    background: #fff;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3);
}

.btn-outline-light {
    border-color: rgba(255, 255, 255, 0.8);
    transition: all 0.3s ease;
}

.btn-outline-light:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: #fff;
    transform: translateY(-2px);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .hero-section {
        min-height: 80vh;
    }
    
    .display-3 {
        font-size: 2.5rem;
    }
    
    .display-5 {
        font-size: 2rem;
    }
    
    .hero-buttons .btn {
        display: block;
        width: 100%;
        margin-bottom: 1rem;
    }
}

/* Animation Classes */
.animate__fadeInLeft {
    animation-duration: 0.8s;
}

.animate__fadeInRight {
    animation-duration: 0.8s;
}

.transition-all {
    transition: all 0.3s ease;
}
</style>

@endsection 