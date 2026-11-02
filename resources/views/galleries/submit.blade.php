<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usulkan Galeri - SenjaLoka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f4f6f9; }
        .main-content { max-width: 600px; margin: 40px auto; padding: 0 20px; }
        .card-form { background: #fff; border-radius: 14px; border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 30px; }
        .card-form h4 { font-weight: 700; color: #1f2e35; margin-bottom: 25px; }
        .form-label { font-weight: 600; font-size: 0.9rem; }
        .btn-back { background: none; border: 2px solid #ddd; border-radius: 8px; padding: 7px 18px; font-size: 0.85rem; font-weight: 600; transition: all 0.3s; }
        .btn-back:hover { border-color: #2b7a8c; color: #2b7a8c; }
        .info-alert { background: #fff3cd; border-left: 4px solid #fd7e14; border-radius: 8px; padding: 15px 18px; margin-bottom: 25px; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 style="font-weight:700;color:#1f2e35;margin:0;"><i class="fas fa-images me-2" style="color:#2b7a8c;"></i>Usulkan Galeri Foto</h4>
            <a href="{{ url('/') }}" class="btn-back"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
        </div>

        <div class="info-alert">
            <i class="fas fa-info-circle me-2" style="color:#fd7e14;"></i>
            Setelah dikirim, foto Anda akan masuk ke status <strong>Menunggu Verifikasi</strong>.
            Admin akan memeriksanya sebelum tampil di galeri website.
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card-form">
            <form action="{{ route('galleries.user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul Foto</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Cth: Sunset di Bukit Merese" value="{{ old('title') }}">
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="caption" class="form-control @error('caption') is-invalid @enderror" rows="2" placeholder="Cerita singkat tentang foto ini...">{{ old('caption') }}</textarea>
                    @error('caption') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <small class="text-muted">Format: jpeg, png, jpg, webp. Maks 2MB</small>
                </div>

                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-paper-plane me-1"></i> Kirim Foto</button>
            </form>
        </div>
    </div>
</body>
</html>
