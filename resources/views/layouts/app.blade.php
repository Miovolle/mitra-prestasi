<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<<<<<<< HEAD
    <meta name="description" content="Mitra Prestasi - Platform kompetisi edukatif untuk generasi muda Indonesia">
    <meta name="keywords" content="lomba, kompetisi, prestasi, mahasiswa, pelajar">
    <meta name="author" content="Mitra Prestasi">
    
    <title>@yield('title', 'OMAH SINAU SEMAR - Platform Kompetisi Edukatif')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    
    <!-- Google Fonts - Outfit & Inter -->
=======
    <title>@yield('title', 'Omah Sinau Semar - Platform Kompetisi Edukatif')</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('image/favlogo.png') }}">
>>>>>>> 5a9c4a8cf1593b71c8ede3416dbae04746f781f5
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @stack('styles')
    <style>
        /* LOADING */
        .loading-screen {
            position: fixed; inset: 0;
            background: linear-gradient(135deg, #16a34a, #15803d);
            display: flex; align-items: center; justify-content: center;
            z-index: 99999; transition: opacity 0.5s, visibility 0.5s;
        }
        .loading-screen.hidden { opacity: 0; visibility: hidden; }
        .loader {
            width: 52px; height: 52px;
            border: 5px solid rgba(255,255,255,0.25);
            border-top-color: #fff; border-radius: 50%;
            animation: spin 0.9s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* SCROLLBAR */
        html { scroll-behavior: smooth; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #16a34a; border-radius: 4px; }

        /* NAVBAR */
        #mainNav {
            background: rgba(255,255,255,0.97) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid #e2e8f0;
            padding: 8px 0;
            transition: all 0.3s;
        }
        #mainNav.scrolled { box-shadow: 0 4px 24px rgba(37,99,235,0.12); padding: 4px 0; }
        .nav-logo {
            height: 38px; width: 38px;
            object-fit: cover; border-radius: 8px;
            border: 2px solid #e2e8f0;
        }
        .nav-brand-text {
            font-weight: 800; font-size: 1.05rem;
            color: #1e293b; margin-left: 8px;
            font-family: 'Outfit', sans-serif;
        }
        .navbar-brand { display: flex; align-items: center; text-decoration: none; }
        .nav-link {
            font-weight: 600; font-size: 0.88rem;
            color: #475569 !important;
            padding: 8px 12px !important;
            border-radius: 8px; transition: all 0.2s;
            display: flex; align-items: center; gap: 5px;
        }
        .nav-link:hover, .nav-link.active {
            color: #16a34a !important; background: #f0fdf4;
        }

        /* DARK MODE TOGGLE */
        .dark-toggle {
            background: none; border: 1.5px solid #e2e8f0;
            color: #475569; width: 38px; height: 38px;
            border-radius: 50%; display: flex;
            align-items: center; justify-content: center;
            cursor: pointer; font-size: 1rem; transition: all 0.2s;
            margin-left: 6px;
        }
        .dark-toggle:hover { background: #f0fdf4; border-color: #16a34a; color: #16a34a; }

        /* BACK TO TOP */
        .back-to-top {
            position: fixed; bottom: 28px; right: 28px;
            width: 44px; height: 44px; background: #16a34a;
            color: white; border: none; border-radius: 10px;
            font-size: 1rem; cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 16px rgba(22,163,74,0.4);
            opacity: 0; visibility: hidden; transform: translateY(10px);
            transition: all 0.3s; z-index: 1000;
        }
        .back-to-top.show { opacity: 1; visibility: visible; transform: translateY(0); }
        .back-to-top:hover { background: #15803d; transform: translateY(-2px); }

        /* DARK MODE */
        [data-theme="dark"] body { background: #0f172a; color: #f1f5f9; }
        [data-theme="dark"] #mainNav { background: rgba(15,23,42,0.97) !important; border-color: #334155; }
        [data-theme="dark"] .nav-link { color: #94a3b8 !important; }
        [data-theme="dark"] .nav-link:hover,
        [data-theme="dark"] .nav-link.active { color: #4ade80 !important; background: rgba(22,163,74,0.15); }
        [data-theme="dark"] .nav-brand-text { color: #f1f5f9; }
        [data-theme="dark"] .dark-toggle { border-color: #334155; color: #94a3b8; }
        [data-theme="dark"] .hero-section { background: linear-gradient(135deg, #020617, #0f172a, #1e3a5f) !important; }
        [data-theme="dark"] .competition-card,
        [data-theme="dark"] .blog-card,
        [data-theme="dark"] .contact-form-wrapper,
        [data-theme="dark"] .legal-card,
        [data-theme="dark"] .contact-item,
        [data-theme="dark"] .stat-item { background: #1e293b !important; border-color: #334155 !important; }
        [data-theme="dark"] .competition-title,
        [data-theme="dark"] .section-title,
        [data-theme="dark"] .blog-title a,
        [data-theme="dark"] .contact-value,
        [data-theme="dark"] .legal-number,
        [data-theme="dark"] .hero-title { color: #f1f5f9 !important; }
        [data-theme="dark"] .section-description,
        [data-theme="dark"] .profil-text,
        [data-theme="dark"] .kontak-description,
        [data-theme="dark"] .blog-excerpt,
        [data-theme="dark"] .contact-label,
        [data-theme="dark"] .hero-description { color: #94a3b8 !important; }
        [data-theme="dark"] .form-control { background: #0f172a; border-color: #334155; color: #f1f5f9; }
        [data-theme="dark"] .form-control::placeholder { color: #94a3b8 !important; opacity: 1; }
        [data-theme="dark"] .gallery-section,
        [data-theme="dark"] .profil-section,
        [data-theme="dark"] .competition-section,
        [data-theme="dark"] .blog-section,
        [data-theme="dark"] .kontak-section { background: #0f172a !important; }
        [data-theme="dark"] .footer-section { background: #020617 !important; }
        [data-theme="dark"] .hero-quote-box { background: #1e293b; }
        [data-theme="dark"] .hero-quote { color: #f1f5f9; }
        [data-theme="dark"] .profil-mission ul li { color: #94a3b8; border-color: #334155; }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loader"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('image/favlogo.png') }}" alt="Mitra Prestasi" class="nav-logo">
                <span class="nav-brand-text">Omah Sinau Semar</span>
            </a>
            <button class="navbar-toggler border-0" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="bi bi-house-door-fill"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#lomba">
                            <i class="bi bi-trophy-fill"></i> Lomba
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/publikasi') }}">
                            <i class="bi bi-newspaper"></i> Publikasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profil">
                            <i class="bi bi-person-circle"></i> Profil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">
                            <i class="bi bi-envelope-fill"></i> Kontak
                        </a>
                    </li>
                    <li class="nav-item">
                        <button class="dark-toggle" id="darkToggle" title="Toggle dark mode">
                            <i class="bi bi-moon-fill" id="darkIcon"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main>@yield('content')</main>

    <!-- Back to Top -->
    <button class="back-to-top" id="backToTop">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 600, easing: 'ease-out-cubic', once: true, offset: 80 });

        window.addEventListener('load', () => {
            setTimeout(() => document.getElementById('loadingScreen').classList.add('hidden'), 500);
        });

        const navbar = document.getElementById('mainNav');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });

        document.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', function(e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    window.scrollTo({ top: target.offsetTop - navbar.offsetHeight, behavior: 'smooth' });
                    const col = document.getElementById('navbarNav');
                    if (col.classList.contains('show')) bootstrap.Collapse.getInstance(col)?.hide();
                }
            });
        });

        const backBtn = document.getElementById('backToTop');
        window.addEventListener('scroll', () => backBtn.classList.toggle('show', window.scrollY > 300));
        backBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link');
        window.addEventListener('scroll', () => {
            sections.forEach(sec => {
                if (window.scrollY >= sec.offsetTop - 120 && window.scrollY < sec.offsetTop + sec.offsetHeight - 120) {
                    navLinks.forEach(l => l.classList.toggle('active', l.getAttribute('href') === '#' + sec.id));
                }
            });
        });
    </script>

    @stack('scripts')

    <script>
        const html     = document.documentElement;
        const toggle   = document.getElementById('darkToggle');
        const darkIcon = document.getElementById('darkIcon');
        function setTheme(t) {
            html.setAttribute('data-theme', t);
            darkIcon.className = t === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';
            toggle.style.color = t === 'dark' ? '#fbbf24' : '';
        }
        setTheme(localStorage.getItem('theme') || 'light');
        toggle.addEventListener('click', () => {
            const next = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            setTheme(next); localStorage.setItem('theme', next);
        });
    </script>
</body>
</html>