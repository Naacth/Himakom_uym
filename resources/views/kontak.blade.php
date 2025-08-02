@extends('layout')
@section('title', 'Kontak | HIMAKOM UYM')
@section('content')
@php $kontak = $kontak ?? null; @endphp

<!-- Hero Section -->
<div class="hero-section position-relative overflow-hidden" style="background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%); min-height: 60vh; display: flex; align-items: center;">
    <div class="container position-relative z-3">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="hero-content text-white">
                    <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInUp">
                        <i class="bi bi-envelope-fill me-3"></i>Hubungi Kami
                    </h1>
                    <p class="lead mb-4 animate__animated animate__fadeInUp animate__delay-1s" style="font-size: 1.3rem;">
                        Mari berkomunikasi dan berkolaborasi bersama HIMAKOM UYM
                    </p>
                    <div class="contact-stats animate__animated animate__fadeInUp animate__delay-2s">
                        <div class="row justify-content-center">
                            <div class="col-4 col-md-3">
                                <div class="stat-item">
                                    <div class="stat-number fw-bold">24/7</div>
                                    <div class="stat-label">Dukungan</div>
                                </div>
                            </div>
                            <div class="col-4 col-md-3">
                                <div class="stat-item">
                                    <div class="stat-number fw-bold">5+</div>
                                    <div class="stat-label">Platform</div>
                                </div>
                            </div>
                            <div class="col-4 col-md-3">
                                <div class="stat-item">
                                    <div class="stat-number fw-bold">100%</div>
                                    <div class="stat-label">Responsif</div>
                                </div>
                            </div>
                        </div>
                    </div>
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

<!-- Contact Information Section -->
<div class="contact-info-section py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="contact-card bg-white rounded-4 shadow-lg p-5 h-100 animate__animated animate__fadeInLeft">
                    
                    <!-- Social Media Links -->
                    <div class="social-media-section mt-5">
                        <h2 class="fw-bold text-primary mb-3">Ikuti Kami</h2>
                        <div class="social-links d-flex gap-3">
                    @if($kontak && !empty($kontak->instagram))
                                <a href="https://instagram.com/{{ ltrim($kontak->instagram, '@') }}" target="_blank" class="social-link">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            @endif
                            @if($kontak && !empty($kontak->facebook))
                                <a href="{{ $kontak->facebook }}" target="_blank" class="social-link">
                                    <i class="bi bi-facebook"></i>
                                </a>
                    @endif
                    @if($kontak && !empty($kontak->tiktok))
                                <a href="https://tiktok.com/@{{ ltrim($kontak->tiktok, '@') }}" target="_blank" class="social-link">
                                    <i class="bi bi-tiktok"></i>
                                </a>
                    @endif
                    @if($kontak && !empty($kontak->youtube))
                                <a href="{{ $kontak->youtube }}" target="_blank" class="social-link">
                                    <i class="bi bi-youtube"></i>
                                </a>
                    @endif
                    @if($kontak && !empty($kontak->linkedin))
                                <a href="{{ $kontak->linkedin }}" target="_blank" class="social-link">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                    @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="contact-form-card bg-white rounded-4 shadow-lg p-5 h-100 animate__animated animate__fadeInRight">
                    <h2 class="fw-bold text-primary mb-4">
                        <i class="bi bi-chat-dots-fill me-2"></i>Kirim Pesan
                    </h2>
                    
                    <form class="contact-form">
                        <div class="mb-4">
                            <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-lg" id="nama" placeholder="Masukkan nama lengkap Anda" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control form-control-lg" id="email" placeholder="contoh@email.com" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="subject" class="form-label fw-semibold">Subjek</label>
                            <select class="form-select form-select-lg" id="subject" required>
                                <option value="">Pilih subjek</option>
                                <option value="informasi">Informasi Umum</option>
                                <option value="pendaftaran">Pendaftaran Anggota</option>
                                <option value="event">Event & Kegiatan</option>
                                <option value="kerjasama">Kerjasama</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="pesan" class="form-label fw-semibold">Pesan</label>
                            <textarea class="form-control" id="pesan" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-send me-2"></i>Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Map Section -->
<div class="map-section py-5" style="background: #f8f9fa;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">Lokasi Kami</h2>
            <p class="lead text-muted">Kunjungi kampus Universitas Yatsi Madani</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="map-container rounded-4 overflow-hidden shadow-lg">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.234073964837!2d106.6057771!3d-6.178968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ffb2216aa1ad%3A0x7680763e9bfa2659!2sUniversitas%20Yatsi%20Madani!5e0!3m2!1sid!2sid!4v1650000000000!5m2!1sid!2sid" 
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="location-info bg-white rounded-4 p-4 shadow-lg h-100">
                    <h4 class="fw-bold text-primary mb-3">
                        <i class="bi bi-geo-alt-fill me-2"></i>Universitas Yatsi Madani
                    </h4>
                    
                    <div class="location-details">
                        <div class="detail-item mb-3">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <span class="text-muted">Jl. Aria Santika No.40A, RT.005/RW.011, Margasari, Kec. Karawaci, Kota Tangerang, Banten</span>
                        </div>
                        
                        <div class="detail-item mb-3">
                            <i class="bi bi-clock text-primary me-2"></i>
                            <span class="text-muted">Senin - Jumat: 08:00 - 17:00</span>
                        </div>
                        
                        <div class="detail-item mb-3">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <span class="text-muted">+62 21 1234 5678</span>
                        </div>
                        
                        <div class="detail-item mb-3">
                            <i class="bi bi-envelope text-primary me-2"></i>
                            <span class="text-muted">info@uym.ac.id</span>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <a href="https://www.google.com/maps?ll=-6.178968,106.608352&z=16&t=m&hl=id&gl=ID&mapclient=embed&cid=8538954904771372633" target="_blank" class="btn btn-outline-primary w-100">
                            <i class="bi bi-map me-2"></i>Buka di Google Maps
                        </a>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="faq-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">Pertanyaan Umum</h2>
            <p class="lead text-muted">Temukan jawaban untuk pertanyaan yang sering diajukan</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="faq-item bg-white rounded-4 p-4 shadow-sm">
                    <h5 class="fw-bold text-primary mb-3">
                        <i class="bi bi-question-circle me-2"></i>Bagaimana cara bergabung dengan HIMAKOM?
                    </h5>
                    <p class="text-muted mb-0">Anda dapat mendaftar melalui form pendaftaran online atau menghubungi kami langsung melalui kontak yang tersedia.</p>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="faq-item bg-white rounded-4 p-4 shadow-sm">
                    <h5 class="fw-bold text-primary mb-3">
                        <i class="bi bi-question-circle me-2"></i>Apa saja kegiatan yang diadakan HIMAKOM?
                    </h5>
                    <p class="text-muted mb-0">HIMAKOM mengadakan berbagai kegiatan seperti seminar, workshop, kompetisi, dan kegiatan sosial lainnya.</p>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="faq-item bg-white rounded-4 p-4 shadow-sm">
                    <h5 class="fw-bold text-primary mb-3">
                        <i class="bi bi-question-circle me-2"></i>Apakah ada biaya keanggotaan?
                    </h5>
                    <p class="text-muted mb-0">Biaya keanggotaan bervariasi tergantung program yang dipilih. Hubungi kami untuk informasi lebih detail.</p>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="faq-item bg-white rounded-4 p-4 shadow-sm">
                    <h5 class="fw-bold text-primary mb-3">
                        <i class="bi bi-question-circle me-2"></i>Bagaimana cara mendapatkan informasi event terbaru?
                    </h5>
                    <p class="text-muted mb-0">Ikuti media sosial kami atau berlangganan newsletter untuk mendapatkan informasi event terbaru.</p>
                </div>
            </div>
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

/* Contact Stats */
.contact-stats {
    margin-top: 2rem;
}

.stat-item {
    padding: 1rem;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 1rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    text-align: center;
}

.stat-number {
    font-size: 1.8rem;
    color: #fff;
}

.stat-label {
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.8);
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Contact Cards */
.contact-card, .contact-form-card {
    transition: all 0.3s ease;
}

.contact-card:hover, .contact-form-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important;
}

/* Contact Items */
.contact-item {
    transition: all 0.3s ease;
}

.contact-item:hover {
    transform: translateX(10px);
}

.contact-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

/* Social Media Links */
.social-links {
    flex-wrap: wrap;
}

.social-link {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(25, 118, 210, 0.3);
    color: white;
}

.social-link i {
    font-size: 1.2rem;
}

/* Form Styles */
.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 0.75rem;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #1976d2;
    box-shadow: 0 0 0 0.2rem rgba(25, 118, 210, 0.25);
}

/* Map Container */
.map-container {
    transition: all 0.3s ease;
}

.map-container:hover {
    transform: scale(1.02);
}

/* FAQ Items */
.faq-item {
    transition: all 0.3s ease;
}

.faq-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .hero-section {
        min-height: 50vh;
    }
    
    .display-4 {
        font-size: 2.5rem;
    }
    
    .display-5 {
        font-size: 2rem;
    }
    
    .stat-item {
        padding: 0.75rem;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
}

/* Animation Classes */
.animate__fadeInLeft {
    animation-duration: 0.8s;
}

.animate__fadeInRight {
    animation-duration: 0.8s;
}

.animate__fadeInUp {
    animation-duration: 0.8s;
}

.animate__delay-1s {
    animation-delay: 0.3s;
}

.animate__delay-2s {
    animation-delay: 0.6s;
}
</style>

@endsection