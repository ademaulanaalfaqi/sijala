@extends('template.index')
@section('title', 'User')
@section('mega')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data User Admin</h5>
                    <div class="m-3">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#modalCenter">Tambah Data User Admin</button>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_admin as $admin)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-toolbar">
                                                <div class="btn-group ">
                                                    <a href="{{ url('admin/editadmin', $admin->id_admin) }}" style="margin-right: 5px" class="btn btn-outline-warning "><i class="bx bx-edit me-1"></i> Edit</a>
                                                    @include('admin.utils.delete', ['url' => url('admin/admin', $admin->id_admin)])
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $admin->nama }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->username }}</td>
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
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Data User Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/storeadmin') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Enter Name"
                                        required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Name"
                                        required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Enter Name"
                                        required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter Name"
                                        required />
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
