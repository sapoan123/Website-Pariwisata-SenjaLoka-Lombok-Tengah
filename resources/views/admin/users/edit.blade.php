<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna - SenjaLoka Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-base: #121212;
            --bg-surface: #181818;
            --bg-elevated: #1f1f1f;
            --text-base: #ffffff;
            --text-subdued: #b3b3b3;
            --accent-green: #1ed760;
            --accent-green-hover: #1db954;
            --border-subtle: #282828;
            --radius-card: 8px;
            --radius-pill: 9999px;
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

        .main-content {
            max-width: 520px;
            margin: 60px auto;
            padding: 0 20px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .page-header h1 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-base);
        }

        .btn-back {
            background: transparent;
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-pill);
            padding: 8px 18px;
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--text-subdued);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            border-color: var(--text-base);
            color: var(--text-base);
        }

        .error-box {
            background: rgba(231, 76, 60, 0.1);
            border: 1px solid rgba(231, 76, 60, 0.3);
            border-radius: var(--radius-card);
            padding: 14px 18px;
            margin-bottom: 24px;
        }

        .error-box ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .error-box ul li {
            color: #e74c3c;
            font-size: 0.82rem;
            padding: 2px 0;
        }

        .card-form {
            background: var(--bg-surface);
            border-radius: var(--radius-card);
            padding: 36px 32px;
            border: 1px solid var(--border-subtle);
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--text-subdued);
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            width: 100%;
            background: var(--bg-elevated);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-pill);
            padding: 12px 18px;
            font-size: 0.88rem;
            font-family: 'Poppins', sans-serif;
            color: var(--text-base);
            outline: none;
            transition: border-color 0.2s ease;
            -webkit-appearance: none;
            appearance: none;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent-green);
        }

        .form-control::placeholder {
            color: #535353;
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23b3b3b3' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-cancel {
            background: transparent;
            color: var(--text-subdued);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-pill);
            padding: 11px 28px;
            font-size: 0.85rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-cancel:hover {
            border-color: var(--text-base);
            color: var(--text-base);
        }

        .btn-save {
            background: var(--accent-green);
            color: #000;
            border: none;
            border-radius: var(--radius-pill);
            padding: 11px 32px;
            font-size: 0.85rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-save:hover {
            background: var(--accent-green-hover);
            transform: scale(1.03);
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="page-header">
            <h1>Edit Pengguna</h1>
            <a href="{{ route('admin.users.index') }}" class="btn-back">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="M12 19l-7-7 7-7"/></svg>
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-form">
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select">
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.users.index') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
