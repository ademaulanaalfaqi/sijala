<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\keluhan;
use App\Models\peminjaman;
use App\Models\alat;
use App\Models\peminjaman_alat;

class laboratorium extends Model
{
    protected $table = 'laboratorium';
    protected $primaryKey = 'id_lab';

    function keluhan()
    {
        return $this->belongsTo(keluhan::class, 'id_lab');
    }

    function peminjaman()
    {
        return $this->belongsTo(peminjaman::class, 'id_lab');
    }

    function alat()
    {
        return $this->belongsTo(alat::class, 'id_lab');
    }

    public function handleUploadFotoLaboratorium()
    {
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "images/laboratorium";
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

