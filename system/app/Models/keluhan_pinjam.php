<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\peminjaman_alat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class keluhan_pinjam extends Model
{
    protected $table = 'keluhan_alat_pinjam';
    protected $primaryKey = 'id_keluhan_pinjam';

    function peminjaman_alat()
    {
        return $this->belongsTo(peminjaman_alat::class, 'id_peminjaman_alat');
    }

    public function handleUploadFoto()
    {
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "images/keluhan";
            $randomStr = Str::random(5);
            $filename = time() . "-"  . $randomStr . "."  . $foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "app/" . $url;
            $this->save();

        }
    }
}
