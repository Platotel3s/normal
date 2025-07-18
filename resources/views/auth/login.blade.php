@extends('layouts.app')
@section('title','Login - Koleksi Aduy')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center g-4 flex-column flex-md-row">
        
        <div class="col-12 col-md-6 order-md-2 text-center">
            <div id="lottie-container" style="width: 100%; height: 300px;"></div>
        </div>

        <div class="col-12 col-md-6 order-md-1">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Login</div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <i class="fas fa-eye position-absolute" id="togglePassword" style="top: 38px; right: 15px; cursor: pointer;"></i>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href="{{ route('register.page') }}" class="btn btn-secondary">Register</a>
                            <a href="{{ route('welcome') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://unpkg.com/lottie-web@5.12.0/build/player/lottie.min.js"></script>
<script src="{{ asset('js/login-lottie.js') }}"></script>
@endsection
