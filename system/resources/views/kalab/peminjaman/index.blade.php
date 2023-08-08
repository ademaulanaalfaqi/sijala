@extends('template.kalab')
@section('kalab')
@section('title', 'peminjaman lab')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Peminjaman Laboratorium Mahasiswa</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Laboratorium</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_peminjamankalab as $peminjaman_kalab)
                                    @if ($peminjaman_kalab->status == 2 || $peminjaman_kalab->status == 3)
                                        <tr class="table-default">
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-outline-info"
                                                        href="{{ "show_peminjamankalab/$peminjaman_kalab->id_peminjaman" }}">
                                                        <i class="bx bx-info-circle me-1"></i> Lihat
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{ $peminjaman_kalab->laboratorium->nama_laboratorium }}</td>
                                            <td>
                                                @if ($peminjaman_kalab->status == 1)
                                                    <span class="badge bg-info">Peminjaman Baru</span>
                                                @endif
                                                @if ($peminjaman_kalab->status == 2)
                                                    <span class="badge bg-success">Peminjaman Diterima</span>
                                                @endif
                                                @if ($peminjaman_kalab->status == 3)
                                                    <span class="badge bg-danger">Peminjaman Ditolak</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection