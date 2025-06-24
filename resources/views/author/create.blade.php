@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        New Author
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="bg-success w-50 p-3 mb-4 rounded text-white">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('store.author') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="namaPenulis" class="form-label">Nama Author</label>
                                <input type="text" name="namaPenulis" id="namaPenulis" class="form-control" autofocus required>
                            </div>
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="{{ route('daftar.author') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
