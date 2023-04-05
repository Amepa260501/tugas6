@extends('layouts.main')

@section('container')
    <div class="col-6 mx-auto">
        <h1 class="mb-3">Tambah Karyawan</h1>
        <form action="" method="post" class="mb-3">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="id_karyawan">ID Karyawan: </label>
                <input class="form-control" type="text" name="id_karyawan" id="id_karyawan" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="nama">Nama Karyawan: </label>
                <input class="form-control" type="text" name="nama" id="nama" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="alamat">Alamat: </label>
                <input class="form-control" type="text" name="alamat" id="alamat" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="telepon">Telepon: </label>
                <input class="form-control" type="text" name="telepon" id="telepon" required>
            </div>

            <label class="form-label">Jenis Kelamin: </label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="Laki">
                <label class="form-check-label" for="flexRadioDefault1">Laki-laki</label>
            </div>
            <div class="form-check mb-4">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="Perempuan">
                <label class="form-check-label" for="flexRadioDefault2">Perempuan</label>
            </div>

            <div class="mb-3">
                <label class="form-label" for="jabatan">Jabatan: </label>
                <input class="form-control" type="text" name="jabatan" id="jabatan" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">Email: </label>
                <input class="form-control" type="email" name="email" id="email" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">Password: </label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>

            <button type="submit" name="tambah" class="btn btn-success">+ Tambah Karyawan</button>
            <a href="{{ url('/karyawan') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
