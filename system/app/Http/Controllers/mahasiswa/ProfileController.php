<?php

namespace App\Http\Controllers\mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $id_mahasiswa = request()->user()->id_mahasiswa;
        $data ['mahasiswa'] = mahasiswa::find($id_mahasiswa);
        $data['list_mahasiswa'] = mahasiswa::all();
        return view('mahasiswa.profile.index', $data);
    }

    public function edit_profilemahasiswa($id)
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        return view('mahasiswa.profile.edit', $data);
    }

    public function update_profilemahasiswa(Request $request, $id)
    {
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->nama = request('nama');
        $mahasiswa->username = request('username');
        if(request('password')) $mahasiswa->password = request('password');
        $mahasiswa->no_hp = request('no_hp');
        if(request('foto')) $mahasiswa->handleUploadFotoMahasiswa();
        $mahasiswa->save();

        return redirect('mahasiswa/profile_mahasiswa')->with('success', 'Data Berhasil Diedit');
    }
}
