<?php

namespace App\Http\Controllers\mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\keluhan;
use App\Models\keluhan_pinjam;
use App\Models\laboratorium;
use App\Models\mahasiswa;
use App\Models\peminjaman;
use Illuminate\Http\Request;

class KeluhanMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['list_keluhan_mahasiswa'] = keluhan::all();
        $data['list_peminjamanmahasiswa'] = peminjaman::all();
        $list_laboratorium = laboratorium::all();
        return view('mahasiswa.keluhan.index', $data, compact('list_laboratorium'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_keluhanmahasiswa(Request $request)
    {
        $keluhan_mahasiswa = new keluhan;
        $keluhan_mahasiswa->status = 1;
        $keluhan_mahasiswa->id_lab = request('id_lab');
        $keluhan_mahasiswa->tanggal_pengajuan = request('tanggal_pengajuan');
        $keluhan_mahasiswa->nama_alat = request('nama_alat');
        $keluhan_mahasiswa->nomor_meja = request('nomor_meja');
        $keluhan_mahasiswa->deskripsi = request('deskripsi');
        $keluhan_mahasiswa->handleUploadFotoKeluhan();
        $keluhan_mahasiswa->save();

        return redirect('mahasiswa/keluhan_mahasiswa')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_keluhanmahasiswa($id)
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['keluhan_mahasiswa'] = keluhan::find($id);
        return view('mahasiswa.keluhan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_keluhanmahasiswa($id)
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $list_laboratorium = laboratorium::all();
        $data['keluhan_mahasiswa'] = keluhan::find($id);
        return view('mahasiswa.keluhan.edit', $data, compact('list_laboratorium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_keluhanmahasiswa(Request $request, $id)
    {
        $keluhan_mahasiswa = keluhan::find($id);
        $keluhan_mahasiswa->id_lab = request('id_lab');
        $keluhan_mahasiswa->tanggal_pengajuan = request('tanggal_pengajuan');
        $keluhan_mahasiswa->nama_alat = request('nama_alat');
        $keluhan_mahasiswa->deskripsi = request('deskripsi');
        if(request('foto'))$keluhan_mahasiswa->handleUploadFotoKeluhan();
        $keluhan_mahasiswa->save();

        return redirect('mahasiswa/keluhan_mahasiswa')->with('success', 'Data Berhasil Diedit');
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
        $keluhan_mahasiswa = keluhan::find($id);
        $keluhan_mahasiswa->delete();
        return redirect('mahasiswa/keluhan_mahasiswa')->with('success', 'Data Berhasil Dihapus');
    }


    public function storeKeluhanDipinjam()
    {
        $keluhan_pinjam = new keluhan_pinjam;
        $keluhan_pinjam->id_peminjaman_alat = request('id_peminjaman_alat');
        $keluhan_pinjam->nama_alat = request('nama_alat');
        $keluhan_pinjam->keterangan = request('keterangan');
        $keluhan_pinjam->handleUploadFoto();

        return redirect('mahasiswa/peminjaman_alatmahasiswa')->with('success', 'Keluhan Berhasil Ditambah');

    }


}
