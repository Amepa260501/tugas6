<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Modelkategori = new Kategori();
        $kategori = $Modelkategori->readData();
        return view('master.kategori.index', [
            'title' => 'Kategori',
            'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.kategori.tambahKategori', [
            'title' => 'Tambah kategori',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Modelkategori = new Kategori();
        $Modelkategori->createData($request);

        return redirect('/kategori')->with('success', 'kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $kategori)
    {
        $Modelkategori = new Kategori();
        $show = $Modelkategori->editData($kategori);
        return view('master.kategori.ubahkategori', [
            "title" => "Ubah kategori",
            "kategori" => $show
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriRequest  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $kategori)
    {
        $Modelkategori = new Kategori();
        $Modelkategori->updateData($kategori);
        return redirect('/kategori')->with('success', 'kategori berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $kategori)
    {
        $Modelkategori = new Kategori();
        $Modelkategori->deleteData($kategori);
        return redirect('/kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}
