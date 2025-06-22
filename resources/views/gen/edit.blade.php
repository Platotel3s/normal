@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">Edit Data Genre !</div>
                    <div class="card-body">
                        <form action="{{ route('update.genre',$gen->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="namaGenre" class="form-label">Nama Genre</label>
                                <input type="text" name="namaGenre" id="namaGenre" class="form-control" value="{{ $gen->namaGenre }}" required>
                            </div>
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-success">Update Genre</button>
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
