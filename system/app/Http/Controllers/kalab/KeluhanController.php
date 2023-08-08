<?php

namespace App\Http\Controllers\kalab;

use App\Http\Controllers\Controller;
use App\Models\alat;
use App\Models\keluhan;
use App\Models\laboratorium;
use App\Models\mahasiswa;
use App\Models\peminjaman;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['list_keluhan_kalab'] = keluhan::all();
        $data['list_peminjamanmahasiswa'] = peminjaman::all();
        $list_laboratorium = laboratorium::all();
        return view('kalab.keluhan.index', $data, compact('list_laboratorium'));
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
    public function store_keluhan_kalab(Request $request)
    {
        
        $keluhan_kalab = new keluhan;
        $keluhan_kalab->status = 1;
        $keluhan_kalab->id_lab = request('id_lab');
        $keluhan_kalab->tanggal_pengajuan = request('tanggal_pengajuan');
        $keluhan_kalab->nama_alat = request('nama_alat');
        $keluhan_kalab->deskripsi = request('deskripsi');
        // $keluhan_kalab->handleUploadFotoKeluhan();
        $keluhan_kalab->save();

        return redirect('kalab/keluhan_kalab');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_keluhankalab($id)
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['keluhan_kalab'] = keluhan::find($id);
        return view('kalab.keluhan.show', $data);
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
