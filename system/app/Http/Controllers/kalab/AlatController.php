<?php

namespace App\Http\Controllers\kalab;

use App\Http\Controllers\Controller;
use App\Models\alat;
use App\Models\laboratorium;
use App\Models\mahasiswa;
use App\Models\peminjaman_alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['list_alatkalab'] = peminjaman_alat::all();
        $list_laboratorium = laboratorium::all();
        return view('kalab.alat.index', $data, compact('list_laboratorium'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_alat_kalab(Request $request)
    {
        $peminjaman_alatkalab = new alat();
        $peminjaman_alatkalab->nama_alat = request('nama_alat');
        $peminjaman_alatkalab->jumlah_alat = request('jumlah_alat');
        $peminjaman_alatkalab->tanggal_peminjaman = request('tanggal_peminjaman');
        $peminjaman_alatkalab->tanggal_selesai = request('tanggal_selesai');
        $peminjaman_alatkalab->waktu_mulai = request('waktu_mulai');
        $peminjaman_alatkalab->waktu_selesai = request('waktu_selesai');
        $peminjaman_alatkalab->deskripsi = request('deskripsi');
        $peminjaman_alatkalab->status = 1;
        $peminjaman_alatkalab->save();
        
        return redirect('kalab/peminjaman_alatkalab');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_alatkalab($id)
    {
        $data['list_alat'] = alat::all();
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['peminjaman_alatkalab'] = peminjaman_alat::find($id);
        return view('kalab.alat.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
