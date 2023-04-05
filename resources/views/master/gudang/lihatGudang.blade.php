@extends('layouts.main')

@section('container')
    <a href="{{ url()->previous() }}">Kembali</a>
    <h1 class="mb-3">Lihat Gudang</h1>
    @foreach ($gudang as $gud)
        <div class="container">
            <p>Kode Transaksi: {{ $gud->kode_transaksi }}</p>
            <p>Tanggal: {{ $gud->tanggal }}</p>
            <p>Supplier: {{ $gud->nama_supplier }}</p>
        </div>
    @endforeach
    <div class="container">
        <table class="table table-primary table-striped table-hover">
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>

            @foreach ($detail_gudang as $gud)
                <tr>
                    <td>{{ $gud->kode_barang }}</td>
                    <td>{{ $gud->nama }}</td>
                    <td>{{ $gud->satuan }}</td>
                    <td>{{ $gud->harga }}</td>
                    <td>{{ $gud->jumlah }}</td>
                    <td>{{ $gud->harga * $gud->jumlah }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container row">
        <div class="col-8"></div>
        <div class="col-4">
            @foreach ($gudang as $gud)
            <label class="fw-bold">Grand Total:</label>
            <input class="bg-warning fw-bold border-0 rounded ps-3 py-2" type="text" value="Rp{{ $gud->grandtotal }}" readonly>
            @endforeach
        </div>
    </div>
@endsection
