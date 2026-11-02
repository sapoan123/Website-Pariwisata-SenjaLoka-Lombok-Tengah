<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Destinasi - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --bg-base: #121212;
            --bg-surface: #181818;
            --bg-elevated: #1f1f1f;
            --text-base: #ffffff;
            --text-subdued: #b3b3b3;
            --accent-green: #1ed760;
            --accent-green-hover: #1fdf64;
            --accent-green-pressed: #169c46;
            --border-subtle: #282828;
            --radius-card: 8px;
            --radius-pill: 9999px;
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

        .page-wrapper {
            max-width: 680px;
            margin: 0 auto;
            padding: 48px 24px 80px;
        }

        /* ── Header ── */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
        }

        .page-header h1 {
            font-size: 1.35rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            color: var(--text-base);
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 18px;
            border-radius: var(--radius-pill);
            border: 1px solid var(--border-subtle);
            background: transparent;
            color: var(--text-subdued);
            font-family: 'Poppins', sans-serif;
            font-size: 0.82rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
        }

        .btn-back:hover {
            border-color: var(--text-base);
            color: var(--text-base);
        }

        /* ── Error alert ── */
        .error-alert {
            background: rgba(230, 57, 57, 0.1);
            border: 1px solid rgba(230, 57, 57, 0.3);
            border-radius: var(--radius-card);
            padding: 14px 18px;
            margin-bottom: 24px;
            font-size: 0.85rem;
            color: #f87171;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .error-alert i {
            margin-top: 2px;
            flex-shrink: 0;
        }

        .error-alert ul {
            margin: 4px 0 0 0;
            padding-left: 18px;
            list-style: disc;
        }

        .error-alert ul li { margin-top: 2px; }

        /* ── Card ── */
        .form-card {
            background: var(--bg-surface);
            border-radius: var(--radius-card);
            padding: 36px 32px 40px;
            border: 1px solid var(--border-subtle);
        }

        /* ── Form elements ── */
        .field { margin-bottom: 22px; }

        .field-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--text-base);
            margin-bottom: 8px;
            letter-spacing: 0.01em;
        }

        .field-label .required {
            color: var(--accent-green);
            margin-left: 2px;
        }

        .field-label .optional {
            color: var(--text-subdued);
            font-weight: 400;
            font-size: 0.75rem;
            margin-left: 4px;
        }

        .input,
        .select,
        .textarea {
            width: 100%;
            padding: 12px 16px;
            border-radius: var(--radius-pill);
            border: none;
            background: var(--bg-elevated);
            color: var(--text-base);
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem;
            box-shadow: inset 0 0 0 1px var(--border-subtle);
            transition: var(--transition);
            outline: none;
        }

        .input::placeholder,
        .textarea::placeholder {
            color: #535353;
        }

        .input:focus,
        .select:focus,
        .textarea:focus {
            box-shadow: inset 0 0 0 1px var(--text-subdued);
        }

        .input.has-error,
        .select.has-error,
        .textarea.has-error {
            box-shadow: inset 0 0 0 1px #e63946;
        }

        .select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' fill='%23b3b3b3'%3E%3Cpath d='M1 1l5 5 5-5'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
            cursor: pointer;
        }

        .select option {
            background: var(--bg-elevated);
            color: var(--text-base);
        }

        .textarea {
            border-radius: 16px;
            resize: vertical;
            min-height: 100px;
        }

        .field-error {
            display: block;
            margin-top: 6px;
            font-size: 0.75rem;
            color: #f87171;
        }

        .field-hint {
            display: block;
            margin-top: 6px;
            font-size: 0.73rem;
            color: var(--text-subdued);
        }

        /* ── Row layout ── */
        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        @media (max-width: 520px) {
            .field-row { grid-template-columns: 1fr; }
        }

        /* ── File input ── */
        .file-input-wrapper {
            position: relative;
        }

        .file-input {
            width: 100%;
            padding: 12px 16px;
            border-radius: var(--radius-pill);
            border: none;
            background: var(--bg-elevated);
            color: var(--text-subdued);
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem;
            box-shadow: inset 0 0 0 1px var(--border-subtle);
            transition: var(--transition);
            outline: none;
            cursor: pointer;
        }

        .file-input::file-selector-button {
            background: var(--bg-base);
            color: var(--text-base);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-pill);
            padding: 6px 16px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            margin-right: 12px;
            transition: var(--transition);
        }

        .file-input::file-selector-button:hover {
            border-color: var(--text-subdued);
        }

        .file-input.has-error {
            box-shadow: inset 0 0 0 1px #e63946;
        }

        /* ── Submit button ── */
        .btn-submit {
            width: 100%;
            padding: 14px 32px;
            border-radius: var(--radius-pill);
            border: none;
            background: var(--accent-green);
            color: #000000;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 8px;
            letter-spacing: 0.01em;
        }

        .btn-submit:hover {
            background: var(--accent-green-hover);
            transform: scale(1.01);
        }

        .btn-submit:active {
            background: var(--accent-green-pressed);
            transform: scale(0.99);
        }

        .btn-submit i { font-size: 0.95rem; }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="page-header">
            <h1>Tambah Destinasi {{ $category ? ucfirst($category) : 'Baru' }}</h1>
            <a href="javascript:history.back()" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="error-alert">
                <i class="fas fa-circle-exclamation"></i>
                <div>
                    <strong>Perbaiki kesalahan berikut:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="form-card">
            <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="redirect" value="{{ url()->previous() }}">

                <div class="field">
                    <label class="field-label">Judul Destinasi <span class="required">*</span></label>
                    <input type="text" name="title" class="input @error('title') has-error @enderror" value="{{ old('title') }}" placeholder="Cth: Pantai Kuta Mandalika" required>
                    @error('title') <span class="field-error">{{ $message }}</span> @enderror
                </div>

                <div class="field">
                    <label class="field-label">Kategori <span class="required">*</span></label>
                    <select name="category" id="category" class="select @error('category') has-error @enderror" required>
                        <option value="">Pilih Kategori</option>
                        <option value="pantai" {{ old('category', $category) == 'pantai' ? 'selected' : '' }}>Pantai</option>
                        <option value="bukit" {{ old('category', $category) == 'bukit' ? 'selected' : '' }}>Bukit</option>
                        <option value="air terjun" {{ old('category', $category) == 'air terjun' ? 'selected' : '' }}>Air Terjun</option>
                        <option value="lainnya" {{ old('category', $category) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('category') <span class="field-error">{{ $message }}</span> @enderror
                </div>

                <div class="field">
                    <label class="field-label">Deskripsi <span class="optional">(opsional)</span></label>
                    <textarea name="description" class="textarea @error('description') has-error @enderror" rows="3" placeholder="Deskripsi singkat tentang destinasi">{{ old('description') }}</textarea>
                    @error('description') <span class="field-error">{{ $message }}</span> @enderror
                </div>

                <div class="field">
                    <label class="field-label">Lokasi <span class="required">*</span></label>
                    <input type="text" name="location" class="input @error('location') has-error @enderror" value="{{ old('location') }}" placeholder="Cth: Kuta, Lombok Tengah" required>
                    @error('location') <span class="field-error">{{ $message }}</span> @enderror
                </div>

                <div class="field">
                    <label class="field-label">Gambar <span class="required">*</span></label>
                    <input type="file" name="image" class="file-input @error('image') has-error @enderror" accept="image/*" required>
                    @error('image') <span class="field-error">{{ $message }}</span> @enderror
                    <span class="field-hint">Format: JPEG, PNG, JPG, Webp. Maks 2MB</span>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Simpan Destinasi
                </button>
            </form>
        </div>
    </div>
</body>
</html>
