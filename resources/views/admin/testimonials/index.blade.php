<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni - SenjaLoka Admin</title>
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
            --accent-green-hover: #1fdf64;
            --error: #f3727f;
            --warning: #ffa42b;
            --info: #539df5;
            --border-subtle: #282828;
            --border-default: #4d4d4d;
            --border-medium: #4d4d4d;
            --radius-card: 8px;
            --radius-pill: 9999px;
            --shadow-card: 0 8px 8px rgba(0,0,0,0.3);
            --sidebar-width: 270px;
            --header-height: 76px;
            --transition: all 0.2s ease;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-base);
            color: var(--text-base);
            font-size: 14px;
            line-height: 1.5;
            min-height: 100vh;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            background: var(--bg-base);
            min-height: 100vh;
            width: var(--sidebar-width);
            position: fixed;
            left: 0; top: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            border-right: 1px solid var(--border-subtle);
        }

        .sidebar .logo {
            height: var(--header-height);
            color: var(--text-base);
            font-size: 1.15rem;
            font-weight: 600;
            padding: 0 24px;
            border-bottom: 1px solid var(--border-subtle);
            display: flex;
            align-items: center;
        }
        .sidebar .logo span { color: var(--accent-green); }

        .sidebar .profile {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border-subtle);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar .profile .avatar {
            width: 40px; height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent-green), #178a42);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-base);
            font-weight: 700;
            font-size: 0.85rem;
            flex-shrink: 0;
        }
        .sidebar .profile .info { min-width: 0; }
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
            font-weight: 600;
            padding: 20px 24px 8px;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .sidebar .nav-link {
            color: var(--text-subdued);
            padding: 10px 20px;
            margin: 1px 12px;
            font-size: 0.85rem;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 6px;
            font-weight: 500;
            text-decoration: none;
        }
        .sidebar .nav-link:hover {
            color: var(--text-base);
            background: var(--bg-hover);
        }
        .sidebar .nav-link.active {
            color: var(--text-base);
            background: var(--bg-elevated);
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
            background: rgba(30,215,96,0.15);
            color: var(--accent-green);
            font-size: 0.65rem;
            font-weight: 600;
            padding: 2px 8px;
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
            background: rgba(243,114,127,0.1);
        }

        /* ── MAIN ── */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 0 32px;
        }
        .main-content > .topbar + * { margin-top: 24px; }

        /* ── TOPBAR ── */
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
        .topbar .title {
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
        .topbar-actions form {
            display: inline-flex;
        }

        /* ── BUTTONS ── */
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
            background: var(--accent-green-hover);
            border-color: var(--accent-green-hover);
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
            color: var(--text-base);
            border-color: var(--text-base);
            background: var(--bg-hover);
        }
        .btn-outline:active { background: var(--bg-elevated); }

        .btn-icon {
            width: 34px; height: 34px; padding: 0;
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: 50%; border: 1px solid var(--border-default);
            background: transparent; color: var(--text-subdued);
            cursor: pointer; transition: all 0.2s ease; font-size: 0.8rem;
            text-decoration: none;
        }
        .btn-icon:hover { color: var(--text-base); border-color: var(--text-base); }
        .btn-icon-approve:hover { color: var(--accent-green); border-color: var(--accent-green); background: rgba(30,215,96,0.08); }
        .btn-icon-reject:hover { color: var(--error); border-color: var(--error); background: rgba(243,114,127,0.08); }
        .btn-icon-edit:hover { color: var(--info); border-color: var(--info); background: rgba(83,157,245,0.08); }
        .btn-icon-delete:hover { color: var(--error); border-color: var(--error); background: rgba(243,114,127,0.08); }

        .actions-cell { display: flex; align-items: center; gap: 6px; white-space: nowrap; }
        .actions-cell form { display: inline; }

        /* ── FLASH MESSAGE ── */
        .flash-message {
            background: rgba(30,215,96,0.1);
            border: 1px solid rgba(30,215,96,0.25);
            border-radius: var(--radius-card);
            padding: 14px 20px;
            margin-bottom: 20px;
            font-size: 0.85rem;
            color: var(--accent-green);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ── CARD / TABLE ── */
        .card-spotify {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-card);
            overflow: hidden;
            box-shadow: var(--shadow-card);
        }
        .card-spotify .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border-subtle);
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-spotify .card-header .label {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-base);
        }
        .card-spotify .card-header .count {
            color: var(--text-subdued);
            font-size: 0.8rem;
            font-weight: 400;
        }

        .table-wrap { overflow-x: auto; }

        .table-spotify {
            width: 100%;
            border-collapse: collapse;
        }
        .table-spotify thead th {
            padding: 12px 16px;
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--text-subdued);
            text-transform: uppercase;
            letter-spacing: 1.4px;
            border-bottom: 1px solid var(--border-subtle);
            text-align: left;
            white-space: nowrap;
        }
        .table-spotify tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-subtle);
            font-size: 0.85rem;
            color: var(--text-bright);
        }
        .table-spotify tbody tr:last-child td { border-bottom: none; }
        .table-spotify tbody tr { transition: background 0.15s ease; }
        .table-spotify tbody tr:hover { background: var(--bg-hover); }

        .avatar-sm {
            width: 40px; height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .avatar-fallback {
            width: 40px; height: 40px;
            border-radius: 50%;
            background: var(--bg-elevated);
            border: 1px solid var(--border-subtle);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--text-subdued);
        }

        .star-display {
            color: var(--text-subdued);
            font-size: 0.85rem;
            letter-spacing: 2px;
        }
        .star-display .filled { color: var(--accent-green); }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: var(--radius-pill);
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .status-approved {
            background: rgba(30,215,96,0.12);
            color: var(--accent-green);
        }
        .status-pending {
            background: rgba(255,164,43,0.12);
            color: var(--warning);
        }

        .text-ellipsis {
            max-width: 260px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: var(--text-subdued);
            font-size: 0.83rem;
        }
        .text-ellipsis::before { content: '\201C'; }
        .text-ellipsis::after { content: '\201D'; }

        .actions-cell {
            white-space: nowrap;
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: var(--text-subdued);
        }
        .empty-state i {
            font-size: 2rem;
            margin-bottom: 12px;
            display: block;
            opacity: 0.4;
        }

        /* ── PAGINATION ── */
        .pagination-wrap {
            padding: 14px 24px;
            border-top: 1px solid var(--border-subtle);
            display: flex;
            justify-content: center;
        }
        .pagination { display: flex; gap: 6px; list-style: none; }
        .pagination li a,
        .pagination li span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px; height: 34px;
            padding: 0 10px;
            border-radius: 50%;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--text-subdued);
            background: transparent;
            border: 1px solid var(--border-subtle);
            text-decoration: none;
            transition: var(--transition);
        }
        .pagination li a:hover {
            color: var(--text-base);
            border-color: var(--text-base);
            background: var(--bg-hover);
        }
        .pagination li.active span {
            background: var(--accent-green);
            color: #000;
            border-color: var(--accent-green);
            font-weight: 700;
        }
        .pagination li.disabled span {
            opacity: 0.3;
            pointer-events: none;
        }
    </style>
</head>
<body>

    <!-- ── SIDEBAR ── -->
    <div class="sidebar">
        <div class="logo">Senja<span>Loka</span></div>

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
            <span class="tiny-dot"></span> Bukit & Air Terjun
            @if(\App\Models\Destination::where('status','pending')->whereIn('category',['bukit','air terjun'])->count() > 0)
                <span class="badge-count">{{ \App\Models\Destination::where('status','pending')->whereIn('category',['bukit','air terjun'])->count() }}</span>
            @endif
        </a>
        <a href="{{ route('admin.galleries.index') }}" class="nav-link{{ request()->routeIs('admin.galleries.*') ? ' active' : '' }}">
            <span class="tiny-dot"></span> Galeri
            @if(\App\Models\Gallery::where('status','pending')->count() > 0)
                <span class="badge-count">{{ \App\Models\Gallery::where('status','pending')->count() }}</span>
            @endif
        </a>
        <a href="{{ route('admin.testimonials.index') }}" class="nav-link{{ request()->routeIs('admin.testimonials.*') ? ' active' : '' }}">
            <span class="tiny-dot"></span> Testimoni
            @if(\App\Models\Testimonial::where('status','pending')->count() > 0)
                <span class="badge-count">{{ \App\Models\Testimonial::where('status','pending')->count() }}</span>
            @endif
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

    <!-- ── MAIN CONTENT ── -->
    <div class="main-content">

        <!-- TOPBAR -->
        <div class="topbar">
            <span class="title">Manajemen Testimoni</span>
            <div class="topbar-actions">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </button>
                </form>
            </div>
        </div>

        <!-- FLASH MESSAGE -->
        @if (session('success'))
            <div class="flash-message">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <!-- TABLE CARD -->
        <div class="card-spotify">
            <div class="card-header">
                <span class="label">Daftar Testimoni</span>
                <span class="count">{{ $testimonials->total() }} total</span>
            </div>
            <div class="table-wrap">
                <table class="table-spotify">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Avatar</th>
                            <th>Nama</th>
                            <th>Rating</th>
                            <th>Isi Testimoni</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($testimonials as $i => $t)
                            <tr>
                                <td style="color:var(--text-subdued);">{{ $testimonials->firstItem() + $i }}</td>
                                <td>
                                    @if ($t->avatar)
                                        @if (filter_var($t->avatar, FILTER_VALIDATE_URL))
                                            <img src="{{ $t->avatar }}" class="avatar-sm" alt="{{ $t->name }}">
                                        @else
                                            <img src="{{ asset('storage/' . $t->avatar) }}" class="avatar-sm" alt="{{ $t->name }}">
                                        @endif
                                    @else
                                        <div class="avatar-fallback">{{ strtoupper(substr($t->name, 0, 1)) }}</div>
                                    @endif
                                </td>
                                <td style="font-weight:600;color:var(--text-base);">{{ $t->name }}</td>
                                <td>
                                    <span class="star-display">
                                        @for ($s = 1; $s <= 5; $s++)
                                            <span class="{{ $s <= $t->rating ? 'filled' : '' }}">&#9733;</span>
                                        @endfor
                                    </span>
                                </td>
                                <td>
                                    <span class="text-ellipsis">{{ Str::limit($t->content, 80) }}</span>
                                </td>
                                <td>
                                    @if ($t->status === 'approved')
                                        <span class="status-badge status-approved">Approved</span>
                                    @else
                                        <span class="status-badge status-pending">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="actions-cell">
                                        @if ($t->status !== 'approved')
                                            <form action="{{ route('admin.testimonials.approve', $t) }}" method="POST">
                                                @csrf
                                                <button class="btn-icon btn-icon-approve" title="Setujui"><i class="fas fa-check"></i></button>
                                            </form>
                                        @endif
                                        <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn-icon btn-icon-edit" title="Edit"><i class="fas fa-pen"></i></a>
                                        <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?')">
                                            @csrf @method('DELETE')
                                            <button class="btn-icon btn-icon-delete" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <i class="fas fa-comment-slash"></i>
                                        Belum ada testimoni.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($testimonials->hasPages())
                <div class="pagination-wrap">
                    {{ $testimonials->links() }}
                </div>
            @endif
        </div>

    </div>

</body>
</html>
