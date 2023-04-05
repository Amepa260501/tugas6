@extends('layouts.main')

@section('container')
    <h1 class="mb-3">Master Gudang</h1>
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- Awal Filter --}}
        <div class="row mb-3">
            <a href="{{ url('/tambahGudang') }}" class="btn btn-primary fs-4 my-3 col-1"><i class="bi bi-plus-square-fill"></i></a>
            <div class="col-3 d-inline-block">
                <label for="tglAwal" class="form-label">Tanggal Awal</label>
                <input type="date" class="form-control" id="tglAwal" name="tglAwal" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-3 d-inline-block">
                <label for="tglAkhir" class="form-label">Tanggal Akhir</label>
                <input type="date" class="form-control" id="tglAkhir" name="tglAkhir" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-3 d-inline-block mt-4">
                <button type="submit" name="filter" id="filter" class="btn btn-secondary px-4 py-2">Filter</button>
            </div>
        </div>
        {{-- Akhir Filter --}}
    </div>
    <table class="table table-primary table-striped table-hover">
        <tr>
            <th>Kode Transaksi</th>
            <th>Tanggal</th>
            <th>Nama Supplier</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Keterangan</th>
            <th>Grand Total</th>
            <th>Aksi</th>
        </tr>

        @foreach ($gudang as $gud)
            <tr>
                <td>{{ $gud->kode_transaksi }}</td>
                <td>{{ $gud->tanggal }}</td>
                <td>{{ $gud->nama_supplier }}</td>
                <td>{{ $gud->telepon }}</td>
                <td>{{ $gud->alamat }}</td>
                <td>{{ $gud->keterangan }}</td>
                <td>{{ $gud->grandtotal }}</td>
                <td>
                    <a href="{{ url("/gudang/tabel/{$gud->kode_transaksi}") }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="container row">
        <div class="col-8"></div>
        <div class="col-4">
            <label class="fw-bold">Grand Total:</label>
            <input class="col-5 bg-warning fw-bold border-0 rounded ps-2 py-2" type="text" value="Rp{{ $total }}" readonly>
        </div>
    </div>
    <div>
        {{ $gudang->links() }}
    </div>
    </div>

    <script>
        function filter() {
            let tglAwal = $("#tglAwal").val();
            let tglAkhir = $("#tglAkhir").val();

            // console.log(tglAwal);
            // console.log(tglAkhir);

            // $.get('http://localhost:8080/kuliah/PWL/pertemuan/gudang/tabel/' + tglAwal + '/' + tglAkhir, function() {});

            console.log('http://localhost:8080/kuliah/PWL/pertemuan/gudang/tabel/' + tglAwal + '/' + tglAkhir);

            window.location.href='http://localhost:8080/kuliah/PWL/pertemuan/gudang/tabel/' + tglAwal + '/' + tglAkhir;
        }

        $("#filter").on("click", function() {
            filter();
        });
    </script>
@endsection
