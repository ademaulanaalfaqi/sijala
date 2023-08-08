<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\laboratorium;
use App\Models\peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $data['list_peminjaman'] = peminjaman::all();
        $list_laboratorium = laboratorium::all();
        
        return view('admin.peminjaman.index', $data, compact('list_laboratorium'));
    }

    public function storepeminjaman(Request $request)
    {
        $peminjaman = new peminjaman;
        $peminjaman->nim = request('nim');
        $peminjaman->nama = request('nama');
        $peminjaman->id_lab = request('id_lab');
        $peminjaman->tanggal_peminjaman = request('tanggal_peminjaman');
        $peminjaman->tanggal_selesai = request('tanggal_selesai');
        $peminjaman->waktu_mulai = request('waktu_mulai');
        $peminjaman->waktu_selesai = request('waktu_selesai');
        $peminjaman->keperluan_alat = request('keperluan_alat');
        $peminjaman->status = 1;
        $peminjaman->save();

        
        return redirect('admin/peminjaman');

    }

    public function showpeminjaman($id)
    {
        $data['list_laboratorium'] = laboratorium::all();
        $data['peminjaman'] = peminjaman::find($id);
        return view('admin.peminjaman.show', $data);
    }

    public function destroy($id)
    {
        $peminjaman = peminjaman::find($id);
        // $peminjaman->handleDelete();
        $peminjaman->delete();
        return redirect('admin/peminjaman_lab')->with('success', 'Data Berhasil Dihapus');
    }

    public function setuju_peminjaman($id)
    {
      $peminjaman = peminjaman::find($id);
      $peminjaman->status = 2;
      $peminjaman->save();

      return back()->with('success', 'Data Peminjaman Disetujui');

    }
    public function tolak_peminjaman($id)
    {
      $peminjaman = peminjaman::find($id);
      $peminjaman->status = 3;
      $peminjaman->save();

      return back()->with('success', 'Data Peminjaman Ditolak');

    }
}
