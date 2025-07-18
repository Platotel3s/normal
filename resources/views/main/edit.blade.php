@extends('layouts.app')
@section('title','Edit Collection - Koleksi Aduy')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Data Buku</div>
                    <div class="card-body">
                        <form action="{{ route('update.buku', $bukus->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-4">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" value="{{ $bukus->judul }}"
                                    class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="author_id" class="form-label">Author</label>
                                <select name="author_id[]" id="author_id" class="form-control" multiple>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}"
                                            {{ in_array($author->id, $bukus->authors->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $author->namaPenulis }}
                                        </option>
                                    @endforeach
                                </select>

                                <small class="text-muted">Tekan Ctrl (atau Cmd di Mac) untuk memilih lebih dari
                                    satu.</small>
                            </div>

                            <div class="mb-4">
                                <label for="penerbit_id" class="form-label">Penerbit</label>
                                <select name="penerbit_id" id="penerbit_id" class="form-control">
                                    <option value="" disabled selected>-- Pilih Penerbit --</option>
                                    @foreach ($penerbits as $penerbit)
                                        <option value="{{ $penerbit->id }}"
                                            {{ $penerbit->id == $bukus->penerbit_id ? 'selected' : '' }}>
                                            {{ $penerbit->namaPenerbit }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="tahun_id" class="form-label">Tahun Penerbit</label>
                                <select name="tahun_id" id="tahun_id" class="form-control">
                                    <option value="" disabled selected>-- Pilih Tahun Penerbit --</option>
                                    @foreach ($tahuns as $tahun)
                                        <option value="{{ $tahun->id }}"
                                            {{ $tahun->id == $bukus->tahun_id ? 'selected' : '' }}>{{ $tahun->tahun }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="genre_id" class="form-label">Genre Buku</label>
                                <select name="genre_id" id="genre_id" class="form-control">
                                    <option value="" disabled selected>-- Pilih Genre --</option>
                                    @foreach ($gen as $genre)
                                        <option value="{{ $genre->id }}"
                                            {{ $genre->id == $bukus->genre_id ? 'selected' : '' }}>{{ $genre->namaGenre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="gambar" class="form-label">Gambar Buku</label>
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
