@extends('layouts.main')

@section('container')
    <h1 class="mb-3">Master Kategori
        <a href="{{ url('/tambahKategori') }}" class="ms-2 fs-3"><i class="bi bi-plus-circle-fill"></i></a>
    </h1>
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table table-primary table-striped table-hover">
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Descripsi</th>
                <th>Aksi</th>
            </tr>

            @foreach ($kategori as $sup)
            <tr>
                <td>{{ $sup->id_kategori }}</td>
                <td>{{ $sup->nama_kategori }}</td>
                <td>{{ $sup->descripsi }}</td>
                <td>
                    <a href="{{ url("/ubahKategori/{$sup->id_kategori}") }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    <a href="{{ url("/hapusKategori/{$sup->id_kategori}") }}" class="btn btn-danger hapus" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        <div>
            {{ $kategori->links() }}
        </div>
    </div>
@endsection