@extends('template.index')
@section('title', 'Info')
@section('mega')
    <div class="row">
        <div class="col-md-8">
            <h6 class="text-muted">Info Data Keluhan Mahasiswa</h6>
            <div class="nav-align-top mb-12">
                <ul class="nav nav-pills mb-6" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home"
                            aria-selected="true">Info</button>
                    </li>
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
                            <dt class="col-sm-3">Nama Laboratorium</dt>
                            <dd class="col-sm-9"> : {{ $keluhan->laboratorium->nama_laboratorium }}</dd>

                            <dt class="col-sm-3">Nama Alat</dt>
                            <dd class="col-sm-9"> : {{ $keluhan->nama_alat }}</dd>

                            <dt class="col-sm-3">Nomor Meja</dt>
                            <dd class="col-sm-9"> : {{ $keluhan->nomor_meja }}</dd>

                            <dt class="col-sm-3">Tanggal Pengajuan</dt>
                            <dd class="col-sm-9"> : {{ date('d F Y', strtotime($keluhan->tanggal_pengajuan)) }}</dd>

                            <dt class="col-sm-3">Keterangan</dt>
                            <dd class="col-sm-9"> : {{ $keluhan->deskripsi }}</dd>
                        </dl>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
                        <p>
                            Detail Foto Alat
                        </p>
                        <p class="mb-0">
                            <a href=""data-bs-toggle="modal" data-bs-target="#Modalfotokeluhan">
                                <img class="img-thumbnail rounded" src="{{ url("public/$keluhan->foto") }}"
                                    style="height: 100%">
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="nav-align-top mb-12" style="margin-top: 71px">
                <div class="tab-content">
                    <h5 class="test-secondary">Verifikasi Keluhan</h5>
                    <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                        @if ($keluhan->status == 1)
                            <div class="btn-group">
                                <form action="{{ url("admin/proses/$keluhan->id_keluhan") }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-outline-warning">Proses</button>
                                </form>
                            </div>
                        @endif
                        @if ($keluhan->status == 2)
                            <div class="btn-group">
                                <form action="{{ url("admin/selesai/$keluhan->id_keluhan") }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-outline-success">Selesai</button>
                                </form>
                            </div>
                        @endif
                        @if ($keluhan->status == 3)
                            <span class="badge bg-success">Pengajuan Selesai</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal foto keluhan --}}
    <div class="modal fade" id="Modalfotokeluhan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Foto Keluhan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ url("public/$keluhan->foto") }}" style="height: auto; max-width: 100%;" alt="foto">
                </div>
            </div>
        </div>
    </div>
@endsection
