@extends('template.mahasiswa')
@section('title', 'Edit')
@section('content')
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data Peminjaman</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('mahasiswa/update_peminjamanmahasiswa', $peminjaman_mahasiswa->id_peminjaman) }}" method="post" actype="multipart/form_data">
                @csrf
                @method('PUT')  
                <div class="row mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Nama Ruangan</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text" ><i class='bx bx-door-open'></i></i ></span>
                            <select name="id_lab" class="form-control" id="inputGroupSelect01">
                                <option value="{{$peminjaman_mahasiswa->id_lab}}" selected>{{$peminjaman_mahasiswa->laboratorium->nama_laboratorium}}</option>
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
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Tanggal Peminjaman</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="date" name="tanggal_peminjaman" value="{{ $peminjaman_mahasiswa->tanggal_peminjaman }}" id="basic-icon-default-company" class="form-control" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Tanggal Selesai</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="date" name="tanggal_selesai" value="{{ $peminjaman_mahasiswa->tanggal_selesai }}" id="basic-icon-default-company" class="form-control" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Waktu Mulai</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <select name="waktu_mulai" class="form-select" id="inputGroupSelect01">
                                <option value="{{$peminjaman_mahasiswa->waktu_mulai}}" selected>{{$peminjaman_mahasiswa->waktu_mulai}}</option>
                                <option value="07.00">07.00</option>
                                <option value="08.00">08.00</option>
                                <option value="09.00">09.00</option>
                                <option value="10.00">10.00</option>
                                <option value="11.00">11.00</option>
                                <option value="12.00">12.00</option>
                                <option value="13.00">13.00</option>
                                <option value="14.00">14.00</option>
                                <option value="15.00">15.00</option>
                                <option value="16.00">16.00</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Waktu Selesai</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <select name="waktu_selesai" class="form-select" id="inputGroupSelect01">
                                <option value="{{$peminjaman_mahasiswa->waktu_selesai}}" selected>{{$peminjaman_mahasiswa->waktu_selesai}}</option>                                
                                <option value="07.59">07.59</option>
                                <option value="08.59">08.59</option>
                                <option value="09.59">09.59</option>
                                <option value="10.59">10.59</option>
                                <option value="11.59">11.59</option>
                                <option value="12.59">12.59</option>
                                <option value="13.59">13.59</option>
                                <option value="14.59">14.59</option>
                                <option value="15.59">15.59</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Foto</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class='bx bx-photo-album'></i></span>
                            <input type="file" name="foto" value="{{ $peminjaman_mahasiswa->foto }}" accept=".jpg, .jpeg, .png" id="basic-icon-default-company" class="form-control" aria-describedby="basic-icon-default-company2" />
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