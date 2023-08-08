@extends('template.mahasiswa')
@section('title', 'Edit')
@section('content')
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data Keluhan</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('mahasiswa/update_keluhanmahasiswa', $keluhan_mahasiswa->id_keluhan) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                <div class="row mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Nama Laboratorium </label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="" class="input-group-text" ><i class='bx bx-door-open'></i></i ></span>
                            <select name="id_lab" class="form-control" id="inputGroupSelect01">
                                <option value="{{$keluhan_mahasiswa->laboratorium->id_lab}}" selected>{{$keluhan_mahasiswa->laboratorium->nama_laboratorium}}</option>
                                @foreach ($list_laboratorium as $laboratorium)
                                    <option value="{{ $laboratorium->id_lab }}">
                                        {{ $laboratorium->nama_laboratorium }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Nama Alat </label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text" ><i class='bx bx-door-open'></i></i ></span>
                            <input type="text" name="nama_alat" value={{ $keluhan_mahasiswa->nama_alat }} id="basic-icon-default-phone" class="form-control phone-mask" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Tanggal Pengajuan</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" name="tanggal_pengajuan" value="{{ $keluhan_mahasiswa->tanggal_pengajuan }}" id="basic-icon-default-company" class="form-control" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Deskripsi</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" name="deskripsi" value="{{ $keluhan_mahasiswa->deskripsi }}" id="basic-icon-default-company" class="form-control" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Foto</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class='bx bx-photo-album'></i></span>
                            <input type="file" name="foto" accept=".jpg, .jpeg, .png" id="basic-icon-default-company" class="form-control" aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection