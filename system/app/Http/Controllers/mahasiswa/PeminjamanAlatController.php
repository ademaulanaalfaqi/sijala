<?php

namespace App\Http\Controllers\mahasiswa;

use Carbon\Carbon;
use App\Models\alat;
use App\Models\mahasiswa;
use App\Models\peminjaman;
use App\Models\laboratorium;
use Illuminate\Http\Request;
use App\Models\peminjaman_alat;
use App\Http\Controllers\Controller;
use App\Models\keluhan_pinjam;

class PeminjamanAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $id_mahasiswa = request()->user()->id_mahasiswa;
        $data['list_peminjaman_alatmahasiswa'] = peminjaman_alat::where('id_mahasiswa', $id_mahasiswa)->get();
        $data['list_alat'] = alat::all();

        $peminjaman_alatmahasiswa = peminjaman::with('alat')->get();

        return view('mahasiswa.alat.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah_alatmahasiswa()
    {
        $data['list_alat'] = alat::all();
        return view('mahasiswa.alat.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_alatmahasiswa(Request $request)
    {
        // dd(request()->id_alat);
        $id_alat = $request->input('id_alat');
        $id_mahasiswa = request()->user()->id_mahasiswa;
        $jumlah_alat = $request->input('jumlah_alat');
        $tanggal_peminjaman = $request->input('tanggal_peminjaman');
        $tanggal_selesai = $request->input('tanggal_selesai');
        $waktu_mulai = $request->input('waktu_mulai');
        $waktu_selesai = $request->input('waktu_selesai');
        $deskripsi = $request->input('deskripsi');
        $status = 1;

        // Periksa apakah tanggal_peminjaman yang diminta setidaknya satu hari dari hari ini
        foreach ($id_alat as $key => $id_peminjaman_alat) {
            // dd($id_peminjaman_alat[$key]);
            $hari_ini = Carbon::now()->startOfDay();
            $tanggal_diminta = Carbon::parse($tanggal_peminjaman[$key])->startOfDay();
            
            if ($tanggal_diminta->lte($hari_ini)) {
                return back()->with('danger', 'Peminjaman alat harus dilakukan minimal satu hari sebelum tanggal diperlukan.');
            }

            // Mengambil alat yang tersedia di tabel alat
            $alat = alat::where('id_alat', $id_alat[$key])->first();

            if ($alat === null) {
                return back()->with('danger', 'Alat dengan ID ' . $id_alat[$key] . ' tidak ditemukan.');
            }

            // Memeriksa jumlah alat yang tersedia
            if ($alat->jumlah_alat < $jumlah_alat[$key]) {
                return back()->with('danger', 'Jumlah alat tidak mencukupi');
            }

            $peminjaman_alatmahasiswa = new peminjaman_alat();
            $peminjaman_alatmahasiswa->id_alat = $id_alat[$key];
            $peminjaman_alatmahasiswa->id_mahasiswa = $id_mahasiswa;
            $peminjaman_alatmahasiswa->jumlah_alat = $jumlah_alat[$key];
            $peminjaman_alatmahasiswa->tanggal_peminjaman = $tanggal_peminjaman[$key];
            $peminjaman_alatmahasiswa->tanggal_selesai = $tanggal_selesai[$key];
            $peminjaman_alatmahasiswa->waktu_mulai = $waktu_mulai[$key];
            $peminjaman_alatmahasiswa->waktu_selesai = $waktu_selesai[$key];
            $peminjaman_alatmahasiswa->deskripsi = $deskripsi[$key];
            $peminjaman_alatmahasiswa->status = $status;
            $peminjaman_alatmahasiswa->save();
        }
        
        return redirect('mahasiswa/peminjaman_alatmahasiswa')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function kembalikan_alatmahasiswa(Request $request)
    {
        $id_peminjaman = $request->input('id_peminjaman');

        // Mengambil data peminjaman alat
        $peminjaman_alatmahasiswa = peminjaman_alat::find($id_peminjaman);

        if (!$peminjaman_alatmahasiswa) {
            return redirect('mahasiswa/peminjaman_alatmahasiswa')->with('danger', 'Peminjaman tidak ditemukan');
        }

        $id_alat = $peminjaman_alatmahasiswa->id_alat;
        $jumlah_alat = $peminjaman_alatmahasiswa->jumlah_alat;

        // Mengambil data alat yang sesuai
        $alat = alat::where('id_alat', $id_alat)->first();

        if (!$alat) {
            return redirect('mahasiswa/peminjaman_alatmahasiswa')->with('danger', 'Alat tidak ditemukan');
        }

        // Mengembalikan alat dan mengupdate jumlah alat
        $alat->jumlah_alat += $jumlah_alat;
        $alat->save();

        // Menghapus data peminjaman alat
        // $peminjaman_alatmahasiswa->delete();
        $peminjaman_alatmahasiswa->status = 4;
        $peminjaman_alatmahasiswa->save();

        return redirect('mahasiswa/peminjaman_alatmahasiswa')->with('success', 'Alat telah dikembalikan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_alatmahasiswa($id)
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['list_alat'] = alat::all();
        $data['peminjaman_alatmahasiswa'] = peminjaman_alat::find($id);
        $data['keluhan_pinjam'] = keluhan_pinjam::where('id_peminjaman_alat', $id)->first();
        return view('mahasiswa.alat.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_alatmahasiswa($id)
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $list_laboratorium = laboratorium::all();
        $data['peminjaman_alatmahasiswa'] = peminjaman_alat::find($id);
        return view('mahasiswa.alat.edit', $data, compact('list_laboratorium'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_alatmahasiswa(Request $request, $id)
    {
        $peminjaman_alatmahasiswa = peminjaman_alat::find($id);
        $peminjaman_alatmahasiswa->nama_alat = request('nama_alat');
        $peminjaman_alatmahasiswa->jumlah_alat = request('jumlah_alat');
        $peminjaman_alatmahasiswa->tanggal_peminjaman = request('tanggal_peminjaman');
        $peminjaman_alatmahasiswa->tanggal_selesai = request('tanggal_selesai');
        $peminjaman_alatmahasiswa->waktu_mulai = request('waktu_mulai');
        $peminjaman_alatmahasiswa->waktu_selesai = request('waktu_selesai');
        $peminjaman_alatmahasiswa->deskripsi = request('deskripsi');
        $peminjaman_alatmahasiswa->status = 1;
        $peminjaman_alatmahasiswa->save();

        return redirect('mahasiswa/peminjaman_alatmahasiswa')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $peminjaman_alatmahasiswa = peminjaman_alat::find($id);
        //$peminjaman_alatmahasiswa->handleDelete();
        $peminjaman_alatmahasiswa->delete();
        return redirect('mahasiswa/peminjaman_alatmahasiswa')->with('success', 'Data Berhasil Dihapus');
    }
}
