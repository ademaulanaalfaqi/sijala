<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\alat;
use Illuminate\Http\Request;

class PeminjamanAlatResource extends Controller
{
    public function getAlat($id_lab)
    {
        return alat::where("id_lab", $id_lab)->get();
    }
}
