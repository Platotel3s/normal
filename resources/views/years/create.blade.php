@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">New Release Years</div>
                    <div class="card-body">
                        <form action="{{ route('store.years') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="tahun" class="form-label">Tahun Rilis Baru</label>
                                <input type="number" name="tahun" id="tahun" required class="form-cnotrol">
                            </div>
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="{{ route('daftar.years') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
