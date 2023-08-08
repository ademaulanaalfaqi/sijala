@extends('template.index')
@section('title', 'Edit')
@section('mega')
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data Laboratorium</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/update_laboratorium', $laboratorium->id_lab) }}" method="post" actype="multipart/form_data">
                @csrf
                @method('PUT')                
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Laboratorium</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-buildings"></i></span>                            
                            <select name="nama_laboratorium" type="text" value="{{ $laboratorium->nama_laboratorium }}" class="form-select" id="inputGroupSelect01">
                                <option selected>Options...</option>
                                <option value="1">Multimedia</option>
                                <option value="2">Pbl</option>
                                <option value="3">Programming</option>
                                <option value="4">Rpl</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Lantai</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-buildings"></i></span>                            
                            <select name="lantai" type="text" value="{{ $laboratorium->lantai }}" class="form-select" id="inputGroupSelect01">
                                <option selected>Options...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Kode Ruangan </label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">\
                            <span id="basic-icon-default-phone2" class="input-group-text" ><i class='bx bx-door-open'></i></i ></span>
                            <input type="text" name="kode_ruangan" value={{ $laboratorium->kode_ruangan }} id="basic-icon-default-phone" class="form-control phone-mask" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Nama Gedung</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" name="nama_gedung" value="{{ $laboratorium->nama_gedung }}" id="basic-icon-default-company" class="form-control" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kapasitas</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" name="kapasitas" value="{{ $laboratorium->kapasitas }}" id="basic-icon-default-company" class="form-control" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Foto</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class='bx bx-photo-album'></i></span>
                            <input type="file" name="foto" value="{{ $laboratorium->foto }}" accept=".jpg, .jpeg, .png" id="basic-icon-default-company" class="form-control" aria-describedby="basic-icon-default-company2" />
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