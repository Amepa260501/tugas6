@extends('layouts.main')

@section('container')
    <div class="col-6 mx-auto">
        <h1 class="mb-3">Ubah Produk</h1>
        @foreach ($produk as $bar)
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="id_produk">Kode: </label>
                    <input class="form-control" type="text" name="id_produk" id="id_produk" value="{{ $bar->id_produk }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="id_kategori">Nama Kategori: </label>
                    <input class="form-control" type="text" name="id_kategori" id="id_kategori" value="{{ $bar->id_kategori }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nama_produk">Nama Produk: </label>
                    <input class="form-control" type="text" name="nama_produk" id="nama_produk" value="{{ $bar->nama_produk }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="harga">Harga: </label>
                    <input class="form-control" type="number" name="harga" id="harga" value="{{ $bar->harga }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="descripsi">Descripsi: </label>
                    <input class="form-control" type="number" name="descripsi" id="descripsi" value="{{ $bar->descripsi }}">
                </div>

                <button type="submit" name="ubah" class="btn btn-warning"><i class="bi bi-pencil-square"></i>Ubah Produk</button>
                <a href="{{ url('/produk') }}" class="btn btn-secondary">Batal</a>
            </form>
        @endforeach
    </div>
@endsection
