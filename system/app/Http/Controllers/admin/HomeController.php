<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\peminjaman;
use App\Models\peminjaman_alat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller{

    function showBeranda(){
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

        return view('admin.index', $data, ['daftarTanggal' => $daftarTanggal]);

    }
}


