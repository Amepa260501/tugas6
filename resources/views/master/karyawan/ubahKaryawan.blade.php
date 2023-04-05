@extends('layouts.main')

@section('container')
    <div class="col-6 mx-auto">
        <h1 class="mb-3">Ubah Karyawan</h1>
        @foreach ($karyawan as $kar)
            <form action="" method="post" class="mb-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="id_karyawan">ID Karyawan: </label>
                    <input class="form-control" type="text" name="id_karyawan" id="id_karyawan" value="{{ $kar->id_karyawan }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nama">Nama Karyawan: </label>
                    <input class="form-control" type="text" name="nama" id="nama" value="{{ $kar->nama }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat: </label>
                    <input class="form-control" type="text" name="alamat" id="alamat" value="{{ $kar->alamat }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="telepon">Telepon: </label>
                    <input class="form-control" type="text" name="telepon" id="telepon" value="{{ $kar->telepon }}">
                </div>

                <label class="form-label">Jenis Kelamin: </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1"
                        value="Laki" @if ($kar->jenis_kelamin == 'Laki') @checked(true) @endif>
                    <label class="form-check-label" for="flexRadioDefault1">Laki-laki</label>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2"
                        value="Perempuan" @if ($kar->jenis_kelamin == 'Perempuan') @checked(true) @endif>
                    <label class="form-check-label" for="flexRadioDefault2">Perempuan</label>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="jabatan">Jabatan: </label>
                    <input class="form-control" type="text" name="jabatan" id="jabatan" value="{{ $kar->jabatan }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">Email: </label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ $kar->email }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Password: </label>
                    <input class="form-control" type="password" name="password" id="password" value="{{ $kar->password }}">
                </div>

                <button type="submit" name="ubah" class="btn btn-warning"><i class="bi bi-pencil-square"></i>Ubah Karyawan</button>
                <a href="{{ url('/karyawan') }}" class="btn btn-secondary">Batal</a>
            </form>
        @endforeach
    </div>
@endsection
