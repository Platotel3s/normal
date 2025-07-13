<div class="d-flex flex-column align-items-center justify-content-between h-100 py-4">
    @if (Auth::user()->fotoProfil)
        <img src="{{ asset('storage/'.Auth::user()->fotoProfil) }}" alt="User Image" class="rounded-circle shadow" style="width: 100px; height: auto;">
    @endif
    <div class="card shadow p-2">
        {{ Auth::user()->name }}
    </div>
    <div class="d-flex flex-column w-100 px-3 gap-3 mt-4">
      <a href="{{ route('statistik.dashboard') }}" class="btn btn-info text-white text-start shadow-sm">
            <i class="fas fa-dashboard me-2"></i> Dashboard
        </a>
        <a href="{{ route('daftar.buku') }}" class="btn btn-info text-white text-start shadow-sm">
            <i class="fas fa-book me-2"></i> Koleksi Buku
        </a>
        <a href="{{ route('daftar.author') }}" class="btn btn-info text-white text-start shadow-sm">
            <i class="fas fa-user me-2"></i> Penulis
        </a>
        <a href="{{ route('daftar.years') }}" class="btn btn-info text-white text-start shadow-sm">
            <i class="fas fa-calendar-alt me-2"></i> Tahun Rilis
        </a>
        <a href="{{ route('daftar.penerbit') }}" class="btn btn-info text-white text-start shadow-sm">
            <i class="fas fa-building me-2"></i> Penerbit
        </a>
        <a href="{{ route('daftar.genre') }}" class="btn btn-info text-white text-start shadow-sm">
            <i class="fas fa-book me-2"></i> Genre
        </a>
        <a href="{{ route('halUpdate.profil') }}" class="btn btn-info text-white text-start shadow-sm">
            <i class="fas fa-book me-2"></i> Update Profil
        </a>
    </div>
    <form action="{{ route('logout') }}" method="POST" class="w-100 px-3 mt-4">
        @csrf
        <button type="submit" class="btn btn-danger w-100 py-2 shadow-sm">
            <i class="fas fa-sign-out-alt me-2"></i> Keluar
        </button>
    </form>
</div>
