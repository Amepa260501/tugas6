<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        return view('login.home', [
            'title' => 'Profil Penjualan'
        ]);
    }
}
