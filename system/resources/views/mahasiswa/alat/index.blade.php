@extends('template.mahasiswa')
@section('title', 'Alat')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <h5 class="card-header">Data Alat</h5>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Alat</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_alat as $alat)
                                    <tr>
                                        <td>{{$alat->nama_alat}}</td>
                                        <td>{{$alat->jumlah_alat}}</td>
                                    </tr>                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Peminjaman Alat Mahasiswa</h5>
                    <div class="m-3">
                        <a href="{{url('mahasiswa/tambah_alatmahasiswa')}}" class="btn btn-primary">Tambah Data Peminjaman Alat</a>
                        {{-- <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#modalCenter">Tambah Data Peminjaman Alat</button> --}}
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Alat</th>
                                    <th>Jumlah Alat</th>
                                    <th>Status</th>
                                    <th>Kembalikan</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_peminjaman_alatmahasiswa as $peminjaman_alatmahasiswa)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info"
                                                    href="{{ "show_alatmahasiswa/$peminjaman_alatmahasiswa->id_peminjaman_alat" }}">
                                                    <i class="bx bx-info-circle me-1"></i> Lihat
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', [
                                                    'url' => url(
                                                        'mahasiswa/peminjaman_alatmahasiswa',
                                                        $peminjaman_alatmahasiswa->id_peminjaman_alat),
                                                ])
                                            </div>
                                            @if ($peminjaman_alatmahasiswa->status == 4)
                                                <div class="btn-group">
                                                    <a href="" data-bs-toggle="modal" data-bs-target="#modalKeluhan{{$peminjaman_alatmahasiswa->id_peminjaman_alat}}" class="btn btn-outline-warning"><i class="bx bx-chat"></i> Keluhan</a>
                                                </div>                                                
                                            @endif
                                        </td>
                                        <td>{{ $peminjaman_alatmahasiswa->alat->nama_alat }}</td>
                                        <td>{{ $peminjaman_alatmahasiswa->jumlah_alat }}</td>
                                        <td>
                                            @if ($peminjaman_alatmahasiswa->status == 1)
                                                <span class="badge bg-info">Peminjaman Baru</span>
                                            @endif
                                            @if ($peminjaman_alatmahasiswa->status == 2)
                                                <span class="badge bg-success">Peminjaman Diterima</span>
                                            @endif
                                            @if ($peminjaman_alatmahasiswa->status == 3)
                                                <span class="badge bg-danger">Peminjaman Ditolak</span>
                                            @endif
                                            @if ($peminjaman_alatmahasiswa->status == 4)
                                                <span class="badge bg-dark">Alat Dikembalikan</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($peminjaman_alatmahasiswa->status == 2)
                                                <form action="{{ url('mahasiswa/selesai', $peminjaman_alatmahasiswa->id_peminjaman_alat)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="text" name="id_peminjaman" value="{{$peminjaman_alatmahasiswa->id_peminjaman_alat}}" hidden>
                                                    <button class="btn btn-dark" type="submit">Kembalikan</button>
                                                </form>
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


    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">
                        Tambah Data Peminjaman Alat <br>
                        <span class="text-secondary h6">Alat harus dipinjam sehari sebelum hari diperlukan <span class="text-danger">*</span></span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('mahasiswa/store_alatmahasiswa') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id_mahasiswa" value="{{request()->user()->id_mahasiswa}}" hidden>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="inputGroupSelect01">Nama Alat</label>
                                <select name="id_alat[]" class="form-control" id="laboratorium">
                                    <option value="">Pilih Nama Alat</option>
                                    @foreach ($list_alat as $alat)
                                        <option value="{{$alat->id_alat}}">{{$alat->nama_alat}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Jumlah Alat</label>
                                <input type="text" class="form-control" name="jumlah_alat[]" placeholder="....."  required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" name="tanggal_peminjaman[]" placeholder="....."  required/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tanggal_selesai[]" placeholder="....."  required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="inputGroupSelect01">Waktu Mulai</label>
                                <select name="waktu_mulai[]" class="form-select" id="inputGroupSelect01" required>
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
                                <label class="form-label" for="inputGroupSelect01">Waktu Selesai</label>
                                <select name="waktu_selesai[]" class="form-select" id="inputGroupSelect01" required>
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
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi[]" placeholder="....." />
                            </div>
                        </div>
                    </div>

                    <div id="insert-form"></div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-secondary" id="btn-tambah-form" data-bs-dismiss="modal">Tambah Data</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                <input type="hidden" id="jumlah-form" value="1">
            </div>
        </div>
    </div>

    {{-- modal keluhan --}}
    @foreach ($list_peminjaman_alatmahasiswa as $peminjaman_alatmahasiswa)
        <div class="modal fade" id="modalKeluhan{{$peminjaman_alatmahasiswa->id_peminjaman_alat}}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">
                            Keluhan Alat yang Dipinjam
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('mahasiswa/store_keluhan_pinjam') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id_peminjaman_alat" value="{{$peminjaman_alatmahasiswa->id_peminjaman_alat}}" hidden>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="inputGroupSelect01">Nama Alat</label>
                                    <input type="text" class="form-control" name="nama_alat" value="{{$peminjaman_alatmahasiswa->alat->nama_alat}}" readonly required/>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Foto Bukti</label>
                                    <input type="file" class="form-control" name="foto" accept=".jpg, .jpeg, .png" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" placeholder="....." required/>
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
    @endforeach

@endsection
