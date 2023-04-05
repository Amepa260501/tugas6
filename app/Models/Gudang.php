<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gudang extends Model
{
    use HasFactory;

    function readData()
    {
        $gudang = DB::table('gudang')->orderBy('tanggal', 'asc')->paginate(5);
        return $gudang;
    }

    function createData($kodetr, $tanggal, $namasupplier, $telepon, $alamat, $keterangan, $grandtotal)
    {
        $gudang = DB::table('gudang')->insert([
            'kode_transaksi' => $kodetr,
            'tanggal' => $tanggal,
            'nama_supplier' => $namasupplier,
            'telepon' => $telepon,
            'alamat' => $alamat,
            'keterangan' => $keterangan,
            'grandtotal' => $grandtotal,
        ]);
        return $gudang;
    }
    function createDataDetail($kodetr, $kode, $harga, $jumlah)
    {
        $gudang = DB::table('detail_gudang')->insert([
            'kode_transaksi' => $kodetr,
            'kode_barang' => $kode,
            'harga' => $harga,
            'jumlah' => $jumlah,
        ]);
        return $gudang;
    }

    function lihatData($kodetr)
    {
        $gudang = DB::table('gudang')
        ->where('gudang.kode_transaksi', $kodetr)
        ->get();

        return $gudang;
    }
    function lihatDataDetail($kodetr)
    {
        $gudang = DB::table('gudang')
        ->join('detail_gudang', 'gudang.kode_transaksi', '=', 'detail_gudang.kode_transaksi')
        ->join('mbarang', 'detail_gudang.kode_barang', '=', 'mbarang.kode')
        ->select('gudang.kode_transaksi', 'gudang.tanggal', 'gudang.nama_supplier', 'gudang.grandtotal', 'detail_gudang.kode_barang', 'detail_gudang.harga', 'detail_gudang.jumlah', 'mbarang.nama', 'mbarang.satuan')
        ->where('gudang.kode_transaksi', $kodetr)
        ->get();

        return $gudang;
    }
    function totalTransaksi()
    {
        $gudang = DB::table('gudang')->select('grandtotal')->get();

        $total = 0;
        foreach($gudang as $gud) {
            $total += $gud->grandtotal;
        }
        
        return $total;
    }

    function readDataFilter($tglAwal, $tglAkhir)
    {
        $gudang = DB::table('gudang')->orderBy('tanggal', 'asc')
        ->where('tanggal', '>=', $tglAwal)
        ->where('tanggal', '<=', $tglAkhir)
        ->paginate(5);
        
        return $gudang;
    }
    function totalTransaksiFilter($tglAwal, $tglAkhir)
    {
        $gudang = DB::table('gudang')->select('grandtotal')
        ->where('tanggal', '>=', $tglAwal)
        ->where('tanggal', '<=', $tglAkhir)
        ->get();

        $total = 0;
        foreach($gudang as $gud) {
            $total += $gud->grandtotal;
        }
        
        return $total;
    }
}
