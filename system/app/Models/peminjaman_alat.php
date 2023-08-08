<?php

namespace App\Models;

use App\Models\keluhan_pinjam;
use App\Models\alat;
use App\Models\mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class peminjaman_alat extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_alat';
    protected $primaryKey = 'id_peminjaman_alat';

    function alat()
    {
        return $this->belongsTo(alat::class, 'id_alat');
    }

    function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class, 'id_mahasiswa');
    }

    function keluhan_pinjam()
    {
        return $this->belongsTo(keluhan_pinjam::class, 'id_peminjaman_alat');
    }
}
