<?php

namespace App\Http\Controllers\mahasiswa;

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
        $id_mahasiswa = request()->user()->id_mahasiswa;
        $data['list_peminjamanmahasiswa'] = peminjaman::where('id_mahasiswa', $id_mahasiswa)->get();
        $data['list_laboratorium'] = laboratorium::all();
        return view('mahasiswa.peminjaman.index', $data);
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
    public function store_peminjamanmahasiswa(Request $request)
    {
        // Memeriksa ketersediaan laboratorium pada jam tertentu
        $id_lab = request('id_lab');
        $id_mahasiswa = request()->user()->id_mahasiswa;
        $tanggal_peminjaman = request('tanggal_peminjaman');
        $tanggal_selesai = request('tanggal_selesai');
        $waktu_mulai = request('waktu_mulai');
        $waktu_selesai = request('waktu_selesai');
        $status = 1;

        // Memeriksa apakah laboratorium sudah dipinjam pada jam tertentu
        $existingPeminjaman = peminjaman::where('id_lab', $id_lab)
            ->where(function ($query) use ($tanggal_peminjaman, $tanggal_selesai, $waktu_mulai, $waktu_selesai) {
                $query->where(function ($subQuery) use ($tanggal_peminjaman, $tanggal_selesai, $waktu_mulai, $waktu_selesai) {
                    $subQuery->where('tanggal_peminjaman', $tanggal_peminjaman)
                        ->where('waktu_mulai', '<=', $waktu_selesai)
                        ->where('waktu_selesai', '>', $waktu_mulai);
                })->orWhere(function ($subQuery) use ($tanggal_peminjaman, $tanggal_selesai, $waktu_mulai, $waktu_selesai) {
                    $subQuery->where('tanggal_selesai', '>=', $tanggal_peminjaman)
                        ->where('waktu_mulai', '<=', $waktu_selesai)
                        ->where('waktu_selesai', '>=', $waktu_mulai);
                });
            })
            ->first();

        // Jika laboratorium sudah dipinjam pada jam tertentu, kembalikan response error
        if ($existingPeminjaman) {
            return back()->with('danger', 'Laboratorium tidak tersedia pada jam yang dipilih.');
        }

        // Jika laboratorium tersedia pada jam yang dipilih, simpan peminjaman secara manual
        $peminjaman = new peminjaman();
        $peminjaman->id_lab = $id_lab;
        $peminjaman->id_mahasiswa = $id_mahasiswa;
        $peminjaman->tanggal_peminjaman = $tanggal_peminjaman;
        $peminjaman->tanggal_selesai = $tanggal_selesai;
        $peminjaman->waktu_mulai = $waktu_mulai;
        $peminjaman->waktu_selesai = $waktu_selesai;
        $peminjaman->status = $status;
        $peminjaman->save();

        // Redirect ke halaman yang diinginkan setelah peminjaman berhasil disimpan
        return redirect('mahasiswa/peminjaman_mahasiswa')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_peminjamanmahasiswa($id)
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['peminjaman_mahasiswa'] = peminjaman::find($id);
        $data['list_laboratorium'] = laboratorium::all();
        return view('mahasiswa.peminjaman.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_peminjamanmahasiswa($id)
    {
        $data['list_laboratorium'] = laboratorium::all();
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['peminjaman_mahasiswa'] = peminjaman::find($id);
        return view('mahasiswa.peminjaman.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_peminjamanmahasiswa(Request $request, $id)
    {
        $peminjaman_mahasiswa = peminjaman::find($id);
        $peminjaman_mahasiswa->id_lab = request('id_lab');
        $peminjaman_mahasiswa->id_mahasiswa = request()->user()->id_mahasiswa;
        $peminjaman_mahasiswa->tanggal_peminjaman = request('tanggal_peminjaman');
        $peminjaman_mahasiswa->tanggal_selesai = request('tanggal_selesai');
        $peminjaman_mahasiswa->waktu_mulai = request('waktu_mulai');
        $peminjaman_mahasiswa->waktu_selesai = request('waktu_selesai');
        $peminjaman_mahasiswa->status = 1;
        $peminjaman_mahasiswa->save();

        return redirect('mahasiswa/peminjaman_mahasiswa')->with('success', 'Data Berhasil Diedit');
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
        $peminjaman_mahasiswa = peminjaman::find($id);
        //$peminjaman_mahasiswa->handleDelete();
        $peminjaman_mahasiswa->delete();
        return redirect('mahasiswa/peminjaman_mahasiswa')->with('success', 'Data Berhasil Dihapus');
    }
}
