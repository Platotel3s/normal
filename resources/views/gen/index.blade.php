@extends('layouts.app')
@section('title','Koleksi Genre - Koleksi Aduy')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">Daftar Genre Saat Ini</div>
                    <div class="card-body">
                        <div class="mb-3 text-end">
                            <a href="{{ route('create.genre') }}" class="btn btn-success">
                                <i class="fas fa-plus"></i> Buat Genre
                            </a>
                        </div>
                        <div class="table-fluid">
                            <table class="table table-hover table-striped align-middle table-bordered">
                                <thead class="table-dark">
                                    <th>Nama Genre</th>
                                    <th>Input Date</th>
                                    <th>Last Modified</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($gen as $genre)
                                        <tr>
                                            <td>{{ $genre->namaGenre }}</td>
                                            <td>{{ $genre->created_at }}</td>
                                            <td>{{ $genre->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('edit.genre', $genre->id) }}" class="btn  btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('hapus.genre', $genre->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $gen->links() }}
                        </div>
                    </div>
                </div>
            </div>@extends('layouts.app')
        @section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">Daftar Genre Saat Ini</div>
                            <div class="card-body">
                                <div class="d-flex flex-row justify-content-between">
                                    <div class="mb-3 text-end">
                                        <a href="{{ route('create.genre') }}" class="btn btn-success">
                                            <i class="fas fa-plus"></i> Buat Genre
                                        </a>
                                    </div>
                                    <form action="{{ route('daftar.genre') }}" method="GET" class="mb-3">
                                        <div class="input-group">
                                            <input type="text" name="search" id="search" placeholder="Cari Genre"
                                                value="{{ request('search') }}" class="form-control">
                                            <button type="submit" class="btn btn-outline-primary">Cari</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-fluid">
                                    <table class="table table-hover table-striped align-middle table-bordered">
                                        <thead class="table-dark">
                                            <th>Nama Genre</th>
                                            <th>Input Date</th>
                                            <th>Last Modified</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($gen as $genre)
                                                <tr>
                                                    <td>{{ $genre->namaGenre }}</td>
                                                    <td>{{ $genre->created_at }}</td>
                                                    <td>{{ $genre->updated_at }}</td>
                                                    <td class="d-flex gap-1">
                                                        <a href="{{ route('edit.genre', $genre->id) }}"
                                                            class="btn  btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('hapus.genre', $genre->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center">
                                    @for ($i = 1; $i <= $gen->lastPage(); $i++)
                                        <a href="{{ $gen->url($i) }}"
                                            class="btn btn-sm {{ $gen->currentPage() == $i ? 'btn-primary' : 'btn-outline-primary' }} mx-1">
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

    </div>
</div>
@endsection
