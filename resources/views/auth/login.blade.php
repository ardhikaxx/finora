<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FINORA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0ea5e9;
            --primary-light: #38bdf8;
            --primary-dark: #0284c7;
        }
        * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            top: -20%;
            left: -20%;
            width: 60%;
            height: 60%;
            background: radial-gradient(circle, rgba(14, 165, 233, 0.15) 0%, transparent 60%);
            pointer-events: none;
        }
        body::after {
            content: '';
            position: absolute;
            bottom: -20%;
            right: -20%;
            width: 60%;
            height: 60%;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 60%);
            pointer-events: none;
        }
        .login-wrapper {
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 1;
        }
        .login-card {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
            overflow: hidden;
            animation: slideUp 0.5s ease;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            padding: 2.5rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .login-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -30%;
            width: 80%;
            height: 150%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            animation: shimmer 3s infinite;
        }
        @keyframes shimmer {
            0%, 100% { transform: translateX(-10%); }
            50% { transform: translateX(10%); }
        }
        .login-header .brand {
            position: relative;
            z-index: 1;
        }
        .login-header .brand-icon {
            width: 72px;
            height: 72px;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .login-header h1 {
            color: #fff;
            font-weight: 800;
            margin: 0;
            font-size: 2.25rem;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .login-header p {
            color: rgba(255,255,255,0.9);
            margin: 0.75rem 0 0;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .login-body {
            padding: 2.25rem;
        }
        .form-control-custom {
            border: 2px solid #e2e8f0;
            border-radius: 14px;
            padding: 0.9rem 1.1rem;
            font-size: 0.95rem;
            transition: all 0.25s ease;
            background: #f8fafc;
        }
        .form-control-custom:focus {
            border-color: var(--primary-color);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.12);
            outline: none;
            transform: translateY(-1px);
        }
        .form-control-custom::placeholder {
            color: #94a3b8;
        }
        .btn-login {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border: none;
            padding: 1rem;
            border-radius: 14px;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.25s ease;
            width: 100%;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(14, 165, 233, 0.35);
        }
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(14, 165, 233, 0.45);
        }
        .btn-login:active {
            transform: translateY(-1px);
        }
        .input-group-text {
            background: #f1f5f9;
            border: 2px solid #e2e8f0;
            border-left: none;
            border-radius: 0 14px 14px 0;
            transition: all 0.2s ease;
        }
        .input-group-text i {
            color: #64748b;
            width: 20px;
            text-align: center;
        }
        .form-control-custom.border-end-0 {
            border-right: none;
            border-radius: 14px 0 0 14px;
        }
        .input-group:focus-within .input-group-text {
            border-color: var(--primary-color);
            background: #fff;
        }
        .input-group:focus-within .input-group-text i {
            color: var(--primary-color);
        }
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .form-check-input:focus {
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.15);
        }
        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <div class="brand">
                    <div class="brand-icon">
                        <i class="fas fa-chart-line text-white" style="font-size: 2rem;"></i>
                    </div>
                    <h1>FINORA</h1>
                    <p>Sistem Reporting Keuangan & Operasional</p>
                </div>
            </div>
            <div class="login-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Alamat Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control form-control-custom border-end-0 @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required autofocus
                                   placeholder="nama@perusahaan.com">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        @error('email')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-custom border-end-0 @error('password') is-invalid @endif" 
                                   id="password" name="password" required
                                   placeholder="••••••••">
                            <button type="button" class="input-group-text" onclick="togglePassword('password', 'togglePasswordIcon')">
                                <i class="fas fa-eye" id="togglePasswordIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-muted" for="remember">Ingat saya</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-login text-white">
                        <i class="fas fa-sign-in-alt me-2"></i> Masuk ke Sistem
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
