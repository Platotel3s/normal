@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header text-center">Masukkan buku baru</div>
                    <div class="card-Body">
                        <form action="{{ route('store.buku') }}" method="POST">
                            @csrf
                            <div class="mb-3 p-2">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" required>
                            </div>
                            <div class="mb-3 p-2">
                                <label for="author_id" class="form-label">Author</label>
                                <select name="author_id" id="author_id" class="form-control" required>
                                    <option value="" disabled selected>Pilih Penulis</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->namaPenulis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 p-2">
                                <label for="penerbit_id" class="form-label">Penerbit</label>
                                <select name="penerbit_id" id="penerbit_id" class="form-control" required>
                                    <option value="" disabled selected>Pilih Penerbit</option>
                                    @foreach ($penerbits as $penerbit)
                                        <option value="{{ $penerbit->id }}">{{ $penerbit->namaPenerbit }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 p-2">
                                <label for="tahun_id" class="form-label">Tahun Penerbit</label>
                                <select name="tahun_id" id="tahun_id" class="form-control" required>
                                    <option value="" disabled selected>Pilih Tahun</option>
                                    @foreach ($tahuns as $tahun)
                                        <option value="{{ $tahun->id }}">{{ $tahun->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-primary mb-3">Tambah</button>
                                <button type="reset" class="btn btn-warning mb-3">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
