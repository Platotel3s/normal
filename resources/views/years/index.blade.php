@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        Daftar Tahun Rilis Yang Dikeluarkan Penerbit
                    </div>
                    <div class="card-body">
                        <div class="mb-3 text-end">
                            <a href="{{ route('create.years') }}" class="btn btn-success">
                                <i class="fas fa-plus"></i> Tambah tahun rilis
                            </a>
                        </div>
                        <form action="{{ route('daftar.years') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="number" name="search" id="search" class="form-control" placeholder="Cari tahun rilis" value="{{ request('search') }}">
                                <button type="submit" class="btn btn-outline-primary">Cari</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered align-middle">
                                <thead class="table-dark">
                                    <th>Tahun Rilis</th>
                                    <th>Input Date</th>
                                    <th>Last Modified</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($years as $tahun)
                                        <tr>
                                            <td>{{ $tahun->tahun }}</td>
                                            <td>{{ $tahun->created_at }}</td>
                                            <td>{{ $tahun->updated_at }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('edit.years', $tahun->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('hapus.years', $tahun->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            @for ($i = 1; $i <= $years->lastPage(); $i++)
                                <a href="{{ $years->url($i) }}"
                                    class="btn btn-sm {{ $years->currentPage() == $i ? 'btn-primary' : 'btn-outline-primary' }} mx-1">
                                    {{ $i }}
                                </a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
