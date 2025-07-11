@extends('layouts.app')
@section('title','Add Publishers - Koleksi Aduy')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">New Publishers</div>
                    <div class="card-body">
                            @if (session('success'))
                                <div class="mb-3 w-50 p-3 bg-success text-white rounded">
                                    {{ session('success') }}
                                </div>
                            @endif
                        <form action="{{ route('store.penerbit') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="namaPenerbit" class="form-label">Nama Penerbit</label>
                                <input type="text" name="namaPenerbit" id="namaPenerbit" autofocus required class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="alamat" class="form-label">Alamat Penerbit</label>
                                <input type="text" name="alamat" id="alamat" required class="form-control">
                            </div>
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="{{ route('daftar.penerbit') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
