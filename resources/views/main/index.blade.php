@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">List buku</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="bg-success text-white w-25 rounded p-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="mb-3 text-end">
                            <a href="{{ route('create.buku') }}" class="btn btn-success shadow">
                                <i class="fas fa-plus"></i> Tambah Buku
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover align-middle">
                                <thead class="table-dark">
                                    <th>Judul buku</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun terbit</th>
                                    <th>Genre</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($bukus as $buku)
                                        <tr>
                                            <td>{{ $buku->judul }}</td>
                                            {{-- <td>{{ $buku->author->namaPenulis ?? 'N/A' }}</td> --}}
                                            <td>@foreach ($buku->authors as $author)
                                                <span class="badge bg-info">
                                                    {{ $author->namaPenulis }}
                                                </span>
                                            @endforeach</td>
                                            <td>{{ $buku->penerbit->namaPenerbit ?? 'N/A' }}</td>
                                            <td>{{ $buku->tahun->tahun ?? 'N/A' }}</td>
                                            <td>{{ $buku->genre->namaGenre ?? 'N/A' }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('edit.buku',$buku->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('hapus.buku',$buku->id) }}" method="POST">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
