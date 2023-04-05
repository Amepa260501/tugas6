@extends('layouts.main')

@section('container')
    <h1 class="mb-3">Master Karyawan
        <a href="{{ url('/tambahKaryawan') }}" class="ms-2 fs-3"><i class="bi bi-plus-circle-fill"></i></a>
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
                <th>ID Karyawan</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>

            @foreach ($karyawan as $kar)
                <tr>
                    <td>{{ $kar->id_karyawan }}</td>
                    <td>{{ $kar->nama }}</td>
                    <td>{{ $kar->alamat }}</td>
                    <td>{{ $kar->telepon }}</td>
                    <td>{{ $kar->jenis_kelamin }}</td>
                    <td>{{ $kar->jabatan }}</td>
                    <td>{{ $kar->email }}</td>
                    <td>Rahasia</td>
                    <td>
                        <a href="{{ url("/ubahKaryawan/{$kar->id_karyawan}") }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ url("/hapusKaryawan/{$kar->id_karyawan}") }}" class="btn btn-danger hapus" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            {{ $karyawan->links() }}
        </div>
    </div>
@endsection
