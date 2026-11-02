<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Destinasi - Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .wrapper {
            width: 100%;
            max-width: 680px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .header h1 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-base);
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: transparent;
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-pill);
            padding: 8px 18px;
            color: var(--text-subdued);
            font-family: 'Poppins', sans-serif;
            font-size: 0.82rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            border-color: var(--text-base);
            color: var(--text-base);
        }

        .card-form {
            background: var(--bg-surface);
            border-radius: var(--radius-card);
            padding: 36px 32px;
        }

        .error-box {
            background: rgba(231, 76, 60, 0.1);
            border: 1px solid rgba(231, 76, 60, 0.3);
            border-radius: var(--radius-card);
            padding: 14px 18px;
            margin-bottom: 24px;
            font-size: 0.85rem;
            color: #e74c3c;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--text-subdued);
            margin-bottom: 8px;
        }

        .form-label .required {
            color: var(--accent-green);
        }

        .pill-input {
            width: 100%;
            background: var(--bg-elevated);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-pill);
            padding: 12px 20px;
            color: var(--text-base);
            font-family: 'Poppins', sans-serif;
            font-size: 0.88rem;
            transition: border-color 0.2s ease;
            outline: none;
        }

        .pill-input:focus {
            border-color: var(--accent-green);
        }

        .pill-input::placeholder {
            color: #535353;
        }

        select.pill-input {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23b3b3b3' viewBox='0 0 16 16'%3E%3Cpath d='M1.5 5.5l6.5 6 6.5-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
        }

        select.pill-input option {
            background: var(--bg-elevated);
            color: var(--text-base);
        }

        textarea.pill-input {
            border-radius: var(--radius-card);
            resize: vertical;
            min-height: 90px;
            line-height: 1.6;
        }

        .row-fields {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .image-section {
            margin-bottom: 24px;
        }

        .image-preview {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 10px;
            border: 1px solid var(--border-subtle);
        }

        .file-input-wrapper {
            position: relative;
        }

        .file-input-wrapper input[type="file"] {
            width: 100%;
            background: var(--bg-elevated);
            border: 1px dashed var(--border-subtle);
            border-radius: var(--radius-pill);
            padding: 12px 20px;
            color: var(--text-subdued);
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem;
            cursor: pointer;
            transition: border-color 0.2s ease;
        }

        .file-input-wrapper input[type="file"]:hover {
            border-color: var(--accent-green);
        }

        .file-input-wrapper input[type="file"]::file-selector-button {
            background: var(--bg-elevated);
            color: var(--accent-green);
            border: 1px solid var(--accent-green);
            border-radius: var(--radius-pill);
            padding: 6px 16px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            margin-right: 12px;
            transition: all 0.2s ease;
        }

        .file-input-wrapper input[type="file"]::file-selector-button:hover {
            background: var(--accent-green);
            color: var(--bg-base);
        }

        .hint-text {
            display: block;
            margin-top: 8px;
            font-size: 0.75rem;
            color: #535353;
        }

        .error-msg {
            display: block;
            margin-top: 6px;
            font-size: 0.78rem;
            color: #e74c3c;
        }

        .btn-submit {
            width: 100%;
            padding: 14px 24px;
            background: var(--accent-green);
            color: var(--bg-base);
            border: none;
            border-radius: var(--radius-pill);
            font-family: 'Poppins', sans-serif;
            font-size: 0.92rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 8px;
        }

        .btn-submit:hover {
            background: var(--accent-green-hover);
            transform: scale(1.01);
        }

        .btn-submit svg {
            width: 18px;
            height: 18px;
        }

        @media (max-width: 600px) {
            .row-fields { grid-template-columns: 1fr; }
            .card-form { padding: 24px 20px; }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>Edit Destinasi</h1>
            <a href="javascript:history.back()" class="btn-back">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="M12 19l-7-7 7-7"/></svg>
                Kembali
            </a>
        </div>

        <div class="card-form">
            <form action="{{ route('admin.destinations.update', $destination) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <input type="hidden" name="redirect" value="{{ url()->previous() }}">

                @if ($errors->any())
                    <div class="error-box">
                        Perbaiki kesalahan berikut sebelum menyimpan.
                    </div>
                @endif

                <div class="form-group">
                    <label class="form-label">Judul Destinasi <span class="required">*</span></label>
                    <input type="text" name="title" class="pill-input @error('title') error @enderror" required value="{{ old('title', $destination->title) }}">
                    @error('title') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="pill-input @error('description') error @enderror" rows="3">{{ old('description', $destination->description) }}</textarea>
                    @error('description') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Kategori <span class="required">*</span></label>
                    <select name="category" id="category" class="pill-input @error('category') error @enderror" required>
                        <option value="">Pilih Kategori</option>
                        <option value="pantai" {{ old('category', $destination->category) == 'pantai' ? 'selected' : '' }}>Pantai</option>
                        <option value="bukit" {{ old('category', $destination->category) == 'bukit' ? 'selected' : '' }}>Bukit</option>
                        <option value="air terjun" {{ old('category', $destination->category) == 'air terjun' ? 'selected' : '' }}>Air Terjun</option>
                        <option value="lainnya" {{ old('category', $destination->category) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('category') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Lokasi <span class="required">*</span></label>
                    <input type="text" name="location" class="pill-input @error('location') error @enderror" required value="{{ old('location', $destination->location) }}">
                    @error('location') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div class="form-group image-section">
                    <label class="form-label">Gambar</label>
                    @if ($destination->image)
                        <div><img src="{{ asset('storage/' . $destination->image) }}" alt="Preview" class="image-preview"></div>
                    @endif
                    <div class="file-input-wrapper">
                        <input type="file" name="image" accept="image/*">
                    </div>
                    <small class="hint-text">Biarkan kosong jika tidak ingin mengubah gambar</small>
                </div>

                <button type="submit" class="btn-submit">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Perbarui Destinasi
                </button>
            </form>
        </div>
    </div>
</body>
</html>
