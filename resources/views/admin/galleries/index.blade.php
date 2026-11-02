<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Galeri - Admin SenjaLoka</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

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
            --shadow-card: 0 8px 8px rgba(0, 0, 0, 0.3);
            --sidebar-width: 270px;
            --header-height: 76px;
            --font-family: 'Poppins', sans-serif;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-base);
            color: var(--text-base);
            font-size: 14px;
            line-height: 1.5;
            min-height: 100vh;
        }

        a { color: inherit; text-decoration: none; }

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
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── Top Navbar ── */
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

        .topbar-title { font-size: 16px; font-weight: 700; }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-left: auto;
        }

        .topbar-actions form {
            display: inline-flex;
        }

        /* ── Buttons ── */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 1px solid var(--border-default);
            border-radius: var(--radius-pill);
            font-family: var(--font-family);
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
            width: 34px; height: 34px; padding: 0;
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: 50%; border: 1px solid var(--border-default);
            background: transparent; color: var(--text-subdued);
            cursor: pointer; transition: all 0.2s ease; font-size: 0.8rem;
        }

        .btn-icon:hover { color: var(--text-base); border-color: var(--text-base); }
        .btn-icon-confirm:hover { color: var(--accent-green); border-color: var(--accent-green); background: rgba(30, 215, 96, 0.08); }
        .btn-icon-reject:hover { color: var(--error); border-color: var(--error); background: rgba(243, 114, 127, 0.08); }
        .btn-icon-edit:hover { color: var(--info); border-color: var(--info); background: rgba(83, 157, 245, 0.08); }
        .btn-icon-delete:hover { color: var(--error); border-color: var(--error); background: rgba(243, 114, 127, 0.08); }

        .actions-cell { display: flex; align-items: center; gap: 6px; white-space: nowrap; }
        .actions-cell form { display: inline; }

        /* ── Content Area ── */
        .content { padding: 24px 28px; flex: 1; }

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
        }

        .flash-success i { font-size: 16px; }

        /* ── Card ── */
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

        .card-header-left { display: flex; align-items: center; gap: 10px; }
        .card-header-title { font-size: 15px; font-weight: 700; }

        .card-header-count {
            background: var(--bg-elevated);
            color: var(--text-subdued);
            font-size: 11px;
            font-weight: 700;
            padding: 2px 10px;
            border-radius: var(--radius-pill);
        }

        .card-body { padding: 0; }

        /* ── Table ── */
        .table-wrapper { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 920px;
        }

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
            white-space: nowrap;
        }

        tbody td {
            padding: 12px 16px;
            font-size: 13px;
            color: var(--text-bright);
            border-bottom: 1px solid var(--border-subtle);
            vertical-align: middle;
        }

        tbody tr:hover { background: var(--bg-hover); }
        tbody tr:last-child td { border-bottom: none; }

        /* ── Gallery Image ── */
        .gallery-thumb {
            width: 60px;
            height: 45px;
            object-fit: cover;
            border-radius: 6px;
            display: block;
        }

        .gallery-title { font-weight: 500; color: var(--text-base); }
        .gallery-caption {
            font-size: 11px;
            color: var(--text-subdued);
            margin-top: 2px;
        }

        /* ── Status Badges ── */
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

        /* ── Actions ── */
        .actions { display: flex; gap: 6px; align-items: center; }

        /* ── Date Column ── */
        .col-date {
            font-size: 12px;
            color: var(--text-subdued);
            white-space: nowrap;
        }

        /* ── Empty State ── */
        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: var(--text-subdued);
        }

        .empty-state i { font-size: 40px; margin-bottom: 12px; display: block; opacity: 0.4; }
        .empty-state p { font-size: 14px; }

        /* ── Pagination ── */
        .pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 18px 22px;
            border-top: 1px solid var(--border-subtle);
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 4px;
            list-style: none;
        }

        .pagination a, .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px; height: 34px;
            border-radius: 50%;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-subdued);
            transition: all .15s ease;
        }

        .pagination a:hover { color: var(--text-base); background: var(--bg-hover); }

        .pagination .active span {
            background: var(--accent-green);
            color: #000;
            font-weight: 700;
        }

        .pagination .disabled span {
            color: #555;
            pointer-events: none;
        }

        /* ── Responsive ── */
        @media (max-width: 992px) {
            .sidebar { display: none; }
            .main { margin-left: 0; }
        }
    </style>
</head>
<body>

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
    @php
        $pendingPantai = \App\Models\Destination::where('status', 'pending')->where('category', 'pantai')->count();
        $pendingBukit = \App\Models\Destination::where('status', 'pending')->whereIn('category', ['bukit', 'air terjun'])->count();
        $pendingGaleri = \App\Models\Gallery::where('status', 'pending')->count();
    @endphp
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

<!-- ── Main ── -->
<div class="main">

    <!-- Top Navbar -->
    <div class="topbar">
        <div class="topbar-title">Manajemen Galeri Foto</div>
        <div class="topbar-actions">
            <a href="{{ route('admin.galleries.create') }}" class="btn btn-green">
                <i class="fas fa-plus"></i> Tambah Foto
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </button>
            </form>
        </div>
    </div>

    <!-- Content -->
    <div class="content">

        @if(session('success'))
            <div class="flash-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="card-header-left">
                    <span class="card-header-title">Galeri Foto</span>
                    <span class="card-header-count">{{ $galleries->total() }} foto</span>
                </div>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Judul / Caption</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($galleries as $i => $g)
                                <tr>
                                    <td>{{ $galleries->firstItem() + $i }}</td>
                                    <td>
                                        @if(filter_var($g->image, FILTER_VALIDATE_URL))
                                            <img class="gallery-thumb" src="{{ $g->image }}" alt="{{ $g->caption }}">
                                        @else
                                            <img class="gallery-thumb" src="{{ asset('storage/' . $g->image) }}" alt="{{ $g->caption }}">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="gallery-title">{{ $g->title ?: '(tanpa judul)' }}</div>
                                        @if($g->caption)
                                            <div class="gallery-caption">{{ $g->caption }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($g->status === 'approved')
                                            <span class="badge badge-approved">Approved</span>
                                        @elseif($g->status === 'rejected')
                                            <span class="badge badge-rejected">Ditolak</span>
                                        @else
                                            <span class="badge badge-pending">Pending</span>
                                        @endif
                                    </td>
                                    <td class="col-date">{{ $g->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="actions-cell">
                                            @if($g->status === 'pending')
                                                <form method="POST" action="{{ route('admin.galleries.approve', $g) }}">
                                                    @csrf
                                                    <button type="submit" class="btn-icon btn-icon-confirm" title="Setujui">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                                <form method="POST" action="{{ route('admin.galleries.reject', $g) }}" onsubmit="return confirm('Tolak foto ini?')">
                                                    @csrf
                                                    <button type="submit" class="btn-icon btn-icon-reject" title="Tolak">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('admin.galleries.edit', $g) }}" class="btn-icon btn-icon-edit" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.galleries.destroy', $g) }}" onsubmit="return confirm('Hapus foto ini?')">
                                                @csrf
                                                @method('DELETE')
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
                                            <i class="fas fa-images"></i>
                                            <p>Belum ada foto galeri.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($galleries->hasPages())
                    <div class="pagination-wrapper">
                        {{ $galleries->links() }}
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>

</body>
</html>
