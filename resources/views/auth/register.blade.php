<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SenjaLoka Dashboard</title>
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
        .register-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            width: 100%;
            max-width: 480px;
        }
        .register-header {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            padding: 30px;
            text-align: center;
            color: #fff;
        }
        .register-header .logo { font-size: 2rem; font-weight: 800; }
        .register-header .logo span { color: #fff; opacity: 0.85; }
        .register-header p { margin: 5px 0 0; font-size: 0.9rem; opacity: 0.9; }
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
        .btn-register {
            background: linear-gradient(135deg, #2b7a8c, #1e5e6e);
            border: none; border-radius: 10px; padding: 10px; font-weight: 600; height: 44px;
            width: 100%; color: #fff; transition: all 0.3s; font-size: 0.9rem;
        }
        .btn-register:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(43,122,140,0.4); }
        .brand-text { font-size: 0.85rem; color: #5a6b75; }
        .brand-text a { color: #2b7a8c; font-weight: 600; }
        .brand-text a:hover { text-decoration: underline; }
        .alert { border-radius: 10px; font-size: 0.85rem; }
        .register-body { padding: 24px 28px; }
        .mb-3 { margin-bottom: 14px; }
    </style>
</head>
<body>

    <div class="register-card">
        <div class="register-header">
            <div class="logo">Senja<span>Loka</span></div>
            <p>Daftar akun baru SenjaLoka</p>
        </div>
        <div class="register-body">
            @if ($errors->any())
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nama Anda" required autofocus>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email@contoh.com" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" id="regPassword" class="form-control" placeholder="Min 8 karakter" required>
                        <span class="input-group-text" onclick="togglePassword('regPassword', this)" style="cursor:pointer;">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                        <input type="password" name="password_confirmation" id="regPasswordConfirm" class="form-control" placeholder="Ulangi password" required>
                        <span class="input-group-text" onclick="togglePassword('regPasswordConfirm', this)" style="cursor:pointer;">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn btn-register">
                    <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
                </button>
            </form>

            <div class="text-center mt-4 brand-text">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
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