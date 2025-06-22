@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        Daftar Penerbit
                    </div>
                    <div class="card-body">
                        <div class="mb-3 text-end">
                            <a href="{{ route('create.penerbit') }}" class="btn btn-success">
                                <i class="fas fa-plus"></i> Tambah Penerbit
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered align-middle">
                                <thead class="table-dark">
                                    <th>Tahun Rilis</th>
                                    <th>Alamat</th>
                                    <th>Input Date</th>
                                    <th>Last Modified</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($publishers as $penerbit)
                                        <tr>
                                            <td>{{ $penerbit->namaPenerbit }}</td>
                                            <td>{{ $penerbit->alamat }}</td>
                                            <td>{{ $penerbit->created_at }}</td>
                                            <td>{{ $penerbit->updated_at }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('edit.penerbit', $penerbit->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('hapus.penerbit', $penerbit->id) }}"
                                                        method="POST">
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
                            @for ($i = 1; $i <= $publishers->lastPage(); $i++)
                                <a href="{{ $publishers->url($i) }}"
                                    class="btn btn-sm {{ $publishers->currentPage() == $i ? 'btn-primary' : 'btn-outline-primary' }} mx-1">
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
