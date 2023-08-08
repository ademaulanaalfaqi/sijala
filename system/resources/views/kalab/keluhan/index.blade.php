@extends('template.kalab')
@section('kalab')
@section('title', 'keluhan')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Keluhan Kalab</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Laboratorium</th>
                                    <th>Nama Alat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_keluhan_kalab as $keluhan_kalab)
                                    @if ($keluhan_kalab->status == 2 || $keluhan_kalab->status == 3)
                                        <tr class="table-default">
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-outline-info"
                                                        href="{{ "show_keluhankalab/$keluhan_kalab->id_keluhan" }}">
                                                        <i class="bx bx-info-circle me-1"></i> Lihat
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{ $keluhan_kalab->laboratorium->nama_laboratorium }}</td>
                                            <td>
                                                <strong>{{ $keluhan_kalab->nama_alat }}</strong>
                                            </td>
                                            <td>
                                                @if ($keluhan_kalab->status == 1)
                                                    <span class="badge bg-info">Pengajuan Baru</span>
                                                @endif
                                                @if ($keluhan_kalab->status == 2)
                                                    <span class="badge bg-warning">Pengajuan Diproses</span>
                                                @endif
                                                @if ($keluhan_kalab->status == 3)
                                                    <span class="badge bg-success">Pengajuan Selesai</span>
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