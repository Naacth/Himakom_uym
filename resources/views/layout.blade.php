<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'HIMAKOM Universitas Yatsi Madani')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', Arial, sans-serif; }
        .navbar {
            background: linear-gradient(90deg, #0d47a1 60%, #1976d2 100%) !important;
        }
        .navbar .nav-link, .navbar .navbar-brand {
            transition: color 0.2s, transform 0.2s;
        }
        .navbar .nav-link:hover, .navbar .navbar-brand:hover {
            color: #64b5f6 !important;
            transform: translateY(-2px) scale(1.08);
        }
        .navbar .nav-link.active {
            color: #1976d2 !important;
            font-weight: 700;
        }
        .navbar .dropdown-menu {
            border-radius: 0.5rem;
            box-shadow: 0 4px 24px rgba(13, 71, 161, 0.12);
        }
        .navbar .dropdown-item:hover {
            background: #e3f2fd;
            color: #0d47a1 !important;
        }
        .navbar .bi {
            transition: color 0.2s, transform 0.3s cubic-bezier(.68,-0.55,.27,1.55);
        }
        .navbar .nav-link:hover .bi, .navbar .dropdown-item:hover .bi {
            color: #1976d2 !important;
            transform: rotate(-12deg) scale(1.2);
        }
        .btn-primary, .btn-primary:active, .btn-primary:focus {
            background: linear-gradient(90deg, #1976d2 60%, #64b5f6 100%) !important;
            border: none;
        }
        .btn-primary:hover {
            background: #1565c0 !important;
        }
        .bg-blue-gradient {
            background: linear-gradient(90deg, #1976d2 60%, #64b5f6 100%) !important;
        }
        .footer {
            background: linear-gradient(90deg, #0d47a1 60%, #1976d2 100%) !important;
            color: #fff;
        }
        .footer a {
            color: #bbdefb;
            transition: color 0.2s, transform 0.2s;
        }
        .footer a:hover {
            color: #fff;
            transform: scale(1.2) rotate(-8deg);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100" style="background-color: #f4f8fb;">
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="/logo-himakom.png" alt="Logo HIMAKOM" width="40" height="40" class="me-2 rounded-circle shadow">
                <span class="fw-bold">HIMAKOM UYM</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="/">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item d-flex align-items-center" href="/about"><i class="bi bi-info-circle me-1"></i> About Us</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="/kabinet"><i class="bi bi-diagram-3 me-1"></i> Kabinet</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="/divisi"><i class="bi bi-people me-1"></i> Divisi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="/event">
                            <i class="bi bi-calendar-event me-1"></i> Event
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="/produk">
                            <i class="bi bi-box-seam me-1"></i> Produk Kami
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="/galeri">
                            <i class="bi bi-images me-1"></i> Galeri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="/kontak">
                            <i class="bi bi-envelope me-1"></i> Kontak
                        </a>
                    </li>
                    
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}"><i class="bi bi-person me-1"></i> Profil</a></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="{{ route('orders.history') }}"><i class="bi bi-cart me-1"></i> Riwayat Pesanan</a></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="{{ route('event-registrations.history') }}"><i class="bi bi-calendar-check me-1"></i> Event Saya</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex align-items-center">
                                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('register') }}">
                                <i class="bi bi-person-plus me-1"></i> Daftar
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <main class="flex-fill py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>
    <footer class="footer py-3 mt-auto shadow-lg">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                &copy; {{ date('Y') }} HIMAKOM Universitas Yatsi Madani. All rights reserved.
            </div>
            <div>
                <a href="#" class="me-3" style="text-decoration:none;"><i class="bi bi-instagram"></i></a>
                <a href="#" class="me-3" style="text-decoration:none;"><i class="bi bi-facebook"></i></a>
                <a href="#" style="text-decoration:none;"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </footer>
</body>
</html> 