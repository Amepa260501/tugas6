<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreGudangRequest;
use App\Http\Requests\UpdateGudangRequest;
use App\Models\Barang;
use Symfony\Component\HttpFoundation\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('login.home', [
            'title' => 'Profil Gudang'
        ]);
    }
    public function tabel() {
        $Modelgudang = new Gudang();
        $gudang = $Modelgudang->readData();
        $total = $Modelgudang->totalTransaksi();

        return view('master.gudang.index', [
            'title' => 'Master Gudang',
            'gudang' => $gudang,
            "total" => $total,
        ]);
    }
    public function tabelFilter($tglAwal, $tglAkhir) {
        $Modelgudang = new Gudang();
        $gudang = $Modelgudang->readDataFilter($tglAwal, $tglAkhir);
        $totalFilter = $Modelgudang->totalTransaksiFilter($tglAwal, $tglAkhir);

        return view('master.gudang.index', [
            'title' => 'Master Gudang',
            'gudang' => $gudang,
            "total" => $totalFilter,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Modelbarang = new Barang();
        $barang = $Modelbarang->readData();
        return view('master.gudang.tambahGudang', [
            'title' => 'Tambah Gudang',
            'barang' => $barang,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGudangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($kodetr, $tanggal, $namasupplier, $telepon, $alamat, $keterangan, $grandtotal)
    {
        $Modelgudang = new Gudang();
        $Modelgudang->createData($kodetr, $tanggal, $namasupplier, $telepon, $alamat, $keterangan, $grandtotal);

        // return redirect('/gudang/tabel')->with('success', 'Data gudang berhasil ditambahkan!');
    }
    public function store_detail($kodetr, $kode, $harga, $jumlah)
    {
        $Modelgudang = new Gudang();
        $Modelgudang->createDataDetail($kodetr, $kode, $harga, $jumlah);

        // return redirect('/gudang/tabel')->with('success', 'Data detail gudang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function lihat($kodetr)
    {
        $Modelgudang = new Gudang();
        $gudang = $Modelgudang->lihatData($kodetr);
        $detail_gudang = $Modelgudang->lihatDataDetail($kodetr);

        return view('master.gudang.lihatGudang', [
            "title" => "Lihat Data Gudang",
            "gudang" => $gudang,
            "detail_gudang" => $detail_gudang,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $gudang)
    {
        $Modelgudang = new Gudang();
        $show = $Modelgudang->editData($gudang);
        return view('master.gudang.ubahGudang', [
            "title" => "Ubah Gudang",
            "gudang" => $show
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGudangRequest  $request
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $gudang)
    {
        $Modelgudang = new Gudang();
        $Modelgudang->updateData($gudang);
        return redirect('/gudang')->with('success', 'Data gudang berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $gudang)
    {
        $Modelgudang = new Gudang();
        $Modelgudang->deleteData($gudang);
        return redirect('/gudang')->with('success', 'Data gudang berhasil dihapus!');
    }
}

