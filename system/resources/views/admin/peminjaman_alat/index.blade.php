@extends('template.index')
@section('title', 'Alat')
@section('mega')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Peminjaman Alat</h5>
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
                                @foreach ($list_peminjamanalat as $peminjaman_alat)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info"
                                                    href="{{ "show_peminjamanalat/$peminjaman_alat->id_peminjaman_alat" }}">
                                                    <i class="bx bx-info-circle me-1"></i> Lihat
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', [
                                                    'url' => url('admin/peminjaman_alat', $peminjaman_alat->id_peminjaman_alat),
                                                ])
                                            </div>
                                            
                                        </td>
                                        <td>{{ $peminjaman_alat->alat->nama_alat }}</td>
                                        <td>{{ $peminjaman_alat->jumlah_alat }}</td>
                                        <td>
                                            @if ($peminjaman_alat->status == 1)
                                                <span class="badge bg-info">Peminjaman Baru</span>
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
