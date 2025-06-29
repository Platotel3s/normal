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

    <style>
        body {
            overflow-x: hidden;
        }

        @media (max-width: 768px) {
            nav.sidebar {
                position: fixed;
                z-index: 999;
                background-color: white;
                height: 100vh;
                width: 75%;
                left: -100%;
                top: 0;
                transition: left 0.3s ease;
                overflow-y: auto;
            }

            nav.sidebar.show {
                left: 0;
            }

            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                width: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 998;
            }

            .overlay.show {
                display: block;
            }
        }
    </style>
</head>

<body>
    @auth
        @if(Auth::check())
            <button class="btn btn-primary d-md-none m-2" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>

            <div class="overlay" onclick="toggleSidebar()" id="sidebarOverlay"></div>
            <nav class="sidebar d-md-block p-3" id="sidebarNav">
                @include('layouts.navigation')
            </nav>
        @endif
    @endauth

    <main class="container-fluid">
        <div class="row">
            <div class="col p-3">
                @yield('content')
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/lottie-web@5.12.0/build/player/lottie.min.js"></script>
    @stack('scripts')

    <script>
        function toggleSidebar() {
            document.getElementById('sidebarNav').classList.toggle('show');
            document.getElementById('sidebarOverlay').classList.toggle('show');
        }
    </script>
</body>

</html>
