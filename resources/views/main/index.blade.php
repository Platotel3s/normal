@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">List buku</div>
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="mb-3 text-end">
                            <a href="{{ route('create.buku') }}" class="btn btn-success shadow">
                                <i class="fas fa-plus"></i> Tambah Buku
                            </a>
                        </div>
                        <form action="{{ route('daftar.buku') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Cari buku" value="{{ request('search') }}">
                                <button type="submit" class="btn btn-outline-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover align-middle">
                            <thead class="table-dark">
                                <th>Judul buku</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun terbit</th>
                                <th>Genre</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($bukus as $buku)
                                <tr>
                                    <td>{{ $buku->judul }}</td>
                                    <td>
                                            @foreach ($buku->authors as $author)
                                        <span class="badge bg-info">
                                            {{ $author->namaPenulis }}
                                        </span>
                                        @endforeach
                                    </td>
                                    <td>{{ $buku->penerbit->namaPenerbit ?? 'N/A' }}</td>
                                    <td>{{ $buku->tahun->tahun ?? 'N/A' }}</td>
                                    <td>{{ $buku->genre->namaGenre ?? 'N/A' }}</td>
                                    <td>
                                        @if($buku->gambar)
                                        <img src="{{ asset('storage/'.$buku->gambar) }}" alt="Gambar Buku" width="80">
                                        @else
                                        <span class="text-muted">Belum ada</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('edit.buku', $buku->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('hapus.buku', $buku->id) }}" method="POST">
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
                        @for ($i = 1; $i <= $bukus->lastPage(); $i++)
                            <a href="{{ $bukus->url($i) }}" class="btn btn-sm {{ $bukus->currentPage() == $i ? 'btn-primary' : 'btn-outline-primary' }} mx-1">
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
