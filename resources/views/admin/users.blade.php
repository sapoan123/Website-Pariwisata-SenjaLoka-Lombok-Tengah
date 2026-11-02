<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna - SenjaLoka Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
            --border-subtle: #282828;
            --border-default: #4d4d4d;
            --radius-card: 8px;
            --radius-pill: 9999px;
            --shadow-card: 0 8px 8px rgba(0,0,0,0.3);
            --sidebar-width: 270px;
            --header-height: 76px;
            --transition: all 0.2s ease;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: var(--bg-base); color: var(--text-base); font-size: 14px; line-height: 1.5; }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--bg-base); }
        ::-webkit-scrollbar-thumb { background: var(--border-default); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--text-subdued); }

        /* ── Sidebar ── */
        .sidebar {
            background: var(--bg-base);
            min-height: 100vh; width: var(--sidebar-width); position: fixed; left: 0; top: 0;
            z-index: 100; display: flex; flex-direction: column;
            border-right: 1px solid var(--border-subtle);
            overflow-y: auto;
        }
        .sidebar .logo {
            height: var(--header-height);
            font-size: 1.15rem; font-weight: 600;
            padding: 0 24px; border-bottom: 1px solid var(--border-subtle);
            display: flex; align-items: center; gap: 2px;
            letter-spacing: -0.3px;
        }
        .sidebar .logo .accent { color: var(--accent-green); }
        .sidebar .profile {
            padding: 16px 20px; border-bottom: 1px solid var(--border-subtle);
            display: flex; align-items: center; gap: 12px;
        }
        .sidebar .profile .avatar {
            width: 38px; height: 38px; border-radius: 50%;
            background: var(--accent-green);
            display: flex; align-items: center; justify-content: center;
            color: var(--bg-base); font-weight: 700; font-size: 0.85rem; flex-shrink: 0;
        }
        .sidebar .profile .info { min-width: 0; }
        .sidebar .profile .info .name {
            color: var(--text-base); font-size: 0.85rem; font-weight: 500;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .sidebar .profile .info .role {
            color: var(--text-subdued); font-size: 0.7rem; font-weight: 400;
        }
        .sidebar .section-label {
            color: var(--text-subdued); font-size: 0.7rem; font-weight: 700;
            padding: 22px 24px 8px; letter-spacing: 1.4px; text-transform: uppercase;
        }
        .sidebar .nav-link {
            color: var(--text-subdued); padding: 10px 20px; margin: 1px 12px;
            font-size: 0.85rem; transition: var(--transition);
            display: flex; align-items: center; gap: 12px;
            border-radius: 6px; font-weight: 500; text-decoration: none;
        }
        .sidebar .nav-link:hover {
            color: var(--text-base); background: var(--bg-hover);
        }
        .sidebar .nav-link.active {
            color: var(--text-base); background: rgba(30, 215, 96, 0.1);
        }
        .sidebar .nav-link i {
            width: 20px; text-align: center; font-size: 0.9rem; flex-shrink: 0;
        }
        .sidebar .tiny-dot {
            width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0;
            background: var(--text-subdued); margin: 0 7px 0 2px;
        }
        .sidebar .nav-link.active .tiny-dot { background: var(--accent-green); }
        .sidebar .nav-link .badge-count {
            margin-left: auto; background: var(--accent-green);
            color: var(--bg-base); font-size: 0.65rem; font-weight: 700;
            padding: 2px 8px; border-radius: var(--radius-pill); min-width: 20px; text-align: center;
        }
        .sidebar .bottom-links {
            margin-top: auto; border-top: 1px solid var(--border-subtle);
            padding: 8px 0;
        }
        .sidebar .bottom-links .nav-link { color: var(--error); }
        .sidebar .bottom-links .nav-link:hover { background: rgba(243,114,127,0.08); }

        /* ── Main ── */
        .main-content { margin-left: var(--sidebar-width); padding: 0 32px; }
        .main-content > .navbar-top + * { margin-top: 24px; }

        /* ── Topbar ── */
        .navbar-top {
            height: var(--header-height);
            background: var(--bg-surface);
            border-bottom: 1px solid var(--border-subtle);
            padding: 0 24px;
            display: flex; justify-content: space-between; align-items: center;
            position: sticky;
            top: 0;
            z-index: 50;
            font-size: 1.15rem;
        }
        .navbar-top .page-title {
            font-weight: 600; color: var(--text-base); font-size: 0.95rem;
        }
        .btn-pill {
            background: transparent; color: var(--text-subdued); border: 1px solid var(--border-default);
            border-radius: var(--radius-pill); padding: 7px 20px; font-size: 0.75rem; font-weight: 700;
            font-family: 'Poppins', sans-serif; cursor: pointer; transition: var(--transition);
            display: inline-flex; align-items: center; gap: 8px; text-decoration: none;
            text-transform: uppercase; letter-spacing: 1.4px;
        }
        .btn-pill:hover { color: var(--text-base); border-color: var(--text-base); background: var(--bg-hover); }

        /* ── Card ── */
        .card-spotify {
            background: var(--bg-surface); border-radius: var(--radius-card); border: 1px solid var(--border-subtle);
            overflow: hidden; box-shadow: var(--shadow-card);
        }
        .card-spotify .card-header {
            background: transparent; border-bottom: 1px solid var(--border-subtle);
            font-weight: 600; padding: 18px 24px; color: var(--text-base); font-size: 0.9rem;
            display: flex; justify-content: space-between; align-items: center;
        }
        .card-spotify .card-header .count {
            color: var(--text-subdued); font-size: 0.78rem; font-weight: 400;
        }

        /* ── Table ── */
        .table-spotify { width: 100%; border-collapse: collapse; }
        .table-spotify thead th {
            font-weight: 700; font-size: 0.7rem; color: var(--text-subdued);
            border-bottom: 1px solid var(--border-subtle); padding: 12px 16px;
            text-transform: uppercase; letter-spacing: 1.2px; text-align: left;
            background: transparent;
        }
        .table-spotify tbody td {
            padding: 14px 16px; vertical-align: middle; border-bottom: 1px solid var(--border-subtle);
            font-size: 0.85rem; color: var(--text-bright);
        }
        .table-spotify tbody tr { transition: var(--transition); }
        .table-spotify tbody tr:hover { background: var(--bg-hover); }
        .table-spotify tbody tr:last-child td { border-bottom: none; }
        .table-spotify .text-muted { color: var(--text-subdued); }
        .table-spotify .text-dim { color: var(--border-default); }
        .table-spotify .fw-500 { font-weight: 500; }

        /* ── Role badges ── */
        .role-badge {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 4px 12px; border-radius: var(--radius-pill); font-size: 0.72rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.8px;
        }
        .role-admin { background: rgba(30,215,96,0.15); color: var(--accent-green); }
        .role-admin i { color: var(--accent-green); font-size: 0.65rem; }
        .role-user { background: var(--bg-elevated); color: var(--text-subdued); }
        .role-user i { font-size: 0.65rem; }

        /* ── Action buttons ── */
        .btn-icon {
            width: 34px; height: 34px; padding: 0;
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: 50%; border: 1px solid var(--border-default);
            background: transparent; color: var(--text-subdued);
            cursor: pointer; transition: all 0.2s ease; font-size: 0.8rem;
            text-decoration: none;
        }
        .btn-icon:hover { color: var(--text-base); border-color: var(--text-base); }
        .btn-icon-edit:hover { color: var(--info); border-color: var(--info); background: rgba(83, 157, 245, 0.08); }
        .btn-icon-delete { border: 1px solid var(--border-default); }
        .btn-icon-delete:hover { color: var(--error); border-color: var(--error); background: rgba(243, 114, 127, 0.08); }

        .actions-cell { display: flex; align-items: center; gap: 6px; white-space: nowrap; }
        .actions-cell form { display: inline; }

        /* ── Pagination ── */
        .pagination-wrap { padding: 14px 24px; border-top: 1px solid var(--border-subtle); }
        .pagination { display: flex; gap: 6px; list-style: none; margin: 0; padding: 0; }
        .pagination .page-item .page-link {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 34px; height: 34px; padding: 0 10px;
            background: var(--bg-elevated); color: var(--text-subdued); border: 1px solid var(--border-subtle);
            border-radius: var(--radius-pill); font-size: 0.78rem; font-weight: 500;
            text-decoration: none; transition: var(--transition);
            font-family: 'Poppins', sans-serif;
        }
        .pagination .page-item .page-link:hover { color: var(--text-base); border-color: var(--text-subdued); }
        .pagination .page-item.active .page-link {
            background: var(--accent-green); color: var(--bg-base); border-color: var(--accent-green); font-weight: 700;
        }
        .pagination .page-item.disabled .page-link { opacity: 0.4; pointer-events: none; }

        .empty-state {
            color: var(--text-subdued); padding: 48px 24px; text-align: center; font-size: 0.88rem;
        }
        .empty-state i { font-size: 2rem; display: block; margin-bottom: 12px; color: var(--border-default); }
    </style>
</head>
<body>

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
            @php $pendingPantai = \App\Models\Destination::where('status','pending')->where('category','pantai')->count(); @endphp
            @if($pendingPantai > 0)
                <span class="badge-count">{{ $pendingPantai }}</span>
            @endif
        </a>
        <a href="{{ route('admin.destinations.bukit') }}" class="nav-link{{ request()->routeIs('admin.destinations.bukit') ? ' active' : '' }}">
            <span class="tiny-dot"></span> Bukit & Air Terjun
            @php $pendingBukit = \App\Models\Destination::where('status','pending')->whereIn('category',['bukit','air terjun'])->count(); @endphp
            @if($pendingBukit > 0)
                <span class="badge-count">{{ $pendingBukit }}</span>
            @endif
        </a>
        <a href="{{ route('admin.galleries.index') }}" class="nav-link{{ request()->routeIs('admin.galleries.*') ? ' active' : '' }}">
            <span class="tiny-dot"></span> Galeri
            @php $pendingGallery = \App\Models\Gallery::where('status','pending')->count(); @endphp
            @if($pendingGallery > 0)
                <span class="badge-count">{{ $pendingGallery }}</span>
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

    <div class="main-content">
        <div class="navbar-top">
            <span class="page-title">Daftar Pengguna</span>
            <a href="{{ route('logout') }}" class="btn-pill"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
        </div>

        <div class="card-spotify">
            <div class="card-header">
                <span>Semua Pengguna</span>
                <span class="count">{{ $users->total() }} total</span>
            </div>

            <table class="table-spotify">
                <thead>
                    <tr>
                        <th style="width:50px;">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Terdaftar</th>
                        <th>Terakhir Masuk</th>
                        <th style="width:90px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $i => $u)
                        <tr>
                            <td class="text-muted">{{ $users->firstItem() + $i }}</td>
                            <td class="fw-500">{{ $u->name }}</td>
                            <td class="text-muted">{{ $u->email }}</td>
                            <td>
                                @if ($u->isAdmin())
                                    <span class="role-badge role-admin"><i class="fas fa-crown"></i> Admin</span>
                                @else
                                    <span class="role-badge role-user"><i class="fas fa-user"></i> User</span>
                                @endif
                            </td>
                            <td class="text-muted" style="font-size:0.78rem;">{{ $u->created_at->format('d M Y H:i') }}</td>
                            <td style="font-size:0.78rem;">
                                @if ($u->last_login_at)
                                    <span class="text-muted">{{ $u->last_login_at->format('d M Y H:i') }}</span>
                                @else
                                    <span class="text-dim">-</span>
                                @endif
                            </td>
                            <td style="white-space:nowrap;">
                                <div class="actions-cell">
                                    <a href="{{ route('admin.users.edit', $u) }}" class="btn-icon btn-icon-edit" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $u) }}" method="POST" onsubmit="return confirm('Hapus pengguna {{ $u->name }}?')">
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
                                    <i class="fas fa-users-slash"></i>
                                    Belum ada pengguna.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if ($users->hasPages())
                <div class="pagination-wrap">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>

</body>
</html>
