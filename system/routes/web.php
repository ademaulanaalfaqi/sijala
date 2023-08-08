<?php
//admin
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\JurusanController;
use App\Http\Controllers\admin\KalabController;
use App\Http\Controllers\admin\LaboratoriumController;
use App\Http\Controllers\admin\MahasiswaController;
use App\Http\Controllers\admin\PeminjamanController;
use App\Http\Controllers\admin\ProdiController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AlatController;
use App\Http\Controllers\admin\KeluhanController;
use App\Http\Controllers\admin\PeminjamanAlatController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\api\PeminjamanAlatResource;

//mahasiswa
use App\Http\Controllers\mahasiswa\KeluhanMahasiswaController;
use App\Http\Controllers\mahasiswa\PeminjamanAlatController as PeminjamanAlatMahasiswaController;
use App\Http\Controllers\mahasiswa\MahasiswaController as MahasiswaaController;
use App\Http\Controllers\mahasiswa\PeminjamanController as PeminjamanMahasiswaController;
use App\Http\Controllers\mahasiswa\ProfileController as ProfileMahasiswaController;

//kalab
use App\Http\Controllers\kalab\AlatController as AlatKalabController;
use App\Http\Controllers\kalab\KeluhanController as KeluhanKalabController;
use App\Http\Controllers\kalab\PeminjamanController as PeminjamanKalabController;
use App\Http\Controllers\kalab\KalabController as HomeKalabController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'LoginProses']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('registrasi', [RegistrasiController::class, 'registrasi']);
Route::post('storeg', [RegistrasiController::class, 'store']);

Route::prefix('admin')->middleware('auth:admin')->group(function(){
    Route::get('beranda', [HomeController::class, 'showberanda'])->name('detail-tanggal', 'calendar');

        // lab
    Route::get('laboratorium', [LaboratoriumController::class, 'index']);
    Route::get('editlaboratorium/{id}', [LaboratoriumController::class, 'editlaboratorium']);
    Route::get('showlaboratorium/{id}', [LaboratoriumController::class, 'showlaboratorium']);
    Route::post('storelaboratorium', [LaboratoriumController::class, 'storelaboratorium']);
    Route::put('update_laboratorium/{id}', [LaboratoriumController::class,'update_laboratorium']);
    Route::delete('laboratorium/{id}', [LaboratoriumController::class, 'destroy']);

        //mahasiswa
    Route::get('mahasiswa', [MahasiswaController::class, 'index']);
    Route::put('mahasiswa/setuju/{id_mahasiswa}', [MahasiswaController::class, 'setuju']);
    Route::put('mahasiswa/tolak/{id_mahasiswa}', [MahasiswaController::class, 'tolak']);
    Route::post('store', [MahasiswaController::class, 'store']);
    Route::put('update/{id}', [MahasiswaController::class, 'update']);
    Route::get('showmahasiswa/{id}', [MahasiswaController::class, 'showmahasiswa']);
    Route::delete('mahasiswa/{id}', [MahasiswaController::class, 'destroy']);

        //admin
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('editadmin/{id}', [AdminController::class, 'editadmin']);
    Route::post('storeadmin', [AdminController::class, 'storeadmin']);
    Route::put('updateadmin/{id}', [AdminController::class, 'updateadmin']);
    Route::delete('admin/{id}', [AdminController::class, 'destroy']);

        //kalab
    Route::get('kalab', [KalabController::class, 'index']);
    Route::get('edit_kalab/{id}', [KalabController::class, 'edit_kalab']);
    Route::post('store_kalab', [KalabController::class, 'store_kalab']);
    Route::put('update_kalab/{id}', [KalabController::class, 'update_kalab']);
    Route::delete('kalab/{id}', [KalabController::class, 'destroy']);
    Route::get('show_kalab/{id}', [KalabController::class, 'show_kalab']);

        //peminjaman lab
    Route::get('peminjaman_lab', [PeminjamanController::class, 'index']);
    Route::get('showpeminjaman/{id}', [PeminjamanController::class, 'showpeminjaman']);
    Route::put('peminjaman_lab/tolak/{id_peminjaman}', [PeminjamanController::class, 'tolak_peminjaman']);
    Route::put('peminjaman_lab/setuju/{id}', [PeminjamanController::class, 'setuju_peminjaman']);
    Route::delete('peminjaman_lab/{id}', [PeminjamanController::class, 'destroy']);

        //alat
    Route::get('alat', [AlatController::class, 'index']);
    Route::get('show_alat/{id}', [AlatController::class, 'show_alat']);
    Route::post('storealat', [AlatController::class, 'storealat']);
    Route::put('kurangi-stok/{id}', [AlatController::class, 'kurangiStok']);
    Route::put('kembalikan-stok/{id}', [AlatController::class, 'kembalikanStok']);


        //peminjaman alat
    Route::get('peminjaman_alat', [PeminjamanAlatController::class, 'index']);
    Route::get('show_peminjamanalat/{id_alat}', [PeminjamanAlatController::class, 'show_peminjamanalat']);
    Route::get('edit_alat/{id_alat}', [PeminjamanAlatController::class, 'edit_alat']);
    Route::put('peminjaman_alat/setuju/{id_alat}', [PeminjamanAlatController::class, 'setuju_peminjamanalat']);
    Route::put('peminjaman_alat/tolak/{id_alat}', [PeminjamanAlatController::class, 'tolak_peminjamanalat']);
    Route::delete('peminjaman_alat/{id_alat}', [PeminjamanAlatController::class, 'destroy']);

        //keluhan
    Route::get('keluhan', [KeluhanController::class, 'index']);
    Route::put('proses/{id_keluhan}', [KeluhanController::class, 'proses']);
    Route::put('selesai/{id_keluhan}', [KeluhanController::class, 'selesai']);
    Route::get('showkeluhan/{id_keluhan}', [KeluhanController::class, 'showkeluhan']);
    Route::delete('keluhan/{id}', [KeluhanController::class, 'destroy']);
    Route::put('proses/{id_keluhan}', [KeluhanController::class, 'proses']);
    Route::put('selesai/{id_keluhan}', [KeluhanController::class, 'selesai']);
    
        //profile
    Route::get('profile', [ProfileController::class, 'index']);
    Route::get('edit_profil/{id}', [ProfileController::class, 'edit_profile']);
    Route::put('update_profile/{id}', [ProfileController::class, 'update_profile']);
});

Route::prefix('mahasiswa')->middleware('auth:mahasiswa')->group(function(){
//mahasiswa  
    Route::get('beranda_mahasiswa', [MahasiswaaController::class, 'showmahasiswa'])->name('detail-tanggal');

    //keluhan
    Route::get('keluhan_mahasiswa', [KeluhanMahasiswaController::class, 'index']);
    Route::get('edit_keluhanmahasiswa/{id}', [KeluhanMahasiswaController::class, 'edit_keluhanmahasiswa']);
    Route::post('store_keluhanmahasiswa', [KeluhanMahasiswaController::class, 'store_keluhanmahasiswa']);
    Route::put('update_keluhanmahasiswa/{id}', [KeluhanMahasiswaController::class, 'update_keluhanmahasiswa']);
    Route::delete('keluhan_mahasiswa/{id}', [KeluhanMahasiswaController::class, 'destroy']);
    Route::get('show_keluhanmahasiswa/{id}', [KeluhanMahasiswaController::class, 'show_keluhanmahasiswa']);
    Route::post('store_keluhan_pinjam', [KeluhanMahasiswaController::class, 'storeKeluhanDipinjam']);

    //peminjaman lab
    Route::get('peminjaman_mahasiswa', [PeminjamanMahasiswaController::class, 'index']);
    Route::get('edit_peminjamanmahasiswa/{id}', [PeminjamanMahasiswaController::class, 'edit_peminjamanmahasiswa']);
    Route::post('store_peminjamanmahasiswa', [PeminjamanMahasiswaController::class, 'store_peminjamanmahasiswa']);
    Route::put('update_peminjamanmahasiswa/{id}', [PeminjamanMahasiswaController::class, 'update_peminjamanmahasiswa']);
    Route::delete('peminjaman_mahasiswa/{id}', [PeminjamanMahasiswaController::class, 'destroy']);
    Route::get('show_peminjamanmahasiswa/{id}', [PeminjamanMahasiswaController::class, 'show_peminjamanmahasiswa']);

    //peminjaman alat
    Route::get('peminjaman_alatmahasiswa', [PeminjamanAlatMahasiswaController::class, 'index']);
    Route::get('tambah_alatmahasiswa', [PeminjamanAlatMahasiswaController::class, 'tambah_alatmahasiswa']);
    Route::post('store_alatmahasiswa', [PeminjamanAlatMahasiswaController::class, 'store_alatmahasiswa']);
    Route::put('update_alatmahasiswa/{id}', [PeminjamanAlatMahasiswaController::class, 'update_alatmahasiswa']);
    Route::delete('peminjaman_alatmahasiswa/{id}', [PeminjamanAlatMahasiswaController::class, 'destroy']);
    Route::get('show_alatmahasiswa/{id}', [PeminjamanAlatMahasiswaController::class, 'show_alatmahasiswa']);
    Route::put('selesai/{id}', [PeminjamanAlatMahasiswaController::class, 'kembalikan_alatmahasiswa']);
    Route::get('api/laboratorium/{id_lab}', [PeminjamanAlatResource::class, 'getAlat']);
    
    
    //profile
    Route::get('profile_mahasiswa', [ProfileMahasiswaController::class, 'index']);
    Route::get('edit_profilemahasiswa/{id}', [ProfileMahasiswaController::class, 'edit_profilemahasiswa']);
    Route::put('update_profilemahasiswa/{id}', [ProfileMahasiswaController::class, 'update_profilemahasiswa']);
});


Route::prefix('kalab')->middleware('auth:kalab')->group(function(){
    Route::get('beranda_kalab', [HomeKalabController::class, 'index']);

    Route::get('peminjaman_kalab', [PeminjamanKalabController::class, 'index']);
    Route::post('store_peminjaman_kalab', [PeminjamanKalabController::class, 'store_peminjaman_kalab']);
    Route::get('show_peminjamankalab/{id}', [PeminjamanKalabController::class, 'show_peminjamankalab']);

    Route::get('peminjaman_alatkalab', [AlatKalabController::class, 'index']);
    Route::get('store_alat_kalab', [AlatKalabController::class, 'store_alat_kalab']);
    Route::get('show_alatkalab/{id}', [AlatKalabController::class, 'show_alatkalab']);

    Route::get('keluhan_kalab', [KeluhanKalabController::class, 'index']);
    Route::get('store_keluhan_kalab', [KeluhanKalabController::class, 'store_keluhan_kalab']);
    Route::get('show_keluhankalab/{id}', [KeluhanKalabController::class, 'show_keluhankalab']);

});

    