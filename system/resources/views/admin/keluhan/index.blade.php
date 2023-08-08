@extends('template.index')
@section('title', 'Keluhan')
@section('mega')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Alat Keluhan Mahasiswa</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Alat</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>                                    
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_keluhanmahasiswa as $keluhan)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info"
                                                    href="{{ "showkeluhan/$keluhan->id_keluhan" }}">
                                                    <i class="bx bx-info-circle me-1"></i> Lihat
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', [
                                                    'url' => url('admin/keluhan', $keluhan->id_keluhan),
                                                ])
                                            </div>
                                            
                                        </td>
                                        <td>
                                            <strong>{{ $keluhan->nama_alat }}</strong>
                                        </td>
                                        <td>{{ date('d F Y', strtotime($keluhan->tanggal_pengajuan))}}</td>
                                        <td>{{ $keluhan->deskripsi }}</td>
                                        <td>
                                            @if ($keluhan->status == 1)
                                                <span class="badge bg-info">Pengajuan Baru</span>
                                            @endif
                                            @if ($keluhan->status == 2)
                                                <span class="badge bg-warning">Pengajuan Diproses</span>
                                            @endif
                                            @if ($keluhan->status == 3)
                                                <span class="badge bg-success">Pengajuan Selesai</span>
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
