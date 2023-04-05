<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LoginController extends Controller
{
    public function index() {
        Auth::logout();
        return view('login.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request) {
        $admin = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'admin',
        ];

        $operator = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'operator',
        ];

        $gudang = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'gudang',
        ];

        // if (Auth::attempt($admin) || Auth::attempt($operator) || Auth::attempt($gudang)) {
        //     return redirect('profil');
        // }

        if (Auth::attempt($admin)) {
            return redirect('barang');
        }
        if (Auth::attempt($operator)) {
            return redirect('penjualan');
        }
        if (Auth::attempt($gudang)) {
            return redirect('gudang');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request) {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
