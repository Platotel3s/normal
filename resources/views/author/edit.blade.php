@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        Edit Penulis
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.author',$authors->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="namaPenulis" class="form-label">Nama Penulis</label>
                                <input type="text" name="namaPenulis" id="namaPenulis" class="form-control" required value="{{ $authors->namaPenulis }}">
                            </div>
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-primary">Update</button>
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
