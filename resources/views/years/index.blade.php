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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table border align-middle">
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
                                                    <a href="{{ route('edit.years',$tahun->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('hapus.years',$tahun->id) }}" method="POST">
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
                        <a href="{{ route('create.years') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Tambah tahun rilis
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
