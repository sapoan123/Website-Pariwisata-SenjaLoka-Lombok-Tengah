<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Foto - SenjaLoka Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-base: #121212;
            --bg-surface: #181818;
            --bg-elevated: #1f1f1f;
            --text-base: #ffffff;
            --text-subdued: #b3b3b3;
            --accent-green: #1ed760;
            --accent-green-hover: #1ed760cc;
            --error: #f3727f;
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
        .main-content { max-width: 600px; margin: 60px auto; padding: 0 20px; }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }
        .header h4 { font-size: 1.15rem; font-weight: 600; color: var(--text-base); }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 18px;
            font-size: 0.82rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            color: var(--text-subdued);
            background: transparent;
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-pill);
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .btn-back:hover { color: var(--text-base); border-color: #535353; }

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

        .error-box {
            background: rgba(243, 114, 127, 0.1);
            border: 1px solid rgba(243, 114, 127, 0.3);
            border-radius: var(--radius-card);
            padding: 14px 18px;
            margin-bottom: 20px;
        }
        .error-box ul { list-style: none; padding: 0; margin: 0; }
        .error-box ul li { color: var(--error); font-size: 0.82rem; padding: 2px 0; }

        .card-form {
            background: var(--bg-surface);
            border-radius: var(--radius-card);
            border: 1px solid var(--border-subtle);
            padding: 32px;
        }

        .form-group { margin-bottom: 22px; }
        .form-label {
            display: block;
            font-weight: 500;
            font-size: 0.82rem;
            color: var(--text-subdued);
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 10px 16px;
            font-size: 0.85rem;
            font-family: 'Poppins', sans-serif;
            color: var(--text-base);
            background: var(--bg-elevated);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-pill);
            outline: none;
            transition: border-color 0.2s ease;
        }
        .form-control:focus { border-color: var(--text-base); }
        .form-control::placeholder { color: #535353; }

        input[type="file"].form-control {
            border-radius: var(--radius-pill);
            padding: 9px 16px;
            cursor: pointer;
            color: var(--text-subdued);
        }
        input[type="file"].form-control::file-selector-button {
            background: var(--bg-elevated);
            color: var(--text-base);
            border: 1px solid #535353;
            border-radius: var(--radius-pill);
            padding: 5px 16px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-right: 12px;
        }
        input[type="file"].form-control::file-selector-button:hover { border-color: var(--text-base); }

        .form-hint { font-size: 0.75rem; color: #535353; margin-top: 6px; }

        .preview-img {
            width: 200px;
            height: 130px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid var(--border-subtle);
            margin-bottom: 10px;
        }

        .btn-submit {
            width: 100%;
            padding: 12px 24px;
            font-size: 0.88rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            color: #000;
            background: var(--accent-green);
            border: none;
            border-radius: var(--radius-pill);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s ease;
        }
        .btn-submit:hover { background: #1ed760dd; transform: scale(1.01); }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="header">
            <h4>Edit Foto Galeri</h4>
            <a href="{{ route('admin.galleries.index') }}" class="btn-back">&#8592; Kembali</a>
        </div>

        @if(session('success'))
            <div class="flash-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

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
            <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="form-group">
                    <label class="form-label">Foto</label>
                    @if ($gallery->image)
                        <div>
                            @if(filter_var($gallery->image, FILTER_VALIDATE_URL))
                                <img src="{{ $gallery->image }}" class="preview-img" alt="Preview">
                            @else
                                <img src="{{ asset('storage/' . $gallery->image) }}" class="preview-img" alt="Preview">
                            @endif
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <div class="form-hint">Biarkan kosong jika tidak ingin mengubah foto</div>
                </div>

                <div class="form-group">
                    <label class="form-label">Judul Foto</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}" placeholder="Masukkan judul foto">
                </div>

                <div class="form-group" style="margin-bottom:28px;">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="caption" class="form-control" value="{{ old('caption', $gallery->caption) }}" placeholder="Masukkan keterangan foto">
                </div>

                <button type="submit" class="btn-submit">&#10003; Perbarui Foto</button>
            </form>
        </div>
    </div>
</body>
</html>
