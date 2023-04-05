<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use Symfony\Component\HttpFoundation\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Modelproduk = new Produk();
        $produk = $Modelproduk->readData();
        return view('master.produk.index', [
            'title' => 'Produk',
            'produk' => $produk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kategori'] = DB::table('kategori')->get();

        return view('master.produk.tambahProduk', [
            'title' => 'Tambah Produk',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Modelproduk = new Produk();
        // $validasi = $request->validate([
        //     'id_produk' => 'required|min:5',
        //     'id_kategori' => 'required|min:3|max:256',
        //     'nama_produk' => 'required|min:3|max:20',
        //     'harga' => 'required|numeric',
        //     'descripsi' => 'required|min:3|max:256',
        // ]);
        $Modelproduk->createData($request);
        // $Modelproduk->createData($validasi);

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $produk)
    {
        $Modelproduk = new Produk();
        $show = $Modelproduk->editData($produk);
        return view('master.produk.ubahProduk', [
            "title" => "Ubah Produk",
            "Produk" => $show
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $produk)
    {
        $Modelproduk = new Produk();
        $Modelproduk->updateData($produk);
        return redirect('/produk')->with('success', 'Produk berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $produk)
    {
        $Modelproduk = new Produk();
        $Modelproduk->deleteData($produk);
        return redirect('/produk')->with('success', 'produk berhasil dihapus!');
    }
}
