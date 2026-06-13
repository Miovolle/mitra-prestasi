<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - Mitra Prestasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --primary: #3b82f6; --sidebar-w: 260px; }
        body { background: #f1f5f9; font-family: 'Segoe UI', sans-serif; }
        .sidebar { width: var(--sidebar-w); min-height: 100vh; background: linear-gradient(180deg,#1e3a5f,#2563eb); position: fixed; top:0; left:0; z-index:1000; }
        .sidebar-brand { padding: 1.5rem; border-bottom: 1px solid rgba(255,255,255,.1); }
        .sidebar-brand h5 { color:#fff; margin:0; font-weight:700; }
        .sidebar-brand small { color:rgba(255,255,255,.6); }
        .sidebar .nav-link { color:rgba(255,255,255,.75); padding:.75rem 1.5rem; border-radius:8px; margin:.15rem .75rem; transition:.2s; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color:#fff; background:rgba(255,255,255,.15); }
        .sidebar .nav-link i { width:20px; text-align:center; margin-right:.5rem; }
        .sidebar-section { padding: .75rem 1.5rem .25rem; color:rgba(255,255,255,.4); font-size:.7rem; font-weight:700; text-transform:uppercase; letter-spacing:.08em; }
        .main-content { margin-left: var(--sidebar-w); }
        .topbar { background:#fff; border-bottom:1px solid #e2e8f0; padding:1rem 1.5rem; position:sticky; top:0; z-index:100; }
        .content-area { padding: 1.5rem; }
        .stat-card { background:#fff; border-radius:12px; padding:1.5rem; border:1px solid #e2e8f0; }
        .stat-icon { width:52px; height:52px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:1.4rem; }
        .card { border-radius:12px; border:1px solid #e2e8f0; }
        .table th { font-size:.8rem; font-weight:700; text-transform:uppercase; color:#64748b; background:#f8fafc; }
    </style>
    @stack('styles')
</head>
<body>
<div class="sidebar">
    <div class="sidebar-brand">
        <h5><i class="bi bi-trophy-fill me-2"></i>Mitra Prestasi</h5>
        <small>Panel Admin</small>
    </div>
    <nav class="py-2">
        <div class="sidebar-section">Utama</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <div class="sidebar-section">Konten</div>
        <a href="{{ route('admin.lomba.index') }}" class="nav-link {{ request()->routeIs('admin.lomba*') ? 'active' : '' }}">
            <i class="bi bi-trophy"></i> Lomba
        </a>
        <a href="{{ route('admin.pendaftaran.index') }}" class="nav-link {{ request()->routeIs('admin.pendaftaran*') ? 'active' : '' }}">
            <i class="bi bi-people"></i> Pendaftaran
        </a>
        <a href="{{ route('admin.blog.index') }}" class="nav-link {{ request()->routeIs('admin.blog*') ? 'active' : '' }}">
            <i class="bi bi-journal-richtext"></i> Blog
        </a>
        <a href="{{ route('admin.galeri.index') }}" class="nav-link {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
            <i class="bi bi-images"></i> Galeri
        </a>
        <div class="sidebar-section">Lainnya</div>
        <a href="{{ url('/') }}" class="nav-link" target="_blank">
            <i class="bi bi-box-arrow-up-right"></i> Lihat Website
        </a>
    </nav>
</div>
<div class="main-content">
    <div class="topbar d-flex align-items-center justify-content-between">
        <div>
            <h6 class="mb-0 fw-bold">@yield('page-title', 'Dashboard')</h6>
        </div>
        <div class="d-flex align-items-center gap-3">
            <span class="text-muted small d-none d-md-inline"><i class="bi bi-calendar3 me-1"></i>{{ now()->format('d M Y') }}</span>
            <div class="dropdown">
                <button class="btn btn-light btn-sm dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                    <div style="width:30px;height:30px;background:#2563eb;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:.8rem;font-weight:700;">
                        {{ strtoupper(substr(session('admin_name', 'A'), 0, 1)) }}
                    </div>
                    <span class="d-none d-md-inline small fw-semibold">{{ session('admin_name', 'Admin') }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">
                    <li>
                        <span class="dropdown-item-text small text-muted">{{ session('admin_email', '') }}</span>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-area">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
