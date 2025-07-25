@extends('layouts.app')
@section('title','Add Collection - Koleksi Aduy')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header text-center">Masukkan buku baru</div>
                    <div class="card-Body">
                        <div class="mb-3">
                            @if (session('success'))
                                <div class="bg-success text-white w-25 rounded p-3 mb-3">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                        <form action="{{ route('store.buku') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 p-2">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" required>
                            </div>
                            <div class="mb-3 p-2">
                                <label for="author_id" class="form-label">Author</label>
                                <select name="author_id[]" id="author_id_select" class="form-control select2" multiple required>
                                    <option value="" disabled>-- Pilih Penulis --</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}"
                                            {{ in_array($author->id, old('author_id', [])) ? 'selected' : '' }}>
                                            {{ $author->namaPenulis }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Tekan Ctrl (Windows) atau Cmd (Mac) untuk memilih lebih dari
                                    satu.</small>
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
                            <div class="mb-3 p-2">
                                <label for="genre_id" class="form-label">Kategori Buku</label>
                                <select name="genre_id" id="genre_id" class="form-control" required>
                                    <option value="" disabled selected>Pilih Genre</option>
                                    @foreach ($gen as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->namaGenre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="gambar" class="form-label">Gambar Buku</label>
                                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mb-3">Tambah</button>
                                <button type="reset" class="btn btn-warning mb-3">Reset</button>
                                <a href="{{ route('daftar.buku') }}" class="btn btn-secondary mb-3">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#author_id_select').select2({
            placeholder: "Pilih Penulis",
            allowClear: true,
            width: '100%'
        });
    });
</script>
