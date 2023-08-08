<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\keluhan;
use App\Models\laboratorium;
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
        $data['list_keluhanmahasiswa'] = keluhan::all();
        $list_laboratorium = laboratorium::all();
        return view('admin.keluhan.index', $data, compact('list_laboratorium'));
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
    public function storekeluhan(Request $request)
    {
        $keluhan = new keluhan;
        $keluhan->id_lab = request('id_lab');
        $keluhan->tanggal_pengajuan = request('tanggal_pengajuan');
        $keluhan->nama_alat = request('nama_alat');
        $keluhan->deskripsi = request('deskripsi');
        $keluhan->handleUploadFotoKeluhan();
        $keluhan->save();

        return redirect('admin/keluhan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showkeluhan($id)
    {
        $data['keluhan'] = keluhan::find($id);
        return view('admin.keluhan.show', $data);
    }
    
    public function destroy($id)
    {
        $keluhan = keluhan::find($id);
        $keluhan->delete();

        return redirect('admin/keluhan')->with('success', 'Data Berhasil Dihapus');
    }

    public function proses($id)
    {
        $keluhan = keluhan::find($id);
        $keluhan->status = 2;
        $keluhan->save();
        return back();
    }

    public function selesai($id)
    {
        $keluhan = keluhan::find($id);
        $keluhan->status = 3;
        $keluhan->save();
        return back();
    }
}
