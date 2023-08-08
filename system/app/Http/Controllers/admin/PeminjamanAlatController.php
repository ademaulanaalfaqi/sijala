<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\alat;
use App\Models\keluhan_pinjam;
use App\Models\peminjaman_alat;
use App\Models\laboratorium;
use Illuminate\Http\Request;

class PeminjamanAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_peminjamanalat'] = peminjaman_alat::all();
        $list_laboratorium = laboratorium::all();
        return view('admin.peminjaman_alat.index', $data, compact('list_laboratorium'));
    }

    public function store(Request $request)
    {
        $peminjaman_alat = new peminjaman_alat;
        $peminjaman_alat->nama_alat = request('nama_alat');
        $peminjaman_alat->jumlah_alat = request('jumlah alat');
        $peminjaman_alat->deskripsi = request('deskripsi');
        $peminjaman_alat->handleUploadFotoAlat();
        $peminjaman_alat->status = 1;
        $peminjaman_alat->save();

        return redirect('admin/peminjaman_alat');
    }

    public function show_peminjamanalat($id){
      $data['list_alat'] = alat::all();
      $data['peminjaman_alat'] = peminjaman_alat::find($id);
      $data['keluhan_pinjam'] = keluhan_pinjam::where('id_peminjaman_alat', $id)->first();
      return view('admin.peminjaman_alat.show', $data);
    }

    public function destroy($id)
    {
        $peminjaman_alat = peminjaman_alat::find($id);
        $peminjaman_alat->delete();
        return redirect('admin/peminjaman_alat')->with('success', 'Data Berhasil Dihapus');
    }

    public function setuju_peminjamanalat($id)
    {
      $peminjaman_alat = peminjaman_alat::find($id);

      $id_alat = $peminjaman_alat->id_alat;
      $jumlah_alat = $peminjaman_alat->jumlah_alat;
      $alat = alat::where('id_alat', $id_alat)->first();

      if ($alat->jumlah_alat < $jumlah_alat) {
        return redirect('admin/peminjaman_alat')->with('danger', 'Jumlah alat tidak mencukupi');
      }

      $peminjaman_alat->status = 2;
      $peminjaman_alat->save();

      $alat->jumlah_alat -= $jumlah_alat;
      $alat->save();

      return back()->with('success', 'Data Peminjaman Alat Disetujui');

    }
    public function tolak_peminjamanalat($id)
    {
      $peminjaman_alat = peminjaman_alat::find($id);
      $peminjaman_alat->status = 3;
      $peminjaman_alat->save();

      return back()->with('success', 'Data Peminjaman Alat Ditolak');

    }

}
