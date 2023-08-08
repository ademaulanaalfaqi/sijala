@extends('template.index')
@section('title', 'Info')
@section('mega')
    <div class="col-xl-12">
        <h6 class="text-muted">Info Data Laboratorium</h6>
        <div class="nav-align-top mb-12">
            <ul class="nav nav-pills mb-6" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home"
                        aria-selected="true">Info</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
                        aria-selected="false">Perlengkapan</button>
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
                        <dd class="col-sm-9"> : {{ $laboratorium->nama_laboratorium }}</dd>

                        <dt class="col-sm-3">Lantai</dt>
                        <dd class="col-sm-9"> : {{ $laboratorium->lantai }}</dd>

                        <dt class="col-sm-3">Kode Ruangan</dt>
                        <dd class="col-sm-9"> : {{ $laboratorium->kode_ruangan }}</dd>

                        <dt class="col-sm-3">Nama Gedung</dt>
                        <dd class="col-sm-9"> : {{ $laboratorium->nama_gedung }}</dd>
                    </dl>
                </div>
                <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                    <dl class="row mt-2">
                        <dt class="col-sm-3">Kapasitas Ruangan</dt>
                        <dd class="col-sm-9"> : {{ $laboratorium->kapasitas }}</dd>
                    </dl>
                </div>
                <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
                    <p>
                        Detail Laboratorium
                    </p>
                    <p class="mb-0">
                        <img src="{{ url("public/$laboratorium->foto") }}" alt=""style="width: 50%; height: 50%;">
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
