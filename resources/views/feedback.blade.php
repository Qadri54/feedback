<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Feedback - Toko Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f4f9; }
        .feedback-card { border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15); transition: transform 0.3s; }
        .feedback-card:hover { transform: translateY(-5px); }
        .feedback-title { font-weight: bold; font-size: 1.1rem; }
        .feedback-rating { font-size: 1.2rem; color: #ffbb00; }
        .modal-header { background-color: #007bff; color: #fff; }
        .btn-custom { background-color: #007bff; color: #fff; }
    </style>
</head>
<body>

<div class="container mt-5">
    <h3 class="text-center mb-4">Berikan Masukan Anda</h3>

    <div class="text-end mb-3">
        <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#feedbackModal">Beri Masukan</button>
    </div>

    <div class="row g-4">
        @foreach ($feedbacks as $feedback)
        <div class="col-md-4">
            <div class="card feedback-card p-4 h-100">
                <h5 class="feedback-title">{{ $feedback->nama }}</h5>
                <p class="text-muted">{{ $feedback->email }}</p>
                <p>{{ $feedback->pesan }}</p>
                <div class="feedback-rating">{{ str_repeat('⭐', $feedback->rating) }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal Form Tambah Feedback -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Feedback Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('feedback.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Pesan</label>
                        <textarea name="pesan" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Rating</label>
                        <select name="rating" class="form-select" required>
                            <option value="5">⭐⭐⭐⭐⭐</option>
                            <option value="4">⭐⭐⭐⭐</option>
                            <option value="3">⭐⭐⭐</option>
                            <option value="2">⭐⭐</option>
                            <option value="1">⭐</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
