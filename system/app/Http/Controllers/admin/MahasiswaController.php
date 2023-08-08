<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        return view('admin.user.mahasiswa.index', $data);
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
    public function store(Request $request)
    
    {
        $mahasiswa = new mahasiswa();
        $mahasiswa->nim = request('nim');
        $mahasiswa->username = request('username');
        $mahasiswa->password = request('password');
        $mahasiswa->no_hp = request('no_hp');
        $mahasiswa->semester = request('semester');
        $mahasiswa->save();

        return redirect('admin/mahasiswa');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showmahasiswa($id)
    {
        $data['mahasiswa'] = mahasiswa::find($id);
        return view('admin.user.mahasiswa.show', $data);
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
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->handleDelete();
        $mahasiswa->delete();
        return redirect('admin/mahasiswa')->with('success', 'Data Berhasil Dihapus');
    }

    public function setuju($id_mahasiswa)
    {
      $mahasiswa = mahasiswa::find($id_mahasiswa);
      $mahasiswa->status = 2;
      $mahasiswa->save();

      return redirect('admin/mahasiswa')->with('success', 'Data Mahasiswa Berhasil Disetujui');

    }
    public function tolak($id_mahasiswa)
    {
      $mahasiswa = mahasiswa::find($id_mahasiswa);
      $mahasiswa->status = 3;
      $mahasiswa->save();

      return redirect('admin/mahasiswa')->with('success', 'Data Mahasiswa Berhasil Ditolak');

    }
    
}
