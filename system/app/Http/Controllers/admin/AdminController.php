<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_admin'] = admin::all();
        return view('admin.user.admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeadmin(Request $request)
    {
        $admin = new admin();
        $admin->nama = request('nama');
        $admin->email = request('email');
        $admin->username = request('username');
        $admin->password = request('password');
        $admin->save();

        return redirect('admin/admin')->with('success', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['admin'] = admin::find($id);
        return view('admin.user.admin.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editadmin($id)
    {
        $data['admin'] = admin::find($id);
        return view('admin.user.admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateadmin(Request $request, $id)
    {
        $admin = admin::find($id);
        $admin->nama = request('nama');
        $admin->email = request('email');
        $admin->username = request('username');
        $admin->password = request('password');
        $admin->save;

        return redirect('admin/admin')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = admin::find($id);
        $admin->handleDelete();
        $admin->delete();
        return redirect('admin/admin')->with('success', 'Data Berhasil Dihapus');
    }

}
