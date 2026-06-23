<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Omah Sinau Semar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #052e16 0%, #16a34a 50%, #15803d 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            position: relative;
            overflow: hidden;
        }

        body::before, body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            opacity: .15;
        }
        body::before {
            width: 500px; height: 500px;
            background: #4ade80;
            top: -100px; right: -100px;
            animation: floatOrb 8s ease-in-out infinite;
        }
        body::after {
            width: 400px; height: 400px;
            background: #f59e0b;
            bottom: -80px; left: -80px;
            animation: floatOrb 10s ease-in-out infinite reverse;
        }
        @keyframes floatOrb {
            0%, 100% { transform: translateY(0) scale(1); }
            50%       { transform: translateY(-20px) scale(1.05); }
        }

        .login-card {
            background: rgba(255,255,255,.97);
            border-radius: 24px;
            padding: 3rem 2.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 60px rgba(0,0,0,.25);
            position: relative;
            z-index: 10;
            animation: slideUp .5s ease;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .login-logo {
            width: 80px; height: 80px;
            background: #ffffff;
            border-radius: 20px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 8px 24px rgba(22,163,74,.3);
            border: 2px solid #bbf7d0;
            overflow: hidden;
        }
        .login-logo img {
            width: 100%; height: 100%;
            object-fit: cover;
            border-radius: 18px;
        }

        .login-title {
            font-size: 1.6rem;
            font-weight: 900;
            color: #1e293b;
            text-align: center;
            margin-bottom: .25rem;
        }
        .login-subtitle {
            text-align: center;
            color: #64748b;
            font-size: .88rem;
            margin-bottom: 2rem;
        }
        .login-subtitle span {
            color: #16a34a;
            font-weight: 700;
        }

        .form-label {
            font-weight: 700;
            font-size: .85rem;
            color: #374151;
            margin-bottom: .4rem;
        }

        .input-group-icon { position: relative; }
        .input-group-icon .form-control {
            padding-left: 2.8rem;
            border-radius: 12px;
            border: 1.5px solid #e2e8f0;
            height: 48px;
            font-size: .95rem;
            transition: .2s;
            color: #1e293b;
        }
        .input-group-icon .form-control:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 4px rgba(22,163,74,.12);
            outline: none;
        }
        .input-group-icon .form-control.is-invalid { border-color: #ef4444; }
        .input-group-icon .icon {
            position: absolute;
            left: .9rem; top: 50%;
            transform: translateY(-50%);
            color: #16a34a;
            font-size: 1rem;
            z-index: 5;
        }
        .input-group-icon .toggle-pw {
            position: absolute;
            right: .9rem; top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            z-index: 5;
            background: none;
            border: none;
            padding: 0;
            transition: color .2s;
        }
        .input-group-icon .toggle-pw:hover { color: #16a34a; }

        .btn-login {
            width: 100%;
            height: 50px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: .02em;
            margin-top: .5rem;
            transition: .2s;
            cursor: pointer;
            box-shadow: 0 4px 16px rgba(22,163,74,.35);
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(22,163,74,.45);
        }
        .btn-login:active { transform: translateY(0); }

        .divider {
            display: flex; align-items: center; gap: 12px;
            margin: 1.5rem 0 0;
            color: #cbd5e1; font-size: .8rem;
        }
        .divider::before, .divider::after {
            content: ''; flex: 1;
            height: 1px; background: #e2e8f0;
        }

        .alert-danger {
            border-radius: 12px; font-size: .88rem;
            border: none; background: #fef2f2; color: #b91c1c;
            padding: 12px 16px;
        }
        .alert-success {
            border-radius: 12px; font-size: .88rem;
            border: none; background: #f0fdf4; color: #15803d;
            padding: 12px 16px;
        }

        .back-link {
            display: block; text-align: center;
            margin-top: 1.5rem;
            color: rgba(255,255,255,.85);
            text-decoration: none; font-size: .88rem;
            position: relative; z-index: 10;
            transition: color .2s;
        }
        .back-link:hover { color: #fff; }

        .invalid-feedback { font-size: .8rem; color: #ef4444; }

        /* Gold accent bar at top of card */
        .login-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, #16a34a, #f59e0b, #16a34a);
            border-radius: 24px 24px 0 0;
        }
    </style>
</head>
<body>

<div>
    <div class="login-card">
        <div class="login-logo">
            <img src="{{ asset('image/favlogo.png') }}" alt="Omah Sinau Semar"
                 onerror="this.parentElement.innerHTML='<i class=\'bi bi-trophy-fill\' style=\'font-size:2rem;color:#16a34a;\'></i>'">
        </div>
        <h1 class="login-title">Admin Panel</h1>
        <p class="login-subtitle"><span>Omah Sinau Semar</span> — Masuk untuk melanjutkan</p>

        @if(session('error'))
            <div class="alert alert-danger mb-3">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success mb-3">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" novalidate>
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-group-icon">
                    <i class="bi bi-envelope-fill icon"></i>
                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="admin@omahsinausemar.com"
                        value="{{ old('email') }}"
                        autofocus
                    >
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group-icon">
                    <i class="bi bi-lock-fill icon"></i>
                    <input
                        type="password"
                        name="password"
                        id="passwordInput"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan password"
                    >
                    <button type="button" class="toggle-pw" onclick="togglePassword()">
                        <i class="bi bi-eye-fill" id="toggleIcon"></i>
                    </button>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn-login">
                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
            </button>
        </form>

        <div class="divider">Omah Sinau Semar</div>
    </div>

    <a href="{{ url('/') }}" class="back-link">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Website
    </a>
</div>

<script>
function togglePassword() {
    const input = document.getElementById('passwordInput');
    const icon  = document.getElementById('toggleIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'bi bi-eye-slash-fill';
    } else {
        input.type = 'password';
        icon.className = 'bi bi-eye-fill';
    }
}
</script>
</body>
</html>