<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>404 - Halaman Tidak Ditemukan</title>
    <style>
        body{ 
            font-family: sans-serif;
            text-align: center;
            margin-top: 100px; 
        }
    </style>
</head>
<body>
    <h1>Oops! Halaman tidak ditemukan.</h1>
    <p>Sepertinya kamu nyasar... 😅</p>
    <a href="{{ route('daftar.buku') }}">Kembali ke Beranda</a>
        <lottie-player
    src="{{ asset('assets/404.json') }}"
    background="transparent"
    speed="1"
    style="width: 400px; height: 400px; margin: auto;"
    loop
    autoplay
></lottie-player>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>
