@extends('layouts.app')
@section('title','Register - Koleksi Aduy')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4">
                    <div class="card shadow w-100">
                        <div class="card-header bg-primary text-white">Register</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" autofocus required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <i class="fas fa-eye position-absolute" id="togglePassword" style="top: 38px; right: 15px; cursor: pointer;"></i>
                                </div>
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    <i class="fas fa-eye position-absolute" id="togglePassword" style="top: 38px; right: 15px; cursor: pointer;"></i>
                                </div>
                                <div class="mb-3">
                                    <label for="fotoProfil" class="form-label">Foto Profil</label>
                                    <input type="file" name="fotoProfil" id="fotoProfil" class="form-control" required>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                    <a href="{{ route('login.page') }}" class="btn btn-secondary">Login</a>
                                    <a href="{{ route('welcome') }}" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 text-center">
                    <div id="lottie-container" style="max-width: 100%; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/lottie-web@5.12.0/build/player/lottie.min.js"></script>
<script>
    lottie.loadAnimation({
        container: document.getElementById('lottie-container')
        , renderer: 'svg'
        , loop: true
        , autoplay: true
        , path: '{{ asset('assets/register.json') }}'
    , });

    const passwordInput = document.getElementById('password');
    const passwordToggle = document.getElementById('togglePassword');

    passwordToggle.addEventListener('click', function() {
       const type=passwordInput.type==='password'?'text':'password';
       passwordInput.type=type;
       this.classList.toggle('fa-eye');
       this.classList.toggle('fa-eye-slash');
    });

</script>
@endsection
