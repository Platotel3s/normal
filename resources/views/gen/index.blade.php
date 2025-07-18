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
            </div>
    </div>
</div>
@endsection
