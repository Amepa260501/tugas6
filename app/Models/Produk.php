<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    function readData()
    {
        $produk=DB::table('produk')
        ->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
        ->select('produk.*', 'kategori.nama_kategori')
        ->get();
        return $produk;
    }

    function createData($request)
    {
        $produk = DB::table('produk')->insert([
            'id_produk' => $request->id_produk,
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'descripsi' => $request->descripsi,
        ]);
        return $produk;
    }

    function editData($request)
    {
        $produk = DB::table('produk')->where('id_produk', $request->id_produk)->get();
        return $produk;
    }

    function updateData($request)
    {
        $produk = DB::table('produk')->where('id_produk', $request->id_produk)->update([
            'id_produk' => $request->id_produk,
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'descripsi' => $request->descripsi,
        ]);
        return $produk;
    }

    function deleteData($request)
    {
        $produk = DB::table('produk')->where('id_produk', $request->id_produk)->delete();
        return $produk;
    }
}
