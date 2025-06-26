<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Koleksi Aduy')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/chart.js" as="script">
    @stack('styles')
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/lottie-web@5.12.0/build/player/lottie.min.js"></script>
    @stack('scripts')
</body>

</html>