<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    function readData()
    {
        $kategori = DB::table('kategori')->orderBy('id_kategori')->paginate(5);
        return $kategori;
    }

    function createData($request)
    {
        $kategori = DB::table('kategori')->insert([
            'id_kategori' => $request->id_kategori,
            'nama_kategori' => $request->nama_kategori,
            'descripsi' => $request->descripsi
        ]);
        return $kategori;
    }

    function editData($request)
    {
        $kategori = DB::table('kategori')->where('id_kategori', $request->id_kategori)->get();
        return $kategori;
    }

    function updateData($request)
    {
        $kategori = DB::table('kategori')->where('id_kategori', $request->id_kategori)->update([
            'id_kategori' => $request->id_kategori,
            'nama_kategori' => $request->nama_kategori,
            'descripsi' => $request->descripsi
        ]);
        return $kategori;
    }

    function deleteData($request)
    {
        $kategori = DB::table('kategori')->where('id_kategori', $request->id_kategori)->delete();
        return $kategori;
    }
}
