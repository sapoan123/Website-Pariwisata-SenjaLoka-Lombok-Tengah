<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SenjaLoka</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --bg-base: #121212;
            --bg-surface: #181818;
            --bg-elevated: #1f1f1f;
            --bg-hover: #252525;
            --text-base: #ffffff;
            --text-subdued: #b3b3b3;
            --text-bright: #cbcbcb;
            --accent-green: #1ed760;
            --error: #f3727f;
            --warning: #ffa42b;
            --info: #539df5;
            --border-default: #4d4d4d;
            --border-subtle: #282828;
            --radius-card: 8px;
            --radius-pill: 9999px;
            --shadow-card: 0 8px 8px rgba(0,0,0,0.3);
            --sidebar-width: 270px;
            --header-height: 76px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-base);
            color: var(--text-base);
            font-size: 14px;
            min-height: 100vh;
            line-height: 1.4;
        }

        a { color: inherit; text-decoration: none; }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--border-default); border-radius: 3px; }

        /* ── Sidebar ── */
        .sidebar {
            background: var(--bg-base);
            width: var(--sidebar-width);
            min-height: 100vh;
            position: fixed;
            left: 0; top: 0;
            border-right: 1px solid var(--border-subtle);
            display: flex;
            flex-direction: column;
            z-index: 100;
            overflow-y: auto;
            scrollbar-width: none;
        }
        .sidebar::-webkit-scrollbar { display: none; }

        .sidebar .logo {
            height: var(--header-height);
            font-size: 1.15rem; font-weight: 600;
            padding: 0 24px;
            border-bottom: 1px solid var(--border-subtle);
            display: flex; align-items: center; gap: 2px;
            letter-spacing: -0.3px;
        }
        .sidebar .logo .accent { color: var(--accent-green); }

        .sidebar .profile {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border-subtle);
            display: flex; align-items: center; gap: 12px;
        }

        .sidebar .avatar {
            width: 38px; height: 38px; border-radius: 50%;
            background: var(--accent-green);
            display: flex; align-items: center; justify-content: center;
            color: var(--bg-base); font-weight: 700; font-size: 0.85rem; flex-shrink: 0;
        }

        .sidebar .profile .info { min-width: 0; }
        .sidebar .profile .info .name {
            color: var(--text-base); font-size: 0.85rem; font-weight: 600;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .sidebar .profile .info .role { color: var(--text-subdued); font-size: 0.7rem; font-weight: 400; }

        .sidebar .section-label {
            color: var(--text-subdued); font-size: 0.7rem; font-weight: 700;
            padding: 22px 24px 8px; letter-spacing: 1.4px; text-transform: uppercase;
        }

        .sidebar .nav-link {
            color: var(--text-subdued); padding: 10px 20px; margin: 1px 12px;
            font-size: 0.85rem; font-weight: 500;
            display: flex; align-items: center; gap: 12px;
            border-radius: 6px; text-decoration: none; transition: all 0.2s ease;
        }
        .sidebar .nav-link:hover { color: var(--text-base); background: var(--bg-hover); }
        .sidebar .nav-link.active { color: var(--text-base); background: rgba(30, 215, 96, 0.1); }
        .sidebar .nav-link i { width: 20px; text-align: center; font-size: 0.9rem; flex-shrink: 0; }

        .sidebar .tiny-dot {
            width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0;
            background: var(--text-subdued); margin: 0 7px 0 2px;
        }
        .sidebar .nav-link.active .tiny-dot { background: var(--accent-green); }

        .sidebar .nav-link .badge-count {
            margin-left: auto; background: rgba(30, 215, 96, 0.18);
            color: var(--accent-green); font-size: 0.65rem; font-weight: 600;
            padding: 2px 9px; border-radius: var(--radius-pill);
            min-width: 20px; text-align: center;
        }

        .sidebar .bottom-links {
            margin-top: auto; border-top: 1px solid var(--border-subtle); padding: 8px 0;
        }
        .sidebar .bottom-links .nav-link { color: var(--error); }
        .sidebar .bottom-links .nav-link:hover { background: rgba(243, 114, 127, 0.08); }

        /* ── Main Content ── */
        .main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        /* ── Topbar ── */
        .topbar {
            height: var(--header-height);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            background: var(--bg-surface);
            border-bottom: 1px solid var(--border-subtle);
            position: sticky;
            top: 0;
            z-index: 50;
            font-size: 1.15rem;
        }

        .topbar-greeting { font-size: 16px; font-weight: 700; }

        .topbar-greeting span { color: var(--accent-green); }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 1px solid var(--border-default);
            border-radius: var(--radius-pill);
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1.4px;
            cursor: pointer;
            padding: 7px 20px;
            transition: all .2s ease;
            background: transparent;
            color: var(--text-subdued);
            text-decoration: none;
            white-space: nowrap;
            line-height: 1.4;
        }

        .btn:focus-visible {
            outline: 2px solid var(--accent-green);
            outline-offset: 2px;
        }

        .btn-green {
            background: var(--accent-green);
            color: #000;
            border-color: var(--accent-green);
        }
        .btn-green:hover {
            background: #1fdf64;
            border-color: #1fdf64;
            box-shadow: 0 4px 16px rgba(30, 215, 96, 0.3);
            transform: translateY(-1px);
        }
        .btn-green:active { transform: translateY(0); box-shadow: none; }

        .btn-outline-secondary {
            background: transparent;
            color: var(--text-subdued);
            border-color: var(--border-default);
        }
        .btn-outline-secondary:hover {
            color: var(--error);
            border-color: var(--error);
            background: rgba(243, 114, 127, 0.06);
        }
        .btn-outline-secondary:active { background: rgba(243, 114, 127, 0.12); }

        .btn-outline-green {
            background: transparent;
            color: var(--accent-green);
            border-color: var(--accent-green);
        }
        .btn-outline-green:hover {
            background: rgba(30, 215, 96, 0.1);
        }

        .btn-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-group form {
            display: inline-flex;
        }

        .content { padding: 24px 28px; }

        /* ── Flash Message ── */
        .flash-success {
            background: rgba(30, 215, 96, 0.12);
            border: 1px solid var(--accent-green);
            color: var(--accent-green);
            padding: 12px 18px;
            border-radius: var(--radius-card);
            margin-bottom: 20px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
            animation: flashSlide 2.5s ease forwards;
            transform-origin: top;
        }
        @keyframes flashSlide {
            0% { opacity: 0; transform: translateY(-20px); max-height: 0; margin-bottom: 0; padding: 0 18px; border-width: 0; }
            8% { opacity: 1; transform: translateY(0); max-height: 60px; margin-bottom: 20px; padding: 12px 18px; border-width: 1px; }
            80% { opacity: 1; transform: translateY(0); max-height: 60px; }
            100% { opacity: 0; transform: translateY(-20px); max-height: 0; margin-bottom: 0; padding: 0 18px; border-width: 0; }
        }

        /* ── Stats Grid ── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
            align-items: stretch;
        }

        .stat-card {
            background: var(--bg-surface);
            border-radius: var(--radius-card);
            padding: 20px;
            box-shadow: var(--shadow-card);
            transition: background .15s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .stat-card:hover { background: var(--bg-hover); }

        .stat-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .stat-card-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            background: rgba(30, 215, 96, 0.15);
            color: var(--accent-green);
            flex-shrink: 0;
        }

        .stat-card-value { font-size: 28px; font-weight: 700; line-height: 1; margin-bottom: 4px; }
        .stat-card-label { font-size: 12px; color: var(--text-subdued); font-weight: 500; margin-top: auto; }

        /* ── Action Row ── */
        .action-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            gap: 16px;
        }

        .action-row-title {
            font-size: 16px;
            font-weight: 700;
            letter-spacing: -0.2px;
        }

        /* ── Card / Table ── */
        .card {
            background: var(--bg-surface);
            border-radius: var(--radius-card);
            box-shadow: var(--shadow-card);
            overflow: hidden;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 22px;
            border-bottom: 1px solid var(--border-subtle);
        }

        .card-header-title { font-size: 15px; font-weight: 700; }

        table { width: 100%; border-collapse: collapse; }

        thead th {
            text-align: left;
            padding: 12px 16px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: var(--text-subdued);
            background: var(--bg-elevated);
            border-bottom: 1px solid var(--border-subtle);
        }

        tbody td {
            padding: 12px 16px;
            font-size: 13px;
            color: var(--text-bright);
            border-bottom: 1px solid var(--border-subtle);
            vertical-align: middle;
        }

        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: var(--bg-hover); }

        .dest-thumb {
            width: 44px;
            height: 44px;
            border-radius: 6px;
            object-fit: cover;
            display: block;
        }

        /* ── Badges ── */
        .badge {
            display: inline-block;
            padding: 3px 12px;
            border-radius: var(--radius-pill);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .badge-approved { background: rgba(30, 215, 96, 0.15); color: var(--accent-green); }
        .badge-pending { background: rgba(255, 164, 43, 0.15); color: var(--warning); }
        .badge-rejected { background: rgba(243, 114, 127, 0.15); color: var(--error); }

        .btn-icon {
            width: 34px; height: 34px; padding: 0;
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: 50%; border: 1px solid var(--border-default);
            background: transparent; color: var(--text-subdued);
            cursor: pointer; transition: all 0.2s ease; font-size: 0.8rem;
        }
        .btn-icon:hover { color: var(--text-base); border-color: var(--text-base); }
        .btn-icon-edit:hover { color: var(--info); border-color: var(--info); background: rgba(83, 157, 245, 0.08); }
        .btn-icon-delete:hover { color: var(--error); border-color: var(--error); background: rgba(243, 114, 127, 0.08); }

        .actions-cell { display: flex; align-items: center; gap: 6px; white-space: nowrap; }
        .actions-cell form { display: inline; }

        /* ── Empty State ── */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-subdued);
        }

        .empty-state i { font-size: 36px; margin-bottom: 12px; display: block; opacity: 0.4; }

        /* ── Responsive ── */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 992px) {
            .sidebar { display: none; }
            .main { margin-left: 0; }
        }

        @media (max-width: 600px) {
            .stats-grid { grid-template-columns: 1fr; }

            .action-row {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }

            .btn-group {
                flex-direction: column;
            }

            .btn-group .btn,
            .btn-group form {
                width: 100%;
            }

            .btn-group .btn,
            .btn-group form .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    @php
        $pendingPantai = \App\Models\Destination::where('status', 'pending')->where('category', 'pantai')->count();
        $pendingBukit = \App\Models\Destination::where('status', 'pending')->whereIn('category', ['bukit', 'air terjun'])->count();
        $pendingGaleri = \App\Models\Gallery::where('status', 'pending')->count();
    @endphp

    <!-- ── Sidebar ── -->
    <div class="sidebar">
        <div class="logo">Senja<span class="accent">Loka</span></div>

        <div class="profile">
            <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            <div class="info">
                <div class="name">{{ Auth::user()->name }}</div>
                <div class="role">Administrator</div>
            </div>
        </div>

        <div class="section-label">Menu Utama</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-link{{ request()->routeIs('admin.dashboard') ? ' active' : '' }}">
            <i class="fas fa-home"></i> Dashboard
        </a>

        <div class="section-label">Konten</div>
        <a href="{{ route('admin.destinations.index') }}" class="nav-link{{ request()->routeIs('admin.destinations.index') ? ' active' : '' }}">
            <span class="tiny-dot"></span> Destinasi Pantai
            @if($pendingPantai > 0)
                <span class="badge-count">{{ $pendingPantai }}</span>
            @endif
        </a>
        <a href="{{ route('admin.destinations.bukit') }}" class="nav-link{{ request()->routeIs('admin.destinations.bukit') ? ' active' : '' }}">
            <span class="tiny-dot"></span> Bukit & Air Terjun
            @if($pendingBukit > 0)
                <span class="badge-count">{{ $pendingBukit }}</span>
            @endif
        </a>
        <a href="{{ route('admin.galleries.index') }}" class="nav-link{{ request()->routeIs('admin.galleries.*') ? ' active' : '' }}">
            <span class="tiny-dot"></span> Galeri
            @if($pendingGaleri > 0)
                <span class="badge-count">{{ $pendingGaleri }}</span>
            @endif
        </a>
        <a href="{{ route('admin.testimonials.index') }}" class="nav-link{{ request()->routeIs('admin.testimonials.*') ? ' active' : '' }}">
            <span class="tiny-dot"></span> Testimoni
        </a>

        <div class="section-label">Pengaturan</div>
        <a href="{{ route('admin.users.index') }}" class="nav-link{{ request()->routeIs('admin.users.*') ? ' active' : '' }}">
            <i class="fas fa-users"></i> Pengguna
        </a>
        <a href="/" class="nav-link" target="_blank">
            <i class="fas fa-external-link-alt"></i> Lihat Website
        </a>

        <div class="bottom-links">
            <a href="{{ route('logout') }}" class="nav-link"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
    </div>

    <!-- ── Main Content ── -->
    <div class="main">

        <!-- Topbar -->
        <div class="topbar">
            <div class="topbar-greeting">Selamat datang, <span>{{ Auth::user()->name }}</span></div>
        </div>

        <!-- Content -->
        <div class="content">

            @if(session('success'))
                <div class="flash-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Stat Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-value">{{ $stats['destinations_approved'] ?? 0 }}</div>
                        <div class="stat-card-icon"><i class="fas fa-map-marker-alt"></i></div>
                    </div>
                    <div class="stat-card-label">Destinasi Aktif</div>
                </div>
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-value">{{ $stats['galleries'] ?? 0 }}</div>
                        <div class="stat-card-icon"><i class="fas fa-images"></i></div>
                    </div>
                    <div class="stat-card-label">Galeri</div>
                </div>
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-value">{{ $stats['testimonials_approved'] ?? 0 }}</div>
                        <div class="stat-card-icon"><i class="fas fa-quote-right"></i></div>
                    </div>
                    <div class="stat-card-label">Testimoni</div>
                </div>
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-value">{{ $stats['total_users'] ?? 0 }}</div>
                        <div class="stat-card-icon"><i class="fas fa-users"></i></div>
                    </div>
                    <div class="stat-card-label">Pengguna</div>
                </div>
            </div>

            <!-- Action Row -->
            <div class="action-row">
                <div class="action-row-title">Daftar seluruh Destinasi</div>
                <a href="{{ route('admin.destinations.create') }}" class="btn btn-green">
                    <i class="fas fa-plus"></i> Tambah Destinasi
                </a>
            </div>

            <!-- Destinations Table -->
            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th style="width:50px">No</th>
                            <th style="width:70px">Gambar</th>
                            <th>Judul</th>
                            <th>Lokasi</th>
                            <th style="width:120px">Status</th>
                            <th style="width:100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($destinations as $index => $dest)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if($dest->image)
                                        @if(filter_var($dest->image, FILTER_VALIDATE_URL))
                                            <img src="{{ $dest->image }}" alt="{{ $dest->title }}" class="dest-thumb">
                                        @else
                                            <img src="{{ asset('storage/' . $dest->image) }}" alt="{{ $dest->title }}" class="dest-thumb">
                                        @endif
                                    @else
                                        <div style="width:44px;height:44px;border-radius:6px;background:var(--bg-elevated);display:flex;align-items:center;justify-content:center;">
                                            <i class="fas fa-image" style="color:var(--text-subdued);font-size:16px;opacity:.4"></i>
                                        </div>
                                    @endif
                                </td>
                                <td style="color:var(--text-base);font-weight:500">{{ $dest->title }}</td>
                                <td>{{ $dest->location }}</td>
                                <td>
                                    @if($dest->status === 'approved')
                                        <span class="badge badge-approved">Approved</span>
                                    @elseif($dest->status === 'pending')
                                        <span class="badge badge-pending">Pending</span>
                                    @else
                                        <span class="badge badge-rejected">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="actions-cell">
                                        <a href="{{ route('admin.destinations.edit', $dest) }}" class="btn-icon btn-icon-edit" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('admin.destinations.destroy', $dest) }}" method="POST"
                                              onsubmit="return confirm('Hapus destinasi ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn-icon btn-icon-delete" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fas fa-map-marked-alt"></i>
                                        <p>Belum ada destinasi.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>
</html>
