<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi - SenjaLoka Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
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

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-base);
            color: var(--text-base);
            font-size: 14px;
            line-height: 1.5;
        }

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
        }

        .sidebar .logo {
            height: var(--header-height);
            font-size: 1.15rem;
            font-weight: 600;
            padding: 0 24px;
            border-bottom: 1px solid var(--border-subtle);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .sidebar .profile {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border-subtle);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar .avatar {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: var(--accent-green);
            display: flex; align-items: center; justify-content: center;
            color: #000; font-weight: 700; font-size: 0.85rem;
            flex-shrink: 0;
        }

        .sidebar .profile .info .name {
            color: var(--text-base);
            font-size: 0.85rem;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar .profile .info .role {
            color: var(--text-subdued);
            font-size: 0.7rem;
            font-weight: 400;
        }

        .sidebar .section-label {
            color: var(--text-subdued);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            padding: 22px 24px 8px;
        }

        .sidebar .nav-link {
            color: var(--text-subdued);
            padding: 10px 20px;
            margin: 1px 12px;
            font-size: 0.85rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 6px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .sidebar .nav-link:hover {
            color: var(--text-base);
            background: var(--bg-hover);
        }

        .sidebar .nav-link.active {
            color: var(--text-base);
            background: rgba(30, 215, 96, 0.1);
        }

        .sidebar .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .sidebar .tiny-dot {
            width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0;
            background: var(--text-subdued); margin: 0 7px 0 2px;
        }
        .sidebar .nav-link.active .tiny-dot { background: var(--accent-green); }

        .sidebar .nav-link .badge-count {
            margin-left: auto;
            background: rgba(30, 215, 96, 0.18);
            color: var(--accent-green);
            font-size: 0.65rem;
            font-weight: 600;
            padding: 2px 9px;
            border-radius: var(--radius-pill);
            min-width: 20px;
            text-align: center;
        }

        .sidebar .bottom-links {
            margin-top: auto;
            border-top: 1px solid var(--border-subtle);
            padding: 8px 0;
        }

        .sidebar .bottom-links .nav-link {
            color: var(--error);
        }

        .sidebar .bottom-links .nav-link:hover {
            background: rgba(243, 114, 127, 0.1);
        }

        /* ── Main Content ── */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 0 32px;
        }
        .main-content > .topbar + * { margin-top: 24px; }

        /* ── Topbar ── */
        .topbar {
            height: var(--header-height);
            background: var(--bg-surface);
            border-bottom: 1px solid var(--border-subtle);
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 50;
            font-size: 1.15rem;
        }

        .topbar-title {
            font-weight: 600;
            font-size: 1rem;
            color: var(--text-base);
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-left: auto;
        }

        /* ── Buttons ── */
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
            transition: all 0.2s ease;
            text-decoration: none;
            line-height: 1.4;
            white-space: nowrap;
            background: transparent;
            color: var(--text-subdued);
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

        .btn-outline {
            background: transparent;
            color: var(--text-subdued);
            border-color: var(--border-default);
        }

        .btn-outline:hover {
            color: var(--error);
            border-color: var(--error);
            background: rgba(243, 114, 127, 0.06);
        }
        .btn-outline:active { background: rgba(243, 114, 127, 0.12); }

        .btn-icon {
            width: 34px; height: 34px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: 1px solid var(--border-default);
            background: transparent;
            color: var(--text-subdued);
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 0.8rem;
        }

        .btn-icon:hover { color: var(--text-base); border-color: var(--text-base); }

        .btn-icon-approve:hover { color: var(--accent-green); border-color: var(--accent-green); background: rgba(30, 215, 96, 0.08); }
        .btn-icon-reject:hover { color: var(--error); border-color: var(--error); background: rgba(243, 114, 127, 0.08); }
        .btn-icon-edit:hover { color: var(--info); border-color: var(--info); background: rgba(83, 157, 245, 0.08); }
        .btn-icon-delete:hover { color: var(--error); border-color: var(--error); background: rgba(243, 114, 127, 0.08); }

        /* ── Flash Message ── */
        .flash-msg {
            background: rgba(30, 215, 96, 0.1);
            border: 1px solid rgba(30, 215, 96, 0.25);
            border-radius: var(--radius-card);
            padding: 14px 20px;
            margin-bottom: 20px;
            font-size: 0.85rem;
            color: var(--accent-green);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .flash-msg i { font-size: 1rem; }

        /* ── Card ── */
        .card {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-card);
            box-shadow: var(--shadow-card);
            overflow: hidden;
        }

        .card-header-custom {
            padding: 18px 24px;
            border-bottom: 1px solid var(--border-subtle);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header-custom .title {
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--text-base);
        }

        .card-header-custom .count {
            background: var(--bg-elevated);
            color: var(--text-subdued);
            font-size: 0.7rem;
            font-weight: 600;
            padding: 3px 12px;
            border-radius: var(--radius-pill);
        }

        /* ── Table ── */
        .table-wrap { overflow-x: auto; }

        .tbl {
            width: 100%;
            border-collapse: collapse;
        }

        .tbl thead th {
            font-weight: 600;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: var(--text-subdued);
            padding: 14px 16px;
            border-bottom: 1px solid var(--border-subtle);
            background: var(--bg-elevated);
            text-align: left;
            white-space: nowrap;
        }

        .tbl tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-subtle);
            font-size: 0.85rem;
            color: var(--text-bright);
        }

        .tbl tbody tr { transition: background 0.15s ease; }
        .tbl tbody tr:hover { background: var(--bg-hover); }
        .tbl tbody tr:last-child td { border-bottom: none; }

        .tbl img {
            width: 60px; height: 45px;
            object-fit: cover;
            border-radius: 4px;
        }

        .cell-title {
            font-weight: 600;
            color: var(--text-base);
        }

        .cell-sub {
            color: var(--text-subdued);
        }

        /* ── Badges ── */
        .badge-pill {
            display: inline-block;
            padding: 3px 12px;
            border-radius: var(--radius-pill);
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .badge-category {
            background: var(--bg-elevated);
            color: var(--text-subdued);
            border: 1px solid var(--border-subtle);
        }

        .badge-approved {
            background: rgba(30, 215, 96, 0.14);
            color: var(--accent-green);
        }

        .badge-pending {
            background: rgba(255, 164, 43, 0.14);
            color: var(--warning);
        }

        .badge-rejected {
            background: rgba(243, 114, 127, 0.14);
            color: var(--error);
        }

        /* ── Actions ── */
        .actions-cell {
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .actions-cell form { display: inline; }

        /* ── Empty State ── */
        .empty-state {
            text-align: center;
            padding: 56px 24px;
            color: var(--text-subdued);
        }

        .empty-state i {
            font-size: 2.5rem;
            color: var(--border-default);
            margin-bottom: 14px;
            display: block;
        }

        .empty-state p {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    {{-- ═══════════ SIDEBAR ═══════════ --}}
    <div class="sidebar">
        <div class="logo">Senja<span style="color:var(--accent-green)">Loka</span></div>

        <div class="profile">
            <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            <div class="info">
                <div class="name">{{ Auth::user()->name }}</div>
                <div class="role">Administrator</div>
            </div>
        </div>

        <div class="section-label">Menu Utama</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="fas fa-home"></i> Dashboard
        </a>

        <div class="section-label">Konten</div>

        <a href="{{ route('admin.destinations.index') }}" class="nav-link{{ request()->routeIs('admin.destinations.index') ? ' active' : '' }}">
            <span class="tiny-dot"></span> Destinasi Pantai
            @if(\App\Models\Destination::where('status','pending')->where('category','pantai')->count() > 0)
                <span class="badge-count">{{ \App\Models\Destination::where('status','pending')->where('category','pantai')->count() }}</span>
            @endif
        </a>

        <a href="{{ route('admin.destinations.bukit') }}" class="nav-link{{ request()->routeIs('admin.destinations.bukit') ? ' active' : '' }}">
            <span class="tiny-dot"></span> Bukit &amp; Air Terjun
            @if(\App\Models\Destination::where('status','pending')->whereIn('category',['bukit','air terjun'])->count() > 0)
                <span class="badge-count">{{ \App\Models\Destination::where('status','pending')->whereIn('category',['bukit','air terjun'])->count() }}</span>
            @endif
        </a>

        <a href="{{ route('admin.galleries.index') }}" class="nav-link{{ request()->routeIs('admin.galleries.index') ? ' active' : '' }}">
            <span class="tiny-dot"></span> Galeri
            @if(\App\Models\Gallery::where('status','pending')->count() > 0)
                <span class="badge-count">{{ \App\Models\Gallery::where('status','pending')->count() }}</span>
            @endif
        </a>

        <a href="{{ route('admin.testimonials.index') }}" class="nav-link{{ request()->routeIs('admin.testimonials.index') ? ' active' : '' }}">
            <span class="tiny-dot"></span> Testimoni
        </a>

        <div class="section-label">Pengaturan</div>

        <a href="{{ route('admin.users.index') }}" class="nav-link{{ request()->routeIs('admin.users.index') ? ' active' : '' }}">
            <i class="fas fa-users"></i> Pengguna
        </a>
        <a href="/" class="nav-link" target="_blank">
            <i class="fas fa-external-link-alt"></i> Lihat Website
        </a>

        <div class="bottom-links">
            <a href="{{ route('logout') }}" class="nav-link"
               onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
        </div>
        <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
    </div>

    {{-- ═══════════ MAIN CONTENT ═══════════ --}}
    <div class="main-content">

        {{-- Topbar --}}
        <div class="topbar">
            <span class="topbar-title">Manajemen Destinasi Wisata</span>
            <div class="topbar-actions">
                <a href="{{ route('admin.destinations.create', ['category' => request()->routeIs('admin.destinations.bukit') ? 'bukit' : 'pantai']) }}" class="btn btn-green">
                    <i class="fas fa-plus"></i> Tambah Destinasi
                </a>
                <a href="{{ route('logout') }}" class="btn btn-outline"
                   onclick="event.preventDefault(); document.getElementById('logout-form-topbar').submit();">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </a>
                <form id="logout-form-topbar" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
            </div>
        </div>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="flash-msg">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- Table Card --}}
        <div class="card">
            <div class="card-header-custom">
                <span class="title">Daftar Destinasi</span>
                <span class="count">{{ $destinations->count() }} total</span>
            </div>

            <div class="table-wrap">
                <table class="tbl">
                    <thead>
                        <tr>
                            <th style="width:50px;">No</th>
                            <th style="width:80px;">Gambar</th>
                            <th>Judul</th>
                            <th>Lokasi</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th style="width:160px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($destinations as $i => $d)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>
                                    @if (filter_var($d->image, FILTER_VALIDATE_URL))
                                        <img src="{{ $d->image }}" alt="{{ $d->title }}">
                                    @else
                                        <img src="{{ asset('storage/' . $d->image) }}" alt="{{ $d->title }}">
                                    @endif
                                </td>
                                <td class="cell-title">{{ $d->title }}</td>
                                <td class="cell-sub">{{ $d->location }}</td>
                                <td><span class="badge-pill badge-category">{{ $d->category }}</span></td>
                                <td>
                                    @if ($d->status === 'approved')
                                        <span class="badge-pill badge-approved">Approved</span>
                                    @elseif ($d->status === 'pending')
                                        <span class="badge-pill badge-pending">Pending</span>
                                    @else
                                        <span class="badge-pill badge-rejected">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="actions-cell">
                                        @if ($d->status === 'pending')
                                            <form action="{{ route('admin.destinations.approve', $d) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn-icon btn-icon-approve" title="Setujui">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.destinations.reject', $d) }}" method="POST"
                                                  onsubmit="return confirm('Tolak destinasi ini?')">
                                                @csrf
                                                <button type="submit" class="btn-icon btn-icon-reject" title="Tolak">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        @endif

                                        <a href="{{ route('admin.destinations.edit', $d) }}" class="btn-icon btn-icon-edit" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        <form action="{{ route('admin.destinations.destroy', $d) }}" method="POST"
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
                                <td colspan="7">
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
