@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">Masukkan Genre Terbaru !</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="bg-success w-50 p-3 mb-4 rounded text-white">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('store.genre') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="namaGenre" class="form-label">Nama Genre</label>
                                <input type="text" name="namaGenre" autofocus id="namaGenre" class="form-control" required>
                            </div>
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-success">Tambah Genre</button>
                                <button type="reset" class="btn btn-warning">Batal</button>
                                <a href="{{ route('daftar.genre') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
