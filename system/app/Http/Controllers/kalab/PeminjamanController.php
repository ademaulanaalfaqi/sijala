<?php

namespace App\Http\Controllers\kalab;

use App\Http\Controllers\Controller;
use App\Models\laboratorium;
use App\Models\mahasiswa;
use App\Models\peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['list_peminjamankalab'] = peminjaman::all();
        $list_laboratorium = laboratorium::all();
        return view('kalab.peminjaman.index', $data, compact('list_laboratorium'));
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
    public function store_peminjaman_kalab(Request $request)
    {
        $peminjaman_kalab = new peminjaman();
        $peminjaman_kalab->id_lab = request('id_lab');
        $peminjaman_kalab->id_mahasiswa = request()->user()->id_mahasiswa;
        $peminjaman_kalab->tanggal_peminjaman = request('tanggal_peminjaman');
        $peminjaman_kalab->tanggal_selesai = request('tanggal_selesai');
        $peminjaman_kalab->waktu_mulai = request('waktu_mulai');
        $peminjaman_kalab->waktu_selesai = request('waktu_selesai');
        $peminjaman_kalab->keperluan_alat = request('keperluan_alat');
        $peminjaman_kalab->status = 1;
        $peminjaman_kalab->save();

        return redirect('kalab/peminjaman_kalab');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_peminjamankalab($id)
    {
        $data['list_laboratorium'] = laboratorium::all();
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['peminjaman_kalab'] = peminjaman::find($id);
        return view('kalab.peminjaman.show', $data);
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
