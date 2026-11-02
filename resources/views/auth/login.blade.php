<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SenjaLoka Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #2b7a8c 0%, #1e5e6e 50%, #0d1f24 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
        }
        .login-header {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            padding: 30px;
            text-align: center;
            color: #fff;
        }
        .login-header .logo {
            font-size: 2rem;
            font-weight: 800;
        }
        .login-header .logo span { color: #fff; opacity: 0.85; }
        .login-header p { margin: 5px 0 0; font-size: 0.9rem; opacity: 0.9; }
        .login-body { padding: 24px 28px; }
        .form-label { font-weight: 500; font-size: 0.85rem; color: #1f2e35; margin-bottom: 4px; }
        .form-control {
            border-radius: 10px; padding: 10px 14px; height: 44px;
            border: 2px solid #e9ecef; font-size: 0.85rem;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #2b7a8c; box-shadow: 0 0 0 0.2rem rgba(43,122,140,0.15);
        }
        .input-group-text {
            background: transparent; border: 2px solid #e9ecef;
            color: #5a6b75; font-size: 0.85rem; padding: 0 12px;
        }
        .input-group-text:first-child {
            border-right: none; border-radius: 10px 0 0 10px;
        }
        .input-group-text:last-child {
            border-left: none; border-radius: 0 10px 10px 0;
        }
        .input-group .form-control:not(:last-child) { border-right: none; }
        .input-group .form-control:not(:first-child) { border-left: none; }
        .input-group .form-control:last-child { border-radius: 0 10px 10px 0; }
        .input-group .form-control:first-child { border-radius: 10px 0 0 10px; }
        .btn-login {
            background: linear-gradient(135deg, #2b7a8c, #1e5e6e);
            border: none; border-radius: 10px; padding: 10px; font-weight: 600; height: 44px;
            width: 100%; color: #fff; transition: all 0.3s; font-size: 0.9rem;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(43,122,140,0.4); }
        .brand-text { font-size: 0.85rem; color: #5a6b75; }
        .brand-text a { color: #2b7a8c; font-weight: 600; }
        .brand-text a:hover { text-decoration: underline; }
        .alert-danger { border-radius: 10px; font-size: 0.85rem; }
        .alert-success { border-radius: 10px; font-size: 0.85rem; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .form-check-label { font-size: 0.85rem; color: #5a6b75; }
        .mb-3 { margin-bottom: 14px; }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <div class="logo">Senja<span>Loka</span></div>
            <p>Masuk ke halaman website SenjaLoka</p>
        </div>
        <div class="login-body">
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="user@gmail.com" required autofocus>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" id="loginPassword" class="form-control" placeholder="Masukkan password" required>
                        <span class="input-group-text" onclick="togglePassword('loginPassword', this)" style="cursor:pointer;">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i> Masuk ke halaman website
                </button>
            </form>

            <div class="text-center mt-4 brand-text">
                Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
            </div>
            <div class="text-center mt-2 brand-text">
                &copy; 2026 SenjaLoka. All rights reserved.
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            const icon = el.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fas fa-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'fas fa-eye';
            }
        }
    </script>
</body>
</html>