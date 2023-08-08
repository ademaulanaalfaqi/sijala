@extends('template.mahasiswa')
@section('title', 'Beranda')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang Di Sistem Informasi Peminjaman
                                Laboratorium 🎉</h5>
                            <p class="mb-4">
                                Politeknik Negeri Ketapang <span class="fw-bold"></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ url('public/admin') }}/assets/img/illustrations/man-with-laptop-light.png"
                                height="140" alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="card-title text-primary mt-2">Jadwal Peminjaman Laboratorium</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="accordionOne" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="color-info" style="display: flex;">
                                                <div class="info1"
                                                    style="display: flex; align-items: center; margin-right: 20px;">
                                                    <div class="color-sample bg-danger m-2"
                                                        style="height: 10px; width: 10px;"></div>
                                                    <small class="text-light fw-semibold"> Ada Peminjaman</small>
                                                </div>
                                                <div class="info2" style="display: flex; align-items: center;">
                                                    <div class="color-sample bg-success m-2"
                                                        style="height: 10px; width: 10px;"></div>
                                                    <small class="text-light fw-semibold"> Tidak Ada Peminjaman</small>
                                                    <br><br>
                                                </div>
                                            </div>

                                            <div class="demo-inline-spacing">
                                                @foreach ($daftarTanggal as $item)
                                                    <div class="btn-group">
                                                        <form action="{{ url('mahasiswa/beranda_mahasiswa') }}"
                                                            method="get">
                                                            <input type="hidden" name="tanggal"
                                                                value="{{ $item['tanggal'] }}">
                                                            @if ($peminjaman->contains('tanggal_peminjaman', $item['tanggal']))
                                                                @if ($peminjaman->where('tanggal_peminjaman', $item['tanggal'])->first()->status == 2)
                                                                    <button type="submit" class="btn btn-danger m-1">{{ date('d F Y', strtotime($item['tanggal'])) }}</button>
                                                                @else
                                                                    <button type="submit" class="btn btn-success m-1">{{ date('d F Y', strtotime($item['tanggal'])) }}</button>
                                                                @endif
                                                            @else
                                                                <button type="submit" class="btn btn-success m-1">{{ date('d F Y', strtotime($item['tanggal'])) }}</button>
                                                            @endif
                                                        </form>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @foreach ($list_peminjaman as $peminjaman)
                                        @if ($peminjaman->status == 2)
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <h4 class="mb-1">{{ $peminjaman->laboratorium->nama_laboratorium }}
                                                    </h4>
                                                    <p class="m-0">
                                                        {{ $peminjaman->mahasiswa->nama }} <br>
                                                        {{ date('d F Y', strtotime($peminjaman->tanggal_peminjaman)) }} <br>
                                                        Dari jam {{ $peminjaman->waktu_mulai }} sampai
                                                        {{ $peminjaman->waktu_selesai }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- kalender --}}
                <div class="col-md-3">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title text-primary mt-2">Kalender</h5>
                            <hr>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const calendar = new VanillaCalendar('#calendar');
            calendar.init();
        });
    </script>
@endsection
