@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        Daftar Penulis
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover align-middle">
                                <thead class="table-dark">
                                    <th>Nama penulis</th>
                                    <th>Input Date</th>
                                    <th>Last Modified</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($authors as $author)
                                        <tr>
                                            <td>{{ $author->namaPenulis }}</td>
                                            <td>{{ $author->created_at }}</td>
                                            <td>{{ $author->updated_at }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('edit.author',$author->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('hapus.author',$author->id) }}" method="POST">
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
                        <a href="{{ route('create.author') }}" class="btn btn-success shadow">
                            <i class="fas fa-plus"></i> Tambah penulis
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
