@extends('template.kalab')
@section('kalab')
@section('title', 'alat')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Peminjaman Alat Mahasiswa</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Alat</th>
                                    <th>Jumlah Alat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_alatkalab as $peminjaman_alatkalab)
                                    @if ($peminjaman_alatkalab->status == 2 || $peminjaman_alatkalab->status == 3)
                                        <tr class="table-default">
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-outline-info"
                                                        href="{{ "show_alatkalab/$peminjaman_alatkalab->id_peminjaman_alat" }}">
                                                        <i class="bx bx-info-circle me-1"></i> Lihat
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{ $peminjaman_alatkalab->alat->nama_alat }}</td>
                                            <td>{{ $peminjaman_alatkalab->jumlah_alat }}</td>
                                            <td>
                                                @if ($peminjaman_alatkalab->status == 1)
                                                    <span class="badge bg-info">Pengajuan Baru</span>
                                                @endif
                                                @if ($peminjaman_alatkalab->status == 2)
                                                    <span class="badge bg-warning">Pengajuan Diproses</span>
                                                @endif
                                                @if ($peminjaman_alatkalab->status == 3)
                                                    <span class="badge bg-success">Pengajuan Selesai</span>
                                                @endif
                                                @if ($peminjaman_alatkalab->status == 4)
                                                    <span class="badge bg-dark">Alat DIkembalikan</span>
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