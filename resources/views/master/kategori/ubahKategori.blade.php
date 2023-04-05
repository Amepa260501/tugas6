@extends('layouts.main')

@section('container')
    <div class="col-6 mx-auto">
        <h1 class="mb-3">Ubah Kategori</h1>
        @foreach ($kategori as $kar)
            <form action="" method="post" class="mb-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="id_kategori">ID Kategori: </label>
                    <input class="form-control" type="text" name="id_kategori" id="id_kategori" value="{{ $kar->id_kategori }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nama_kategori">Nama Kategori: </label>
                    <input class="form-control" type="text" name="nama_kategori" id="nama_kategori" value="{{ $kar->nama_kategori }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="descripsi">Descripsi: </label>
                    <input class="form-control" type="text" name="descripsi" id="descripsi" value="{{ $kar->descripsi }}">
                </div>

                <button type="submit" name="ubah" class="btn btn-warning"><i class="bi bi-pencil-square"></i>Ubah Kategori</button>
                <a href="{{ url('/kategori') }}" class="btn btn-secondary">Batal</a>
            </form>
        @endforeach
    </div>
@endsection
