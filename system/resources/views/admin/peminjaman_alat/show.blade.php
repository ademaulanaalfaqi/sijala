@extends('template.index')
@section('title', 'Info')
@section('mega')
    <div class="row">
        <div class="col-md-8">
            <h6 class="text-muted">Info Data Alat</h6>
            <div class="nav-align-top mb-12">
                <ul class="nav nav-pills mb-6" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home"
                            aria-selected="true">Peminjam</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
                            aria-selected="false">Info</button>
                    </li>
                    @if ($keluhan_pinjam)
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-top-keluhan" aria-controls="navs-pills-top-keluhan"
                                aria-selected="false">Keluhan</button>
                        </li>
                    @endif
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages"
                            aria-selected="false">Detail</button>
                    </li>
                </ul>
                <div class="tab-content">
                    @csrf
                    <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                        <dl class="row mt-2">
                            <dt class="col-sm-3">Nama Peminjam</dt>
                            <dd class="col-sm-9"> : {{ $peminjaman_alat->mahasiswa->nama }}</dd>

                            <dt class="col-sm-3">NIM</dt>
                            <dd class="col-sm-9"> : {{ $peminjaman_alat->mahasiswa->nim }}</dd>

                            <dt class="col-sm-3">Semester</dt>
                            <dd class="col-sm-9"> : {{ $peminjaman_alat->mahasiswa->semester }}</dd>
                        </dl>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                        <dl class="row mt-2">
                            <dt class="col-sm-3">Nama Alat</dt>
                            <dd class="col-sm-9"> : {{ $peminjaman_alat->alat->nama_alat }}</dd>

                            <dt class="col-sm-3">Jumlah Alat</dt>
                            <dd class="col-sm-9"> : {{ $peminjaman_alat->jumlah_alat }}</dd>

                            <dt class="col-sm-3">Deskripsi</dt>
                            <dd class="col-sm-9"> : {{ $peminjaman_alat->alat->deskripsi }}</dd>
                        </dl>
                    </div>
                    @if ($keluhan_pinjam)
                        <div class="tab-pane fade" id="navs-pills-top-keluhan" role="tabpanel">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="image" style="height: 300px">
                                        <a href=""data-bs-toggle="modal" data-bs-target="#Modalfotokeluhan">
                                            <img class="img-thumbnail rounded"
                                                src="{{ url("public/$keluhan_pinjam->foto") }}" style="height: 100%">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <dl class="row mt-2">
                                        <dt class="col-sm-3">Nama Alat</dt>
                                        <dd class="col-sm-9"> : {{ $keluhan_pinjam->nama_alat }}</dd>

                                        <dt class="col-sm-3">Keterangan</dt>
                                        <dd class="col-sm-9"> : {{ $keluhan_pinjam->keterangan }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
                        <p>
                            Detail Alat
                        </p>
                        <p class="mb-0">
                            @foreach ($list_alat as $alat)
                                @if ($peminjaman_alat->id_alat == $alat->id_alat)
                                    <img src="{{ url("public/$alat->foto") }}"
                                        alt=""style="width: 50%; height: 50%;">
                                @endif
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="nav-align-top mb-12" style="margin-top: 71px">
                <div class="tab-content">
                    <h5 class="test-secondary">Verifikasi Peminjaman</h5>
                    <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                        @if ($peminjaman_alat->status == 1)
                            <div class="btn-group">
                                <form
                                    action="{{ url("admin/peminjaman_alat/setuju/$peminjaman_alat->id_peminjaman_alat") }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-outline-success">Setuju</button>
                                </form>
                            </div>
                            <div class="btn-group">
                                <form
                                    action="{{ url("admin/peminjaman_alat/tolak/$peminjaman_alat->id_peminjaman_alat") }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-outline-danger">Ditolak</button>
                                </form>
                            </div>
                        @endif
                        @if ($peminjaman_alat->status == 2)
                            <span class="badge bg-success">Peminjaman Diterima</span>
                        @endif
                        @if ($peminjaman_alat->status == 3)
                            <span class="badge bg-danger">Peminjaman Ditolak</span>
                        @endif
                        @if ($peminjaman_alat->status == 4)
                            <span class="badge bg-dark">Alat Dikembalikan</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal foto keluhan --}}
    @if ($keluhan_pinjam)
        <div class="modal fade" id="Modalfotokeluhan" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Foto Keluhan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ url("public/$keluhan_pinjam->foto") }}" style="height: auto; max-width: 100%;"
                            alt="foto">
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
