@extends('template.index')
@section('title', 'User')
@section('mega')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data User Mahasiswa</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nim</th>
                                    <th>Username</th>
                                    <th>No. Handphone</th>
                                    <th>Semester</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_mahasiswa as $mahasiswa)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info" href="{{"showmahasiswa/$mahasiswa->id_mahasiswa"}}">
                                                    <i class="bx bx-info-circle me-1"></i>  Info
                                                </a> 
                                            </div>
                                            <div class="btn-group">
                                                 @include('admin.utils.delete', ['url' => url('admin/mahasiswa', $mahasiswa->id_mahasiswa)])
                                            </div>
                                            @if ($mahasiswa->status == 1)
                                                <div class="btn-group">
                                                    <form action="{{url("admin/mahasiswa/setuju/$mahasiswa->id_mahasiswa")}}" method="post">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="btn btn-outline-success">Setuju</button>
                                                    </form>
                                                </div>
                                                <div class="btn-group">
                                                    <form action="{{url("admin/mahasiswa/tolak/$mahasiswa->id_mahasiswa")}}" method="post">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="btn btn-outline-danger">Tolak</button>
                                                    </form>
                                                </div>                                                
                                            @endif
                                        </td>
                                        <td>{{ $mahasiswa->nim }}</td>
                                        <td>{{ $mahasiswa->username }}</td>
                                        <td>{{ $mahasiswa->no_hp }}</td>
                                        <td>{{ $mahasiswa->semester }}</td>
                                        <td>
                                            @if ($mahasiswa->status == 1)
                                                <span class="badge bg-info">Pendaftaran Baru</span>
                                            @endif
                                            @if ($mahasiswa->status == 2)
                                                <span class="badge bg-success">Pendaftaran Diterima</span>
                                            @endif
                                            @if ($mahasiswa->status == 3)
                                                <span class="badge bg-danger">Pendaftaran Ditolak</span>
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
