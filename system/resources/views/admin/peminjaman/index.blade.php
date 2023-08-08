@extends('template.index')
@section('title', 'Peminjaman')
@section('mega')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Peminjaman Laboratorium</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Nama Laboratorium</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_peminjaman as $peminjaman)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info"
                                                    href="{{ "showpeminjaman/$peminjaman->id_peminjaman" }}">
                                                    <i class="bx bx-info-circle me-1"></i> Lihat
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', [
                                                    'url' => url('admin/peminjaman_lab', $peminjaman->id_peminjaman),
                                                ])
                                            </div>
                                            
                                        </td>
                                        <td>{{ $peminjaman->mahasiswa->nama }}</td>
                                        <td>
                                            <strong>{{ $peminjaman->laboratorium->nama_laboratorium }}</strong>
                                        </td>
                                        <td>{{ date('d F Y', strtotime($peminjaman->tanggal_peminjaman)) }}</td>
                                        <td>{{ date('d F Y', strtotime($peminjaman->tanggal_selesai)) }}</td>
                                        <td>
                                            @if ($peminjaman->status == 1)
                                                <span class="badge bg-info">Peminjaman Baru</span>
                                            @endif
                                            @if ($peminjaman->status == 2)
                                                <span class="badge bg-success">Peminjaman Diterima</span>
                                            @endif
                                            @if ($peminjaman->status == 3)
                                                <span class="badge bg-danger">Peminjaman Ditolak</span>
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