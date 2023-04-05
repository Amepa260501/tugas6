<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    // Eloquent
    function order_elo()
    {
        $order = Order::
                join('msupplier', 'orders.kode_supplier', '=', 'msupplier.id_supplier')
                ->join('mkaryawan', 'orders.kode_karyawan', '=', 'mkaryawan.id_karyawan')
                ->select('orders.kode_order', 'msupplier.kontak as nama supplier', 'mkaryawan.nama as nama karyawan', 'orders.tanggal', 'orders.keterangan', 'orders.grandtotal')
                ->get();

        return $order;
    }

    function order_elo_detail()
    {
        $order = Order::
                join('order_item', 'orders.kode_order', '=', 'order_item.kode_order')
                ->join('mbarang', 'order_item.kode_barang', '=', 'mbarang.kode')
                ->select('orders.kode_order', 'orders.tanggal', 'mbarang.nama as nama barang', 'mbarang.hrg_beli', 'order_item.jumlah', 'order_item.total')
                ->get();

        return $order;
    }

    function elo_where() {
        $order = Order::where('kode_order', 'OR003')->get();
        return $order;
    }

    function elo_select() {
        $order = Order::select('orders.*')->get();
        return $order;
    }

    function elo_orderby() {
        $order = Order::orderBy('kode_order', 'desc')->get();
        return $order;
    }

    function tambah($request)
    {
        $order = Order::insert([
            'kode_order' => $request->kode_order,
            'kode_supplier' => $request->kode_supplier,
            'kode_karyawan' => $request->kode_karyawan,
            'tanggal' => $request->tanggal,
            'do' => $request->do,
            'keterangan' => $request->keterangan,
            'grandtotal' => $request->grandtotal,
        ]);
        return $order;
    }

    function ubah($request)
    {
        $order = Order::where('kode_order', $request->kode_order)->update([
            'kode_supplier' => $request->kode_supplier,
            'kode_karyawan' => $request->kode_karyawan,
            'tanggal' => $request->tanggal,
            'do' => $request->do,
            'keterangan' => $request->keterangan,
            'grandtotal' => $request->grandtotal,
        ]);
        return $order;
    }

    function hapus($request)
    {
        $order = Order::where('kode_order', $request->kode_order) ->delete();
        return $order;
    }
}
