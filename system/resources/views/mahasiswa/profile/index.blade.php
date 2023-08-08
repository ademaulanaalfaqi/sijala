@extends('template.mahasiswa')
@section('title', 'Profile')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ url('public', auth()->user()->foto) }}" alt="" style=" width: 50%; height: 50%;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Profil Mahasiswa</h5>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#largeModal{{ $mahasiswa->id }}">
                                    <i class="bx bxs-edit me-1"></i>Edit
                                </button>
                            </div>
                        </div>
                        <div class="demo-inline-spacing mt-3">
                            <ul class="list-group list-group-numbered">
                                <li class="list-group-item">
                                    <strong>Nama</strong>
                                    <p class="float-end">{{ request()->user()->nama }}</p>
                                </li>
                                <li class="list-group-item">
                                    <strong>Username</strong>
                                    <p class="float-end">{{ request()->user()->username }}</p>
                                </li>
                                <li class="list-group-item">
                                    <strong>Nim</strong>
                                    <p class="float-end">{{ request()->user()->nim }}</p>
                                </li>
                                <li class="list-group-item">
                                    <strong>No Handphone</strong>
                                    <p class="float-end">{{ request()->user()->no_hp }}</p>
                                </li>
                                <li class="list-group-item">
                                    <strong>Semester</strong>
                                    <p class="float-end">{{ request()->user()->semester }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($list_mahasiswa as $mahasiswa)
        <div class="modal fade" id="largeModal{{ $mahasiswa->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Edit Profil Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('mahasiswa/update_profilemahasiswa', $mahasiswa->id_mahasiswa) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameLarge" class="form-label">Nama</label>
                                    <input type="text" id="nameLarge" class="form-control" name="nama" value="{{ $mahasiswa->nama }}" />
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="emailLarge" class="form-label">Nomor Telepon</label>
                                    <input type="text" id="emailLarge" class="form-control" name="no_hp" value="{{ $mahasiswa->no_hp }}" />
                                </div>
                                <div class="col mb-0">
                                    <label for="dobLarge" class="form-label">Foto</label>
                                    <input type="file" id="dobLarge" class="form-control" name="foto" accept=".jpg, .jpeg, .png"/>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="emailLarge" class="form-label">Username</label>
                                    <input type="text" id="emailLarge" class="form-control" name="username" value="{{ $mahasiswa->username }}" />
                                </div>
                                <div class="col mb-0">
                                    <label for="dobLarge" class="form-label">Password</label>
                                    <input type="password" id="dobLarge" class="form-control" name="password" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    @endforeach
@endsection
