@extends('template.mahasiswa')
@section('title', 'Peminjaman')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <h5 class="card-header">Peminjaman Laboratorium</h5>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Laboratorium</th>
                                    <th>Kapasitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_laboratorium as $laboratorium)
                                    <tr>
                                        <td>{{$laboratorium->nama_laboratorium}}</td>
                                        <td>{{$laboratorium->kapasitas}}</td>
                                    </tr>                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Data Peminjaman Laboratorium </h5>
                    <div class="m-3">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#modalCenter">Tambah Data Peminjaman Laboratorium
                        </button>
                    </div>
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
                                @foreach ($list_peminjamanmahasiswa as $peminjaman_mahasiswa)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info"
                                                    href="{{ "show_peminjamanmahasiswa/$peminjaman_mahasiswa->id_peminjaman" }}">
                                                    <i class="bx bx-info-circle me-1"></i> Lihat
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', ['url' => url('mahasiswa/peminjaman_mahasiswa', $peminjaman_mahasiswa->id_peminjaman)])
                                            </div>
                                        </td>
                                        <td>{{ $peminjaman_mahasiswa->laboratorium->nama_laboratorium }}</td>
                                        <td>
                                            @if ($peminjaman_mahasiswa->status == 1)
                                                <span class="badge bg-info">Peminjaman Baru</span>
                                            @endif
                                            @if ($peminjaman_mahasiswa->status == 2)
                                                <span class="badge bg-success">Peminjaman Diterima</span>
                                            @endif
                                            @if ($peminjaman_mahasiswa->status == 3)
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
    <div class="col-lg-4 col-md-6">
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Data Peminjaman Laboratorium</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('mahasiswa/store_peminjamanmahasiswa') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGroupSelect01">Nama Laboratorium</label>
                                        <select name="id_lab" class="form-control" id="inputGroupSelect01" required>
                                            <option value="">Pilih Nama Laboratorium</option>
                                            @foreach ($list_laboratorium as $laboratorium)
                                            <option value="{{ $laboratorium->id_lab }}">
                                                {{ $laboratorium->nama_laboratorium }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="dobWithTitle" class="form-label">Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" name="tanggal_peminjaman" placeholder="....." required/>
                                </div>
                                <div class="col-md-6">
                                    <label for="dobWithTitle" class="form-label">Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai" placeholder="....." required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="inputGroupSelect01">Waktu Mulai</label>
                                    <select name="waktu_mulai" class="form-select" id="inputGroupSelect01" required>
                                        <option value="">Options...</option>
                                        <option value="07.00">07.00</option>
                                        <option value="08.00">08.00</option>
                                        <option value="09.00">09.00</option>
                                        <option value="10.00">10.00</option>
                                        <option value="11.00">11.00</option>
                                        <option value="12.00">12.00</option>
                                        <option value="13.00">13.00</option>
                                        <option value="14.00">14.00</option>
                                        <option value="15.00">15.00</option>
                                        <option value="16.00">16.00</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="inputGroupSelect01">Waktu Selesai</label>
                                    <select name="waktu_selesai" class="form-select" id="inputGroupSelect01" required>
                                        <option value="">Options...</option>
                                        <option value="07.59">07.59</option>
                                        <option value="08.59">08.59</option>
                                        <option value="09.59">09.59</option>
                                        <option value="10.59">10.59</option>
                                        <option value="11.59">11.59</option>
                                        <option value="12.59">12.59</option>
                                        <option value="13.59">13.59</option>
                                        <option value="14.59">14.59</option>
                                        <option value="15.59">15.59</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
