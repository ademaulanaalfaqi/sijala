<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\laboratorium;
use App\Models\keluhan;
use App\Models\mahasiswa;

class peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';

    function keluhan()
    {
        return $this->belongsTo(keluhan::class, 'id_keluhan');
    }

    function laboratorium()
    {
        return $this->belongsTo(laboratorium::class, 'id_lab');
    }
    function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class, 'id_mahasiswa');
    }
    function alat()
    {
        return $this->belongsTo(alat::class, 'id_alat');
    }
}
