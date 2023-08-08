@extends('template.index')
@section('title', 'User')
@section('mega')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data User Kalab</h5>
                    <div class="m-3">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#modalCenter">Tambah Data User Kalab</button>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama</th>
                                    <th>Nip</th>
                                    <th>Username</th>
                                    <th>No. Handphone</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_kalab as $kalab)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-toolbar">
                                                <div class="btn-group ">
                                                    <a href="{{ url('admin/edit_kalab', $kalab->id_kalab) }}" style="margin-right: 5px" class="btn btn-outline-warning "><i class="bx bx-edit me-1"></i> Edit</a>
                                                    <a href="{{ url('admin/show_kalab', $kalab->id_kalab) }}" style="margin-right: 5px" class="btn btn-outline-info "><i class="bx bx-info-circle me-1"></i> Lihat</a>
                                                    @include('admin.utils.delete', ['url' => url('admin/kalab', $kalab->id_kalab)])
                                                </div>
                                            </div>
                                        </td>
                                        <td><strong>{{ $kalab->nama }}</strong></td>
                                        <td>{{ $kalab->nip }}</td>
                                        <td>{{ $kalab->username }}</td>
                                        <td>{{ $kalab->no_hp }}</td>
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
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Data User Kalab</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/store_kalab') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col mb-6">
                                    <label for="nameWithTitle" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama"
                                        placeholder="Enter Name" required />
                                </div>
                                <div class="col md-6">
                                    <label for="nameWithTitle" class="form-label">Nip</label>
                                    <input type="text" class="form-control" name="nip"
                                        placeholder="Enter Name" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-6">
                                    <label for="nameWithTitle" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username"
                                        placeholder="Enter Name" required />
                                </div>
                                <div class="col mb-6">
                                    <label for="nameWithTitle" class="form-label">Pasword</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter Name" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-6">
                                    <label for="nameWithTitle" class="form-label">No. Handphone</label>
                                    <input type="text" class="form-control" name="no_hp"
                                        placeholder="Enter Name" required />
                                </div>
                                <div class="col mb-6">
                                    <label for="nameWithTitle" class="form-label">Foto</label>
                                    <input type="file" class="form-control" name="foto"
                                        placeholder="" accept=".jpg, .png, .jpeg" required />
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
    </div>
@endsection
