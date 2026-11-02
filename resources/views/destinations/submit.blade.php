<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usulkan Destinasi - SenjaLoka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f4f6f9; }
        .main-content { max-width: 700px; margin: 40px auto; padding: 0 20px; }
        .card-form { background: #fff; border-radius: 20px; border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 30px; }
        .card-form input, .card-form select, .card-form textarea { border-radius: 12px; }
        .card-form h4 { font-weight: 700; color: #1f2e35; margin-bottom: 25px; }
        .form-label { font-weight: 600; font-size: 0.9rem; }
        .btn-back { background: none; border: 2px solid #ddd; border-radius: 12px; padding: 7px 18px; font-size: 0.85rem; font-weight: 600; transition: all 0.3s; }
        .btn-back:hover { border-color: #2b7a8c; color: #2b7a8c; }
        .btn-submit { border-radius: 12px !important; padding: 12px !important; font-weight: 600; }
        .info-alert { background: #fff3cd; border-left: 4px solid #fd7e14; border-radius: 14px; padding: 15px 18px; margin-bottom: 25px; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 style="font-weight:700;color:#1f2e35;margin:0;"><i class="fas fa-plus-circle me-2" style="color:#2b7a8c;"></i>Usulkan Destinasi Baru</h4>
            <a href="{{ url('/') }}" class="btn-back"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
        </div>

        <div class="info-alert">
            <i class="fas fa-info-circle me-2" style="color:#fd7e14;"></i>
            Setelah dikirim, usulan destinasi Anda akan masuk ke status <strong>Menunggu Verifikasi</strong>.
            Admin akan memeriksa dan menyetujuinya sebelum tampil di website.
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card-form">
            <form action="{{ route('destinations.user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Destinasi <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" required placeholder="Cth: Pantai Kuta Mandalika" value="{{ old('title') }}">
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Ceritakan tentang destinasi ini...">{{ old('description') }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" required placeholder="Cth: Kuta, Lombok Tengah" value="{{ old('location') }}">
                        @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select name="category" class="form-control @error('category') is-invalid @enderror" required>
                            <option value="">Pilih Kategori</option>
                            <option value="pantai" {{ old('category', $category ?? '') == 'pantai' ? 'selected' : '' }}>Pantai & Laut</option>
                            <option value="bukit" {{ old('category', $category ?? '') == 'bukit' ? 'selected' : '' }}>Bukit & Sunset</option>
                            <option value="air terjun" {{ old('category', $category ?? '') == 'air terjun' ? 'selected' : '' }}>Air Terjun</option>
                            <option value="lainnya" {{ old('category', $category ?? '') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Destinasi <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <small class="text-muted">Format: jpeg, png, jpg, webp. Maks 2MB</small>
                </div>

                <button type="submit" class="btn btn-primary w-100 btn-submit"><i class="fas fa-paper-plane me-1"></i> Kirim Usulan</button>
            </form>
        </div>
    </div>
</body>
</html>
