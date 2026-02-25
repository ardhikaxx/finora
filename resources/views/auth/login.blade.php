<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FINORA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0ea5e9;
            --primary-light: #38bdf8;
        }
        * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 50%, #1e293b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        .login-wrapper {
            width: 100%;
            max-width: 440px;
        }
        .login-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35);
            overflow: hidden;
        }
        .login-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            padding: 2.5rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .login-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
        }
        .login-header .brand {
            position: relative;
            z-index: 1;
        }
        .login-header .brand-icon {
            width: 64px;
            height: 64px;
            background: rgba(255,255,255,0.2);
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }
        .login-header h1 {
            color: #fff;
            font-weight: 700;
            margin: 0;
            font-size: 2rem;
        }
        .login-header p {
            color: rgba(255,255,255,0.85);
            margin: 0.5rem 0 0;
            font-size: 0.9rem;
        }
        .login-body {
            padding: 2rem;
        }
        .form-control-custom {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            background: #f8fafc;
        }
        .form-control-custom:focus {
            border-color: var(--primary-color);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            outline: none;
        }
        .btn-login {
            background: var(--primary-color);
            border: none;
            padding: 0.875rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s ease;
            width: 100%;
        }
        .btn-login:hover {
            background: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.35);
        }
        .input-group-text {
            background: #f1f5f9;
            border: 2px solid #e2e8f0;
            border-left: none;
            border-radius: 0 12px 12px 0;
        }
        .input-group-text i {
            color: #94a3b8;
        }
        .form-control-custom.border-end-0 {
            border-right: none;
            border-radius: 12px 0 0 12px;
        }
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .demo-info {
            background: #f1f5f9;
            border-radius: 12px;
            padding: 1rem;
            text-align: center;
            margin-top: 1.5rem;
        }
        .demo-info small {
            color: #64748b;
        }
        .demo-info code {
            background: #e2e8f0;
            padding: 0.2rem 0.5rem;
            border-radius: 6px;
            font-size: 0.8rem;
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <div class="brand">
                    <div class="brand-icon">
                        <i class="fas fa-chart-line text-white" style="font-size: 1.75rem;"></i>
                    </div>
                    <h1>FINORA</h1>
                    <p>Sistem Reporting Keuangan & Operasional</p>
                </div>
            </div>
            <div class="login-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium mb-2">Alamat Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control form-control-custom border-end-0 @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required autofocus
                                   placeholder="name@company.com">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        @error('email')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-medium mb-2">Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-custom border-end-0 @error('password') is-invalid @endif" 
                                   id="password" name="password" required
                                   placeholder="••••••••">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
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
                        <i class="fas fa-sign-in-alt me-2"></i> Masuk
                    </button>
                </form>

                <div class="demo-info">
                    <small>Demo Login:</small><br>
                    <code>admin@finora.com</code> / <code>password</code>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
