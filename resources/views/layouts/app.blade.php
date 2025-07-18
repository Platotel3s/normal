<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Koleksi Aduy')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/chart.js" as="script">
</head>
<style>
    body {
    overflow-x: hidden;
    padding-left: 250px;
}        
nav.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    width: 250px;
    z-index: 1000;
    background-color: #676767;
    box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    overflow-y: auto;
    transition: transform 0.3s ease;
}        
.main-content {
    transition: margin-left 0.3s ease;
}        
.sidebar-header {
    padding: 20px;
    background-color: #e9ecef;
    border-bottom: 1px solid #dee2e6;
}        
.sidebar-menu {
    padding: 0;
    list-style: none;
}        
.sidebar-menu li {
    width: 100%;
}        
.sidebar-menu a {
    display: block;
    padding: 12px 20px;
    color: #333;
    text-decoration: none;
    transition: background-color 0.3s;
}        
.sidebar-menu a:hover {
    background-color: #e9ecef;
}        
.sidebar-menu .active {
    background-color: #0d6efd;
    color: white;
}        
.sidebar-toggle {
    display: none;
    position: fixed;
    top: 10px;
    left: 10px;
    z-index: 1100;
}       
.overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.5);
    z-index: 999;
}
@media (max-width: 768px) {
    body {
        padding-left: 0;
    }
    nav.sidebar {
        transform: translateX(-100%);
    }
    nav.sidebar.show {
        transform: translateX(0);
    }
    .sidebar-toggle {
        display: block;
    }
    .main-content {
        margin-left: 0 !important;
    }
}
</style>
<body>
    @auth
        @if(Auth::check())
            <button class="sidebar-toggle btn btn-primary" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>

            <div class="overlay" onclick="toggleSidebar()" id="sidebarOverlay"></div>
            
            <nav class="sidebar" id="sidebarNav">
                @include('layouts.navigation')
            </nav>
        @endif
    @endauth

    <main class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col p-3">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/lottie-web@5.12.0/build/player/lottie.min.js"></script>
    @stack('scripts')
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebarNav');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
            
            if (sidebar.classList.contains('show')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }
        
        document.querySelectorAll('#sidebarNav a').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    toggleSidebar();
                }
            });
        });
        
        // Auto-close sidebar when window is resized to desktop view
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                document.getElementById('sidebarNav').classList.remove('show');
                document.getElementById('sidebarOverlay').classList.remove('show');
                document.body.style.overflow = '';
            }
        });
    </script>
</body>
</html>