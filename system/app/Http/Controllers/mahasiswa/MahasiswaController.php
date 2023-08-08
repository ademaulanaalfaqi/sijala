<?php

namespace App\Http\Controllers\mahasiswa;

use Carbon\Carbon;
use App\Models\mahasiswa;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    function showmahasiswa()
    {
        $mulai = Carbon::now(); // Menggunakan tanggal saat ini sebagai awal
        $akhir = $mulai->copy()->addWeek(); // Menambahkan 7 hari ke tanggal awal
        $daftarTanggal = [];

        while ($mulai->lte($akhir)) {
            $daftarTanggal[] = [
                'tanggal' => $mulai->toDateString(),
                'url' => route('detail-tanggal', $mulai->toDateString())
            ];
            $mulai->addDay();
        }

        $data['list_peminjaman'] = peminjaman::whereDate('tanggal_peminjaman', '=', Carbon::today()->toDateString())->get();
        $data['peminjaman'] = peminjaman::all();

        if (request('tanggal')) {
            $tanggal = request('tanggal');
            $data['list_peminjaman'] = peminjaman::whereDate('tanggal_peminjaman', $tanggal)->get();
        }
        return view('mahasiswa.index', $data, ['daftarTanggal' => $daftarTanggal]);
    }
}
