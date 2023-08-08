@extends('template.kalab')
@section('title', 'Beranda')
@section('kalab')
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary">Selamat Datang Di Sistem Informasi Peminjaman
                        Laboratorium</h5>
                    <p class="mb-4">
                        Politeknik Negeri Ketapang <span class="fw-bold"></span>
                    </p>
                </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                    <img src="{{ url('public/admin') }}/assets/img/illustrations/man-with-laptop-light.png" height="140"
                        alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                        data-app-light-img="illustrations/man-with-laptop-light.png">
                </div>
            </div>
        </div>
    </div>
@endsection
