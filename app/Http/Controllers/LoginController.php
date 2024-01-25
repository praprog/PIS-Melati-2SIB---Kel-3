<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('siswa.index');
        } else {
            return view('login');
        }
    }

    public function loginaksi(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect()->route('dashboard')->with(['success' => 'Login berhasil!']);
        } else {
            // Session::flash('error', 'Email atau Password Salah');
            return redirect()->route('login')->with(['error' => 'Username atau Password Salah!']);
        }
    }
    public function dashboard()
    {
        $totalsiswa = DB::table('siswa')->count();
        $totalkebutuhan = DB::table('kebutuhan')->count();
        return view('dashboard')->with(array('totalsiswa' => $totalsiswa, 'totalkebutuhan' => $totalkebutuhan));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
