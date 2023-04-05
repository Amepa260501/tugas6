<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    function readData()
    {
        $karyawan = DB::table('mkaryawan')->orderBy('id_karyawan')->paginate(5);
        return $karyawan;
    }

    function createData($request)
    {
        $karyawan = DB::table('mkaryawan')->insert([
            'id_karyawan' => $request->id_karyawan,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return $karyawan;
    }

    function editData($request)
    {
        $karyawan = DB::table('mkaryawan')->where('id_karyawan', $request->id_karyawan)->get();
        return $karyawan;
    }

    function updateData($request)
    {
        $karyawan = DB::table('mkaryawan')->where('id_karyawan', $request->id_karyawan)->update([
            'id_karyawan' => $request->id_karyawan,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return $karyawan;
    }

    function deleteData($request)
    {
        $karyawan = DB::table('mkaryawan')->where('id_karyawan', $request->id_karyawan)->delete();
        return $karyawan;
    }
}
