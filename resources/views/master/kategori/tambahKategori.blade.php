@extends('layouts.main')

@section('container')
    <div class="col-6 mx-auto">
        <h1 class="mb-3">Tambah Kategori</h1>
        <form action="" method="post" class="mb-3">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="id_kategori">ID Kategori: </label>
                <input class="form-control" type="text" name="id_kategori" id="id_kategori" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="nama_kategori">Nama Kategori: </label>
                <input class="form-control" type="text" name="nama_kategori" id="kategori" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="descripsi">Descripsi: </label>
                <input class="form-control" type="text" name="descripsi" id="descripsi" required>
            </div>

            <button type="submit" name="tambah" class="btn btn-success">+ Tambah Kategori</button>
            <a href="{{ url('/kategori') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
