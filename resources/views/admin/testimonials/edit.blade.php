<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Testimoni - SenjaLoka Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --bg-base: #121212;
            --bg-surface: #181818;
            --bg-elevated: #1f1f1f;
            --text-base: #ffffff;
            --text-subdued: #b3b3b3;
            --accent-green: #1ed760;
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

        .main-content { max-width: 650px; margin: 60px auto; padding: 0 20px; }

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }
        .header-row h4 {
            font-weight: 600;
            font-size: 1.2rem;
            color: var(--text-base);
        }
        .btn-back {
            background: transparent;
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-pill);
            padding: 8px 18px;
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--text-subdued);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.25s ease;
            font-family: 'Poppins', sans-serif;
        }
        .btn-back:hover {
            border-color: var(--text-base);
            color: var(--text-base);
        }

        .card-form {
            background: var(--bg-surface);
            border-radius: var(--radius-card);
            padding: 32px;
            border: 1px solid var(--border-subtle);
        }

        .form-label {
            display: block;
            font-weight: 500;
            font-size: 0.85rem;
            color: var(--text-subdued);
            margin-bottom: 8px;
        }
        .form-label .required { color: var(--accent-green); }

        .form-control,
        .form-select {
            width: 100%;
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-pill);
            padding: 12px 18px;
            font-size: 0.9rem;
            font-family: 'Poppins', sans-serif;
            color: var(--text-base);
            background: var(--bg-elevated);
            transition: border-color 0.25s ease;
            outline: none;
            -webkit-appearance: none;
        }
        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent-green);
        }
        .form-control::placeholder { color: #535353; }

        textarea.form-control {
            border-radius: var(--radius-card);
            resize: vertical;
            min-height: 100px;
        }

        .form-select {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23b3b3b3' viewBox='0 0 16 16'%3E%3Cpath d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
        }
        .form-select option {
            background: var(--bg-elevated);
            color: var(--text-base);
        }

        .row-flex {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 20px;
        }

        .form-group { margin-bottom: 20px; }

        .star-radio { display: none; }
        .star-label {
            font-size: 1.6rem;
            cursor: pointer;
            color: #282828;
            transition: 0.2s;
        }
        .star-rating {
            direction: rtl;
            display: flex;
            gap: 4px;
            justify-content: flex-end;
        }
        .star-rating .star-label:hover,
        .star-rating .star-label:hover ~ .star-label,
        .star-rating .star-radio:checked ~ .star-label {
            color: var(--accent-green);
        }

        .avatar-preview {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-subtle);
            margin-bottom: 10px;
        }

        .file-input-wrapper {
            position: relative;
        }
        .file-input-wrapper input[type="file"] {
            width: 100%;
            padding: 12px 18px;
            border: 1px dashed var(--border-subtle);
            border-radius: var(--radius-pill);
            background: var(--bg-elevated);
            color: var(--text-subdued);
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem;
            cursor: pointer;
            transition: border-color 0.25s ease;
        }
        .file-input-wrapper input[type="file"]:hover {
            border-color: var(--accent-green);
        }
        .file-input-wrapper input[type="file"]::-webkit-file-upload-button {
            background: var(--border-subtle);
            color: var(--text-base);
            border: none;
            border-radius: var(--radius-pill);
            padding: 6px 14px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.8rem;
            cursor: pointer;
            margin-right: 12px;
        }
        .file-hint {
            display: block;
            margin-top: 6px;
            font-size: 0.75rem;
            color: #535353;
        }

        .btn-submit {
            width: 100%;
            background: var(--accent-green);
            color: #000000;
            border: none;
            border-radius: var(--radius-pill);
            padding: 13px 24px;
            font-size: 0.95rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 8px;
        }
        .btn-submit:hover {
            background: #1fdf64;
            transform: scale(1.01);
        }

        @media (max-width: 576px) {
            .row-flex { grid-template-columns: 1fr; }
            .main-content { margin: 30px auto; }
            .card-form { padding: 24px; }
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="header-row">
            <h4>Edit Testimoni</h4>
            <a href="{{ route('admin.testimonials.index') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>

        <div class="card-form">
            <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row-flex">
                    <div>
                        <label class="form-label">Nama <span class="required">*</span></label>
                        <input type="text" name="name" class="form-control" required value="{{ old('name', $testimonial->name) }}">
                    </div>
                    <div>
                        <label class="form-label">Status</label>
                        <select name="role" class="form-select">
                            <option value="Wisatawan" {{ old('role', $testimonial->role) == 'Wisatawan' ? 'selected' : '' }}>Wisatawan</option>
                            <option value="Pengunjung" {{ old('role', $testimonial->role) == 'Pengunjung' ? 'selected' : '' }}>Pengunjung</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Rating <span class="required">*</span></label>
                    <div class="star-rating" id="starRating">
                        <input type="radio" name="rating" value="5" class="star-radio" id="star5" {{ $testimonial->rating == 5 ? 'checked' : '' }}>
                        <label for="star5" class="star-label">&#9733;</label>
                        <input type="radio" name="rating" value="4" class="star-radio" id="star4" {{ $testimonial->rating == 4 ? 'checked' : '' }}>
                        <label for="star4" class="star-label">&#9733;</label>
                        <input type="radio" name="rating" value="3" class="star-radio" id="star3" {{ $testimonial->rating == 3 ? 'checked' : '' }}>
                        <label for="star3" class="star-label">&#9733;</label>
                        <input type="radio" name="rating" value="2" class="star-radio" id="star2" {{ $testimonial->rating == 2 ? 'checked' : '' }}>
                        <label for="star2" class="star-label">&#9733;</label>
                        <input type="radio" name="rating" value="1" class="star-radio" id="star1" {{ $testimonial->rating == 1 ? 'checked' : '' }}>
                        <label for="star1" class="star-label">&#9733;</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Isi Testimoni <span class="required">*</span></label>
                    <textarea name="content" class="form-control" rows="4" required>{{ old('content', $testimonial->content) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Foto Avatar</label>
                    @if ($testimonial->avatar)
                        <div><img src="{{ asset('storage/' . $testimonial->avatar) }}" class="avatar-preview" alt="Avatar"></div>
                    @endif
                    <div class="file-input-wrapper">
                        <input type="file" name="avatar" accept="image/jpeg,image/png,image/jpg,image/webp">
                    </div>
                    <span class="file-hint">Biarkan kosong jika tidak ingin mengubah avatar</span>
                </div>

                <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Perbarui Testimoni</button>
            </form>
        </div>
    </div>
</body>
</html>
