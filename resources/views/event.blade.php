@extends('layout')
@section('title', 'Event | HIMAKOM UYM')
@section('content')

<!-- Hero Section -->
<div class="hero-section position-relative overflow-hidden" style="background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%); min-height: 60vh; display: flex; align-items: center;">
    <div class="container position-relative z-3">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="hero-content text-white">
                    <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInUp">
                        <i class="bi bi-calendar-event-fill me-3"></i>Event & Kegiatan
                    </h1>
                    <p class="lead mb-4 animate__animated animate__fadeInUp animate__delay-1s" style="font-size: 1.3rem;">
                        Temukan berbagai kegiatan menarik dan bermanfaat dari HIMAKOM UYM
                    </p>
                    <div class="stats-row animate__animated animate__fadeInUp animate__delay-2s">
                        <div class="row justify-content-center">
                            <div class="col-4 col-md-3">
                                <div class="stat-item">
                                    <div class="stat-number fw-bold">{{ $events->count() }}</div>
                                    <div class="stat-label">Total Event</div>
                                </div>
                            </div>
                            <div class="col-4 col-md-3">
                                <div class="stat-item">
                                    <div class="stat-number fw-bold">{{ $events->where('date', '>=', now())->count() }}</div>
                                    <div class="stat-label">Event Mendatang</div>
                                </div>
                            </div>
                            <div class="col-4 col-md-3">
                                <div class="stat-item">
                                    <div class="stat-number fw-bold">{{ $events->where('date', '<', now())->count() }}</div>
                                    <div class="stat-label">Event Selesai</div>
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

<!-- Events Section -->
<div class="events-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">Acara & Kegiatan HIMAKOM</h2>
            <p class="lead text-muted">Berbagai event menarik yang telah dan akan kami selenggarakan</p>
        </div>
        
        @if($events->count() > 0)
    <div class="row g-4">
            @foreach($events as $index => $event)
            <div class="col-lg-4 col-md-6">
                <div class="event-card card border-0 shadow-lg h-100 rounded-4 overflow-hidden transition-all animate__animated animate__fadeInUp" 
                     style="animation-delay: {{ $index * 0.1 }}s;">
                    
                    <!-- Event Image -->
                    <div class="event-image-container position-relative">
                        @if($event->image)
                            <img src="{{ asset('storage/'.$event->image) }}" 
                                 class="event-image w-100" 
                                 style="height: 200px; object-fit: cover;" 
                                 alt="{{ $event->title }}">
                        @else
                            <div class="event-image-placeholder w-100 d-flex align-items-center justify-content-center bg-primary"
                                 style="height: 200px;">
                                <i class="bi bi-calendar-event text-white" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        
                        <!-- Event Status Badge -->
                        <div class="event-status position-absolute top-0 end-0 m-3">
                            @if($event->date >= now())
                                <span class="badge bg-success rounded-pill px-3 py-2">
                                    <i class="bi bi-clock me-1"></i>Mendatang
                                </span>
                            @else
                                <span class="badge bg-secondary rounded-pill px-3 py-2">
                                    <i class="bi bi-check-circle me-1"></i>Selesai
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold text-primary mb-3">{{ $event->title }}</h5>
                        <p class="card-text text-muted mb-4" style="line-height: 1.6;">
                            {{ Str::limit($event->description, 120) }}
                        </p>
                        
                        <!-- Event Details -->
                        <div class="event-details mb-4">
                            <div class="detail-item d-flex align-items-center mb-2">
                                <i class="bi bi-calendar2-week text-primary me-3"></i>
                                <span class="text-muted">{{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}</span>
                            </div>
                            <div class="detail-item d-flex align-items-center mb-2">
                                <i class="bi bi-clock text-primary me-3"></i>
                                <span class="text-muted">{{ \Carbon\Carbon::parse($event->date)->format('H:i') }} WIB</span>
                            </div>
                            @if($event->location)
                            <div class="detail-item d-flex align-items-center">
                                <i class="bi bi-geo-alt text-primary me-3"></i>
                                <span class="text-muted">{{ $event->location }}</span>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Event Actions -->
                        <div class="event-actions">
                            @if($event->google_form_link)
                                <a href="{{ $event->google_form_link }}" target="_blank" class="btn btn-success btn-sm rounded-pill w-100">
                                    <i class="bi bi-clipboard-check me-2"></i>Daftar
                                </a>
                            @else
                                @auth
                                    <a href="{{ route('event-registrations.create', $event) }}" class="btn btn-success btn-sm rounded-pill w-100">
                                        <i class="bi bi-calendar-plus me-2"></i>Daftar Event
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-warning btn-sm rounded-pill w-100">
                                        <i class="bi bi-lock me-2"></i>Login untuk Daftar
                                    </a>
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="empty-events text-center py-5">
            <div class="empty-icon mb-4">
                <i class="bi bi-calendar-x display-1 text-muted"></i>
            </div>
            <h4 class="text-muted mb-3">Belum ada event</h4>
            <p class="text-muted">Event akan ditampilkan di sini setelah data tersedia.</p>
        </div>
        @endif
    </div>
</div>

<!-- Testimonials Section -->
<div class="testimonials-section py-5" style="background: #f8f9fa;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">Testimoni Peserta</h2>
            <p class="lead text-muted">Apa kata mereka tentang event HIMAKOM</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card bg-white rounded-4 shadow-sm p-4 h-100 transition-all">
                    <div class="testimonial-header d-flex align-items-center mb-3">
                        <div class="testimonial-avatar me-3">
                            <div class="avatar-placeholder rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                 style="width: 50px; height: 50px;">
                                <span class="fw-bold">A</span>
                            </div>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Andi Pratama</h6>
                            <small class="text-muted">Mahasiswa UYM</small>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <i class="bi bi-quote text-primary mb-2" style="font-size: 1.5rem;"></i>
                        <p class="text-muted mb-0">"Event HIMAKOM selalu inspiratif dan menambah wawasan! Setiap kegiatan memberikan insight baru tentang teknologi."</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card bg-white rounded-4 shadow-sm p-4 h-100 transition-all">
                    <div class="testimonial-header d-flex align-items-center mb-3">
                        <div class="testimonial-avatar me-3">
                            <div class="avatar-placeholder rounded-circle bg-success text-white d-flex align-items-center justify-content-center"
                                 style="width: 50px; height: 50px;">
                                <span class="fw-bold">S</span>
                            </div>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Siti Nurhaliza</h6>
                            <small class="text-muted">Anggota HIMAKOM</small>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <i class="bi bi-quote text-primary mb-2" style="font-size: 1.5rem;"></i>
                        <p class="text-muted mb-0">"Workshop codingnya seru dan bermanfaat banget! Skill programming saya meningkat signifikan setelah mengikuti event HIMAKOM."</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card bg-white rounded-4 shadow-sm p-4 h-100 transition-all">
                    <div class="testimonial-header d-flex align-items-center mb-3">
                        <div class="testimonial-avatar me-3">
                            <div class="avatar-placeholder rounded-circle bg-warning text-white d-flex align-items-center justify-content-center"
                                 style="width: 50px; height: 50px;">
                                <span class="fw-bold">B</span>
                            </div>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Budi Santoso</h6>
                            <small class="text-muted">Alumni HIMAKOM</small>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <i class="bi bi-quote text-primary mb-2" style="font-size: 1.5rem;"></i>
                        <p class="text-muted mb-0">"Banyak relasi dan pengalaman baru dari setiap kegiatan. HIMAKOM benar-benar membentuk karakter dan skill yang dibutuhkan industri."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Event Details Modal -->
<div class="modal fade" id="eventModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 bg-primary text-white rounded-top-4">
                <h5 class="modal-title fw-bold">
                    <i class="bi bi-calendar-event me-2"></i>Detail Event
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div id="eventModalContent">
                    <!-- Content will be populated by JavaScript -->
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

/* Stats Styles */
.stats-row {
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

/* Event Card Styles */
.event-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: none;
    overflow: hidden;
}

.event-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 40px rgba(25, 118, 210, 0.15) !important;
}

.event-image {
    transition: transform 0.3s ease;
}

.event-card:hover .event-image {
    transform: scale(1.1);
}

.event-image-placeholder {
    background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%);
}

/* Event Details */
.event-details {
    border-top: 1px solid #e9ecef;
    border-bottom: 1px solid #e9ecef;
    padding-top: 1rem;
    padding-bottom: 1rem;
}

.detail-item {
    font-size: 0.9rem;
}

/* Testimonial Cards */
.testimonial-card {
    transition: all 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}

.testimonial-content {
    position: relative;
}

.testimonial-content i {
    opacity: 0.3;
}

/* Empty State */
.empty-events {
    background: #fff;
    border-radius: 1rem;
    border: 2px dashed #dee2e6;
}

/* Modal Styles */
.modal-content {
    border: none;
}

.modal-header {
    background: linear-gradient(135deg, #1976d2 0%, #3F3F9C 100%);
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
.animate__fadeInUp {
    animation-duration: 0.8s;
}

.animate__delay-1s {
    animation-delay: 0.3s;
}

.animate__delay-2s {
    animation-delay: 0.6s;
}

.transition-all {
    transition: all 0.3s ease;
}
</style>

<script>
function showEventDetails(title, description, date, location, rawDate) {
    const modalContent = document.getElementById('eventModalContent');
    
    // Parse the raw date for proper formatting
    const parsedDate = new Date(rawDate);
    const formattedDate = parsedDate.toLocaleDateString('id-ID', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        timeZone: 'Asia/Jakarta'
    }) + ' WIB';
    
    modalContent.innerHTML = `
        <div class="text-center mb-4">
            <div class="event-icon-large mb-3">
                <i class="bi bi-calendar-event text-primary" style="font-size: 4rem;"></i>
            </div>
            <h4 class="fw-bold text-primary mb-2">${title}</h4>
        </div>
        <div class="event-info-grid">
            <div class="info-item mb-3">
                <i class="bi bi-calendar2-week text-primary me-2"></i>
                <span class="fw-semibold">Tanggal & Waktu:</span> ${formattedDate}
            </div>
            <div class="info-item mb-3">
                <i class="bi bi-geo-alt text-primary me-2"></i>
                <span class="fw-semibold">Lokasi:</span> ${location}
            </div>
            <div class="info-item mb-3">
                <i class="bi bi-info-circle text-primary me-2"></i>
                <span class="fw-semibold">Deskripsi:</span>
            </div>
            <div class="event-description p-3 bg-light rounded-3">
                <p class="mb-0">${description}</p>
            </div>
        </div>
    `;
    
    const modal = new bootstrap.Modal(document.getElementById('eventModal'));
    modal.show();
}
</script>

@endsection