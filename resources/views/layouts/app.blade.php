<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Koleksi Aduy')</title>
    <link rel="stylesheet" href="{{ asset('boot/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            @auth
                @if (Auth::check())
                    <nav class="col-auto d-flex flex-column left d-left p-3">
                        @include('layouts.navigation')
                    </nav>
                @endif
            @endauth
            <main class="col right p-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://unpkg.com/lottie-web@5.12.0/build/player/lottie.min.js"></script>
    <link rel="stylesheet" href="{{ asset('boot/js/bootstrap.bundle.js') }}">
</body>

</html>
