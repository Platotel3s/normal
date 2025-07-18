@extends('layouts.app')
@section('title','Edit Publishers - Koleksi Aduy')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">Edit Data Penerbit</div>
                    <div class="card-body">
                        <form action="{{ route('update.penerbit',$publishers->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-4">
                                <label for="namaPenerbit" class="form-label">Nama Penerbit</label>
                                <input type="text" class="form-control" name="namaPenerbit" id="namaPenerbit" value="{{ $publishers->namaPenerbit }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="alamat" class="form-label">Alamat Penerbit</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $publishers->alamat }}" required>
                            </div>
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-warning">Update</button>
                                <a href="{{ route('daftar.penerbit') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
