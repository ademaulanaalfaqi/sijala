<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\kalab;
use Illuminate\Http\Request;

class KalabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_kalab'] = kalab::all();
        return view('admin.user.kalab.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_kalab($id)
    {
        $data['kalab'] = kalab::find($id);
        return view('admin.user.kalab.edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_kalab(Request $request)
    {
        $kalab = new kalab;
        $kalab->nama = request('nama');
        $kalab->nip = request('nip');
        $kalab->username = request('username');
        $kalab->password = request('password');
        $kalab->no_hp = request('no_hp');
        $kalab->handleUploadFotoKalab();
        $kalab->save();

        return redirect('admin/kalab')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_kalab($id)
    {
        $data['kalab'] = kalab::find($id);
        return view('admin.user.kalab.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_kalab(Request $request, $id)
    {
        $kalab = kalab::find($id);
        $kalab->nip = request('nip');
        $kalab->nama = request('nama');
        $kalab->username = request('username');
        if(request('password')) $kalab->password = request('password');
        $kalab->no_hp = request('no_hp');
        if(request('foto')) $kalab->handleUploadFotoKalab();
        $kalab->save();

        return redirect('admin/kalab')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kalab = kalab::find($id);
        $kalab->handleDelete();
        $kalab->delete();
        return redirect('admin/kalab')->with('success', 'Data Berhasil Dihapus');
    }
}
