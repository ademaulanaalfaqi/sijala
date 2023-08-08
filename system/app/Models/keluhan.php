<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\peminjaman;
use App\Models\laboratorium;

class keluhan extends Model
{
    protected $table = 'keluhan';
    protected $primaryKey = 'id_keluhan';

    function peminjaman()
    {
        return $this->belongsTo(peminjaman::class, 'id_peminjaman');
    }

    function laboratorium()
    {
        return $this->belongsTo(laboratorium::class, 'id_lab');
    }

    public function handleUploadFotoKeluhan()
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
