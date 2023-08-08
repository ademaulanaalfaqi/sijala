@extends('template.index')
@section('title', 'Info')
@section('mega')
    <div class="row">
        <div class="col-md-8">
            <h6 class="text-muted">Info Data Peminjaman Laboratorium</h6>
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
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages"
                            aria-selected="false">Detail</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                        <dl class="row mt-2">
                            <dt class="col-sm-3">Nama Peminjam</dt>
                            <dd class="col-sm-9"> : {{ $peminjaman->mahasiswa->nama }}</dd>

                            <dt class="col-sm-3">NIM</dt>
                            <dd class="col-sm-9"> : {{ $peminjaman->mahasiswa->nim }}</dd>

                            <dt class="col-sm-3">Semester</dt>
                            <dd class="col-sm-9"> : {{ $peminjaman->mahasiswa->semester }}</dd>
                        </dl>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                        <dl class="row mt-2">
                            <dt class="col-sm-3">Nama Laboratorium</dt>
                            <dd class="col-sm-9"> : {{ $peminjaman->laboratorium->nama_laboratorium }}</dd>

                            <dt class="col-sm-3">Kapasitas Ruangan</dt>
                            <dd class="col-sm-9"> : {{ $peminjaman->laboratorium->kapasitas }}</dd>

                            <dt class="col-sm-3">Tanggal Peminjaman</dt>
                            <dd class="col-sm-9"> : {{ date('d F Y', strtotime($peminjaman->tanggal_peminjaman)) }}</dd>

                            <dt class="col-sm-3">Tanggal Selesai</dt>
                            <dd class="col-sm-9"> : {{ date('d F Y', strtotime($peminjaman->tanggal_selesai)) }}</dd>

                            <dt class="col-sm-3">Waktu Mulai</dt>
                            <dd class="col-sm-9"> : {{ $peminjaman->waktu_mulai }}</dd>

                            <dt class="col-sm-3">Waktu Selesai</dt>
                            <dd class="col-sm-9"> : {{ $peminjaman->waktu_selesai }}</dd>
                        </dl>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
                        <p>
                            Detail peminjaman
                        </p>
                        <p class="mb-0">
                            @foreach ($list_laboratorium as $laboratorium)
                                @if ($peminjaman->id_lab == $laboratorium->id_lab)
                                    <img src="{{ url("public/$laboratorium->foto") }}"
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
                        @if ($peminjaman->status == 1)
                            <div class="btn-group">
                                <form action="{{ url("admin/peminjaman_lab/setuju/$peminjaman->id_peminjaman") }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-outline-success">Setuju</button>
                                </form>
                            </div>
                            <div class="btn-group">
                                <form action="{{ url("admin/peminjaman_lab/tolak/$peminjaman->id_peminjaman") }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-outline-danger">Ditolak</button>
                                </form>
                            </div>
                        @endif
                        @if ($peminjaman->status == 2)
                            <span class="badge bg-success">Peminjaman Diterima</span>
                        @endif
                        @if ($peminjaman->status == 3)
                            <span class="badge bg-danger">Peminjaman Ditolak</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
