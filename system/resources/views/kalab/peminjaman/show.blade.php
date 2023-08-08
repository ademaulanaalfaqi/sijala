@extends('template.kalab')
@section('kalab')
    <div class="col-xl-12">
    <h6 class="text-muted">Info Data Peminjaman Mahasiswa</h6>
    <div class="nav-align-top mb-12">
        <ul class="nav nav-pills mb-6" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="true">Peminjam</button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">Info</button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="false">Detail</button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-pills-top-profile" role="tabpanel">
                <dl class="row mt-2">
                    <dt class="col-sm-3">Nama Peminjam</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_kalab->mahasiswa->nama }}</dd>
                    
                    <dt class="col-sm-3">NIM</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_kalab->mahasiswa->nim }}</dd>
                    
                    <dt class="col-sm-3">Semester</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_kalab->mahasiswa->semester }}</dd>
                </dl>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-home" role="tabpanel">
                <dl class="row mt-2">
                    <dt class="col-sm-3">Nama Laboratorium</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_kalab->laboratorium->nama_laboratorium }}</dd>

                    <dt class="col-sm-3">Tanggal Peminjaman</dt>
                    <dd class="col-sm-9"> : {{ date('d F Y', strtotime($peminjaman_kalab->tanggal_peminjaman)) }}</dd>

                    <dt class="col-sm-3">Tanggal Selesai</dt>
                    <dd class="col-sm-9"> : {{ date('d F Y', strtotime($peminjaman_kalab->tanggal_selesai)) }}</dd>

                    <dt class="col-sm-3">Waktu Mulai</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_kalab->waktu_mulai }}</dd>

                    <dt class="col-sm-3">Waktu Selesai</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_kalab->waktu_selesai }}</dd>
                </dl>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
                <p>
                    Detail Foto Laboratorium
                </p>
                <p class="mb-0">
                    @foreach ($list_laboratorium as $laboratorium)
                        @if ($peminjaman_kalab->id_lab == $laboratorium->id_lab)
                            <img src="{{ url("public/$laboratorium->foto") }}" alt=""style="width: 50%; height: 50%;">
                        @endif
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</div>
@endsection