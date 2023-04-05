@extends('layouts.main')

@section('container')
    <div class="col-6 mx-auto">
        <h1 class="mb-3">Tambah Produk</h1>
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="id_produk">Kode: </label>
                <input class="form-control" type="text" name="id_produk" id="id_produk" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="id_kategori">Nama Kategori: </label>
                <select name="id_kategori" id="kategori">
                    @foreach ( $kategori as $data)
                        <option value="{{ $data->id_kategori }}">{{ $data->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="nama_produk">Nama Produk: </label>
                <input class="form-control" type="text" name="nama_produk" id="nama_produk" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="harga">Harga: </label>
                <input class="form-control" type="number" name="harga" id="harga" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="descripsi">Descripsi: </label>
                <input class="form-control" type="number" name="descripsi" id="descripsi" required>
            </div>

            <button type="submit" name="tambah" class="btn btn-success">+ Tambah Produk</button>
            <a href="{{ url('/produk') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
