<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
		return view ('login');
	}

	public function LoginProses()
    {
        $credentials = ['username' => request('username'), 'password' => request('password')];

        $mahasiswa = mahasiswa::where('username', $credentials['username'])->first();

        if ($mahasiswa && $mahasiswa->status == 1) {
            return redirect('login')->with('danger', 'Akun belum diverifikasi atau tidak aktif!');
        }
        if ($mahasiswa && $mahasiswa->status == 3) {
            return redirect('login')->with('danger', 'Akun tidak diverifikasi!');
        }
        if (auth()->guard('mahasiswa')->attempt($credentials)){
            return redirect('mahasiswa/beranda_mahasiswa')->with('success', 'Login Berhasil');
        }

        if (auth()->guard('admin')->attempt($credentials)){
            return redirect('admin/beranda')->with('success', 'Login Berhasil');
        }

        if (auth()->guard('kalab')->attempt($credentials)){
            return redirect('kalab/beranda_kalab')->with('success', 'Login Berhasil');
        }

		return redirect('login')->with('danger', 'Login Gagal!');
	}

	public function logout(Request $request)
    {
		auth()->logout();
		$request->session()->invalidate();
		return redirect('login');
	}
    


}
