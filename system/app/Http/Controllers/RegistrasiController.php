<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function registrasi()
    {
        return view('registrasi');
    }


    public function store(Request $request)
    {
        $mahasiswa = new mahasiswa;
        $mahasiswa->nama = request('nama');
        $mahasiswa->nim = request('nim');
        $mahasiswa->username = request('username');
        $mahasiswa->password = request('password');
        $mahasiswa->no_hp = request('no_hp');
        $mahasiswa->semester = request('semester');
        $mahasiswa->status = 1;
        $mahasiswa->save();

        return redirect('login');
    }
}
