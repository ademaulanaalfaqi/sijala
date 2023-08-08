<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\alat;
use App\Models\laboratorium;
use App\Models\peminjaman;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        $data['list_alat'] = alat::all();
        $list_laboratorium = laboratorium::all();
        return view('admin.alat.index', $data, compact('list_laboratorium'));
    }

    public function storealat(Request $request)
    {
        $alat = new alat;
        $alat->nama_alat = request('nama_alat');
        $alat->jumlah_alat = request('jumlah_alat');
        $alat->deskripsi = request('deskripsi');
        $alat->handleUploadFotoAlat();
        $alat->status = 1;
        $alat->save();

        return redirect('admin/alat')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show_alat($id)
    {
        $data['alat'] = alat::find($id);
        return view('admin.alat.show', $data);
    }

    public function edit_peminjamanalat($id)
    {
        $data['alat'] = alat::find($id);
        return view('admin.peminjaman.edit', $data);
    }

    public function update_peminjamanalat($id)
    {
        $alat = alat::find($id);
        $alat->nama_alat = request('nama_alat');
        $alat->jumlah_alat = request('jumlah_alat');
        $alat->deskripsi = request('deskripsi');
        $alat->handleUploadFotoAlat();
        $alat->save();

        return redirect('admin/alat')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        $alat = alat::find($id);
        $alat->handleDelete();
        $alat->delete();
        return redirect('admin/alat')->with('success', 'Data Berhasil Dihapus');
    }

    

}
