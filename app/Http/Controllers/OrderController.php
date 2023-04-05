<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // Query Builder
        $select = DB::table('orders')->select('orders.*')->get();
        $where = DB::table('orders')->where('kode_order', 'OR003')->get();
        $orderby = DB::table('orders')->orderBy('kode_order', 'desc')->get();
        $order_main = DB::table('orders')
                    ->join('msupplier', 'orders.kode_supplier', '=', 'msupplier.id_supplier')
                    ->join('mkaryawan', 'orders.kode_karyawan', '=', 'mkaryawan.id_karyawan')
                    ->select('orders.kode_order', 'msupplier.kontak as nama supplier', 'mkaryawan.nama as nama karyawan', 'orders.tanggal', 'orders.keterangan', 'orders.grandtotal')
                    ->get();

        $order_detail = DB::table('orders')
                    ->join('order_item', 'orders.kode_order', '=', 'order_item.kode_order')
                    ->join('mbarang', 'order_item.kode_barang', '=', 'mbarang.kode')
                    ->select('orders.kode_order', 'orders.tanggal', 'mbarang.nama as nama barang', 'mbarang.hrg_beli', 'order_item.jumlah', 'order_item.total')
                    ->get();
        
        // $result = compact('select', 'where', 'orderby');
        $result = compact('order_main', 'order_detail');
        
        // Eloquent
        $orderModel = new Order();

        $order_elo = $orderModel->order_elo();
        $order_elo_detail = $orderModel->order_elo_detail();
        $order_elo_select = $orderModel->elo_select();
        $order_elo_where = $orderModel->elo_where();
        $order_elo_orderby = $orderModel->elo_orderby();
        
        $result = compact('order_elo', 'order_elo_detail');
        // $result = compact('order_elo_select', 'order_elo_where', 'order_elo_orderby');
        
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
