<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\admin;
use App\Models\kalab;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $id_admin = request()->user()->id_admin;
        $data ['admin'] = admin::find($id_admin);
        $data['list_admin'] = admin::all();
        return view('admin.profile.index', $data);
    }

    public function edit_profil($id)
    {
        $data['list_admin'] = admin::all();
        return view('admin.profile.edit', $data);
    }

    public function update_profile(Request $request, $id)
    {
        $admin = admin::find($id);
        $admin->nama = request('nama');
        if(request('email')) $admin->email = request('email');
        $admin->username = request('username');
        if(request('password')) $admin->password = request('password');
        if(request('foto')) $admin->handleUploadFotoAdmin();
        $admin->save();

        return redirect('admin/profile')->with('success', 'Data Berhasil Diedit');
    }
    
    
}
