<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Modelkaryawan = new Karyawan();
        $karyawan = $Modelkaryawan->readData();
        return view('master.karyawan.index', [
            'title' => 'Karyawan',
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.karyawan.tambahKaryawan', [
            'title' => 'Tambah Karyawan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKaryawanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Modelkaryawan = new Karyawan();
        $Modelkaryawan->createData($request);

        return redirect('/karyawan')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $karyawan)
    {
        $Modelkaryawan = new Karyawan();
        $show = $Modelkaryawan->editData($karyawan);
        return view('master.karyawan.ubahkaryawan', [
            "title" => "Ubah Karyawan",
            "karyawan" => $show
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKaryawanRequest  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $karyawan)
    {
        $Modelkaryawan = new Karyawan();
        $Modelkaryawan->updateData($karyawan);
        return redirect('/karyawan')->with('success', 'Barang berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $karyawan)
    {
        $Modelkaryawan = new Karyawan();
        $Modelkaryawan->deleteData($karyawan);
        return redirect('/karyawan')->with('success', 'Barang berhasil dihapus!');
    }
}
