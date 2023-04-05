@extends('layouts.main')

@section('container')
    <h1 class="mb-3">Master Produk
        <a href="{{ url('/tambahProduk') }}" class="ms-2 fs-3"><i class="bi bi-plus-circle-fill"></i></a>
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
                <th>Kode</th>
                <th>Nama Kategori</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Descripsi</th>
                <th>Aksi</th>
            </tr>

            @foreach ($produk as $bar)
            <tr>
                <td>{{ $bar->id_produk }}</td>
                <td>{{ $bar->id_kategori }}</td>
                <td>{{ $bar->nama_produk }}</td>
                <td>{{ $bar->harga }}</td>
                <td>{{ $bar->descripsi }}</td>
                <td>
                    <a href="{{ url("/ubahProduk/{$bar->id_produk}") }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    <a href="{{ url("/hapusProduk/{$bar->id_produk}") }}" class="btn btn-danger hapus" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        <div>
            {{ $produk->links() }}
        </div>
    </div>
@endsection