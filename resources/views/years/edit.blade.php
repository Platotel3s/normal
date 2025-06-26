@extends('layouts.app')
@section('title','Edit New Year - Koleksi Aduy')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">Edit Tahun Rilis</div>
                    <div class="card-body">
                        <form action="{{ route('update.years',$years->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="tahun" class="form-label">Tahun Rilis</label>
                                <input type="number" name="tahun" id="tahun" value="{{ $years->tahun }}" required>
                            </div>
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-warning">Update</button>
                                <a href="{{ route('daftar.years') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
