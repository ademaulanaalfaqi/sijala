<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\laboratorium;
use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    public function index(){

        $data['list_laboratorium'] = laboratorium::all();

        return view('admin.laboratorium.index', $data);
    }

    public function storelaboratorium(){
        $laboratorium = new laboratorium;
        $laboratorium->nama_laboratorium = request('nama_laboratorium');
        $laboratorium->kapasitas = request('kapasitas');
        $laboratorium->handleUploadFotoLaboratorium();

        $laboratorium->save();

        return redirect('admin/laboratorium')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function create($id){
        $data['laboratorium'] = laboratorium::find($id); 

        return view('admin.Laboratorium.create', $data);
    }

    public function update_laboratorium($id){

        $laboratorium = laboratorium::find($id);
        $laboratorium->nama_laboratorium = request('nama_laboratorium');
        $laboratorium->kapasitas = request('kapasitas');
        $laboratorium->handleUploadFotoLaboratorium();
        $laboratorium->save();

        return redirect('admin/laboratorium')->with('success', 'Data Berhasil Diedit');
    }

    public function showlaboratorium($id){
        $data['laboratorium'] = laboratorium::find($id);
        return view('admin.laboratorium.show', $data);
    }

    public function destroy($id)
    {
        $laboratorium = laboratorium::find($id);
        $laboratorium->handleDelete();
        $laboratorium->delete();
        return redirect('admin/laboratorium')->with('success', 'Data Berhasil Dihapus');
    }
}
