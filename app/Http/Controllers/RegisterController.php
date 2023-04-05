<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RegisterController extends Controller
{
    public function index() {
        return view('register.register', [
            'title' => 'Register'
        ]);
    }

    public function register(Request $request) {
        User::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'role' => 'operator',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/')->with('success', 'Registration successfull! Please login');
    }
}
