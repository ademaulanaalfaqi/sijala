<?php

namespace App\Models;

use App\Models\peminjaman_alat;
use App\Models\peminjaman;
use Illuminate\Support\Str;
use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mahasiswa extends ModelAuthenticate
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';

    function peminjaman()
    {
        return $this->belongsTo(peminjaman::class, 'id_mahasiswa');
    }

    function peminjaman_alat()
    {
        return $this->belongsTo(peminjaman_alat::class, 'id_mahasiswa');
    }

    function handleUploadFotoMahasiswa()
    {
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "images/mahasiswa";
            $randomStr = Str::random(5);
            $filename = time() . "-"  . $randomStr . "."  . $foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "app/" . $url;
            $this->save();
        }
    }

    function handleDelete()
	{
		$foto = $this->foto;
		if($foto){
			$path = public_path($foto);
			if (file_exists($path)) {
				unlink($path);
			}
			return true;
		}
	}
}
