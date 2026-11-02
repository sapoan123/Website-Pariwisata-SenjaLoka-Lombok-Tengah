<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - SenjaLoka</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-blue: #2b7a8c;
            --light-blue: #eaf6f8;
            --sky-blue: #5eb7c9;
            --white: #ffffff;
            --dark: #1f2e35;
            --sunset: #ff7e5f;
            --sunset-light: #feb47b;
            --text-grey: #5a6b75;
            --shadow: 0 10px 30px rgba(0,0,0,0.08);
            --card-radius: 16px;
            --transition: all 0.3s ease;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; scroll-behavior: smooth; }
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
            background: var(--light-blue);
            line-height: 1.6;
            min-height: 100vh;
        }
        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }
        img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .me-2 { margin-right: 8px; }

        #navbar {
            position: sticky; top: 0; z-index: 1000;
            background: rgba(255,255,255,0.97); backdrop-filter: blur(5px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); transition: var(--transition);
        }
        .nav-container {
            display: flex; justify-content: space-between; align-items: center;
            padding: 15px 20px; max-width: 1200px; margin: 0 auto;
        }
        .logo { font-size: 1.8rem; font-weight: 800; color: var(--primary-blue); }
        .logo span { color: var(--sunset); }
        .nav-links { display: flex; gap: 25px; align-items: center; }
        .nav-links a { font-weight: 500; font-size: 0.95rem; transition: color 0.3s; }
        .nav-links a:hover { color: var(--primary-blue); }
        .mobile-toggle { display: none; font-size: 1.5rem; cursor: pointer; }

        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        .profile-section {
            padding: 60px 0 80px;
            display: flex; justify-content: center;
        }
        .profile-card {
            background: var(--white);
            border-radius: var(--card-radius);
            box-shadow: var(--shadow);
            width: 100%; max-width: 600px;
            overflow: hidden;
        }
        .profile-header {
            background: linear-gradient(135deg, var(--primary-blue), #1e5e6e);
            padding: 40px 30px;
            text-align: center; color: var(--white);
        }
        .profile-avatar {
            width: 100px; height: 100px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 15px;
            font-size: 2.5rem; font-weight: 700;
            border: 3px solid rgba(255,255,255,0.4);
            overflow: hidden;
        }
        .profile-avatar img { width: 100%; height: 100%; object-fit: cover; }
        .profile-photo-wrap {
            position: relative; display: inline-block; cursor: pointer;
        }
        .profile-photo-wrap:hover .profile-photo-overlay { opacity: 1; }
        .profile-photo-overlay {
            position: absolute; inset: 0; border-radius: 50%;
            background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center;
            opacity: 0; transition: opacity 0.3s; color: var(--white); font-size: 0.7rem; font-weight: 600;
        }
        .profile-photo-overlay i { font-size: 1.5rem; display: block; margin-bottom: 4px; }
        .flash-success-profile {
            background: #d4edda; color: #155724; padding: 12px 18px;
            border-radius: 10px; margin-bottom: 20px; font-size: 0.9rem;
            display: flex; align-items: center; gap: 8px;
        }
        .profile-header h2 { font-size: 1.5rem; font-weight: 700; margin-bottom: 5px; }
        .profile-header p { opacity: 0.85; font-size: 0.95rem; }
        .role-badge {
            display: inline-block;
            padding: 4px 16px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .role-badge.admin { background: var(--sunset); color: var(--white); }
        .role-badge.user { background: var(--sky-blue); color: var(--white); }

        .profile-body { padding: 30px; }
        .profile-info-list { list-style: none; }
        .profile-info-item {
            display: flex; align-items: flex-start;
            padding: 14px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        .profile-info-item:last-child { border-bottom: none; }
        .profile-info-item .info-icon {
            width: 40px; height: 40px;
            border-radius: 10px;
            background: var(--light-blue);
            display: flex; align-items: center; justify-content: center;
            color: var(--primary-blue);
            font-size: 1rem;
            flex-shrink: 0;
            margin-right: 15px;
        }
        .profile-info-item .info-content { flex: 1; }
        .profile-info-item .info-label {
            font-size: 0.8rem;
            color: var(--text-grey);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }
        .profile-info-item .info-value {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark);
        }

        .profile-actions {
            padding: 0 30px 30px;
            display: flex; gap: 12px;
        }
        .btn {
            display: inline-block; padding: 12px 30px; border-radius: 50px;
            font-weight: 600; transition: var(--transition); border: none;
            cursor: pointer; font-family: 'Poppins', sans-serif;
            font-size: 0.95rem; text-align: center; flex: 1;
        }
        .btn-sunset { background: linear-gradient(135deg, var(--sunset), var(--sunset-light)); color: var(--white); }
        .btn-sunset:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(255,126,95,0.3); }
        .btn-outline-sunset { background: transparent; border: 2px solid var(--sunset); color: var(--sunset); }
        .btn-outline-sunset:hover { background: var(--sunset); color: #fff; transform: translateY(-3px); box-shadow: 0 5px 15px rgba(255,126,95,0.3); }

        footer { background: #0d1f24; color: #b6c9cf; padding: 40px 0 20px; }
        .footer-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 40px; margin-bottom: 40px; }
        .footer-col h4 { color: var(--white); margin-bottom: 20px; font-weight: 600; }
        .footer-col ul li { margin-bottom: 10px; }
        .footer-col ul li a:hover { color: var(--white); }
        .social-icons { display: flex; gap: 15px; }
        .social-icons a { background: rgba(255,255,255,0.1); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: 0.3s; }
        .social-icons a:hover { background: var(--sunset); }
        .copyright { text-align: center; border-top: 1px solid #2a4047; padding-top: 20px; font-size: 0.9rem; }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .nav-links.active { display: flex; flex-direction: column; position: absolute; top: 100%; left: 0; width: 100%; background: var(--white); padding: 20px; box-shadow: 0 5px 10px rgba(0,0,0,0.1); gap: 15px; }
            .mobile-toggle { display: block; }
            .profile-header { padding: 30px 20px; }
            .profile-body { padding: 20px; }
            .profile-actions { padding: 0 20px 20px; flex-direction: column; }
        }
    </style>
</head>
<body>

    <nav id="navbar">
        <div class="nav-container">
            <a href="/" class="logo">Senja<span>Loka</span></a>
            <ul class="nav-links" id="navLinks">
                <li>
                    <a href="/" class="btn btn-sunset" style="padding: 10px 25px;border-radius:50px;font-weight:600;cursor:pointer;font-family:'Poppins',sans-serif;">
                        <i class="fas fa-home me-2"></i>Home
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;margin:0;">
                        @csrf
                        <button type="submit" class="btn btn-outline-sunset" style="padding: 10px 25px;border-radius:50px;font-weight:600;cursor:pointer;font-family:'Poppins',sans-serif;">
                            <i class="fas fa-sign-out-alt me-2"></i>Keluar
                        </button>
                    </form>
                </li>
            </ul>
            <div class="mobile-toggle" onclick="document.getElementById('navLinks').classList.toggle('active')">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <section class="profile-section">
        <div class="profile-card">
            @if(session('success'))
                <div style="padding: 30px 30px 0;">
                    <div class="flash-success-profile">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="profile-header">
                <form action="{{ route('profile.photo') }}" method="POST" enctype="multipart/form-data" id="photoForm">
                    @csrf
                    <input type="file" name="profile_photo" id="photoInput" accept="image/*" style="display:none;" onchange="this.form.submit()">
                    <div class="profile-photo-wrap" onclick="document.getElementById('photoInput').click()">
                        <div class="profile-avatar">
                            @if($user->profile_photo)
                                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->name }}">
                            @else
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            @endif
                        </div>
                        <div class="profile-photo-overlay">
                            <div><i class="fas fa-camera"></i> Upgrade Foto</div>
                        </div>
                    </div>
                </form>
                <h2>{{ $user->name }}</h2>
                <p>{{ $user->email }}</p>
                <span class="role-badge {{ $user->role }}">{{ $user->role === 'admin' ? 'Administrator' : 'Member' }}</span>
            </div>
            <div class="profile-body">
                <ul class="profile-info-list">
                    <li class="profile-info-item">
                        <div class="info-icon"><i class="fas fa-user"></i></div>
                        <div class="info-content">
                            <div class="info-label">Nama Lengkap</div>
                            <div class="info-value">{{ $user->name }}</div>
                        </div>
                    </li>
                    <li class="profile-info-item">
                        <div class="info-icon"><i class="fas fa-envelope"></i></div>
                        <div class="info-content">
                            <div class="info-label">Email</div>
                            <div class="info-value">{{ $user->email }}</div>
                        </div>
                    </li>
                    <li class="profile-info-item">
                        <div class="info-icon"><i class="fas fa-shield-alt"></i></div>
                        <div class="info-content">
                            <div class="info-label">Peran</div>
                            <div class="info-value">{{ $user->role === 'admin' ? 'Administrator' : 'User' }}</div>
                        </div>
                    </li>
                    <li class="profile-info-item">
                        <div class="info-icon"><i class="fas fa-calendar-alt"></i></div>
                        <div class="info-content">
                            <div class="info-label">Tanggal Mendaftar</div>
                            <div class="info-value">{{ $user->created_at->format('d M Y') }}</div>
                        </div>
                    </li>
                    <li class="profile-info-item">
                        <div class="info-icon"><i class="fas fa-clock"></i></div>
                        <div class="info-content">
                            <div class="info-label">Terakhir Masuk</div>
                            <div class="info-value">{{ $user->last_login_at ? $user->last_login_at->format('d M Y, H:i') : '-' }}</div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="profile-actions">
                <form action="/" method="GET" style="flex:1;">
                    <button type="submit" class="btn btn-sunset" style="width:100%;">
                        <i class="fas fa-home me-2"></i> Kembali ke Beranda
                    </button>
                </form>
                <form method="POST" action="{{ route('logout') }}" style="flex:1;">
                    @csrf
                    <button type="submit" class="btn btn-outline-sunset" style="width:100%;">
                        <i class="fas fa-sign-out-alt me-2"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="logo" style="color: white; margin-bottom: 15px;">Senja<span>Loka</span></div>
                    <p>Menghadirkan pengalaman wisata premium & autentik di Lombok Tengah. Setiap perjalanan adalah cerita.</p>
                    <div class="social-icons" style="margin-top: 20px;">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Kontak Kami</h4>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Raya Kuta, Kec. Pujut, Lombok Tengah, NTB</li>
                        <li><i class="fas fa-phone"></i> +62 370 1234 567</li>
                        <li><i class="fas fa-envelope"></i> info@senjaloka.com</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/#destinations">Pantai</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                &copy; 2026 SenjaLoka - Travel Lombok Tengah. All Rights Reserved.
            </div>
        </div>
    </footer>

</body>
</html>
