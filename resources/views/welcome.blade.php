<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome !</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <h1 class="display-5 mb-4">📚 Selamat Datang di Koleksi Buku Aduy </h1>
                        <p class="lead">Kelola data buku, penulis, penerbit, dan tahun terbit dengan mudah dan cepat.</p>
                        <hr class="my-4">
                        @auth
                        <a href="{{ route('daftar.buku') }}" class="btn btn-primary btn-lg">
                            Lihat Daftar Buku
                        </a>
                        @else
                        <a href="{{ route('login.page') }}" class="btn btn-outline-primary btn-lg me-2">
                            Masuk
                        </a>
                        <a href="{{ route('register.page') }}" class="btn btn-success btn-lg">
                            Daftar
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>
