@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Profil</div>
                <div class="card-body">
                    <form action="{{ route('update.profil') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="Ganti password (opsional)" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi password" class="form-control">
                            <small class="text-muted">Pastikan anda memasukkan konfirmasi password agar bisa update data</small>
                        </div>
                        <div class="mb-3">
                            <label for="fotoProfil" class="fotoProfil">Foto Profil</label>
                            <input type="file" name="fotoProfil" id="fotoProfil" class="form-control">
                        </div>
                        @if (Auth::user()->fotoProfil)
                        <div class="mb-3 text-center">
                            <img src="{{ asset('storage/' . Auth::user()->fotoProfil) }}" alt="Foto Profil" class="rounded-circle shadow" style="width: 150px;height:150px;">
                            <p class="text-muted">Foto profil saat ini</p>
                        </div>
                        @endif


                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        <button type="reset" class="btn btn-warning">Reset Perubahan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
