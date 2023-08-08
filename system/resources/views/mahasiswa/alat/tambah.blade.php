@extends('template.mahasiswa')
@section('title', 'Tambah')
@section('content')
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
                                    <td>{{ $alat->nama_alat }}</td>
                                    <td>{{ $alat->jumlah_alat }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">
                        Tambah Data Peminjaman Alat <br>
                        <span class="text-secondary h6">Alat harus dipinjam sehari sebelum hari diperlukan <span class="text-danger">*</span></span>
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('mahasiswa/store_alatmahasiswa') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="text" name="id_mahasiswa" value="{{ request()->user()->id_mahasiswa }}" hidden>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="inputGroupSelect01">Nama Alat</label>
                                    <select name="id_alat[]" class="form-control" id="laboratorium">
                                        <option value="">Pilih Nama Alat</option>
                                        @foreach ($list_alat as $alat)
                                            <option value="{{ $alat->id_alat }}">{{ $alat->nama_alat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jumlah Alat</label>
                                    <input type="text" class="form-control" name="jumlah_alat[]" placeholder="....."
                                        required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" name="tanggal_peminjaman[]"
                                        placeholder="....." required />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai[]" placeholder="....."
                                        required />
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
                            </div> <br>

                            <div id="insert-form"></div>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="btn-reset-form">Reset Form</button>
                            <button type="button" class="btn btn-secondary" id="btn-tambah-form"
                                data-bs-dismiss="modal">Tambah
                                Data</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    <input type="hidden" id="jumlah-form" value="1">
                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function() { // Ketika halaman sudah diload dan siap
            jQuery("#btn-tambah-form").click(function() { // Ketika tombol Tambah Data Form di klik
                var jumlah = parseInt(jQuery("#jumlah-form")
                    .val()); // Ambil jumlah data form pada textbox jumlah-form
                var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

                // Kita akan menambahkan form dengan menggunakan append
                // pada sebuah tag div yg kita beri id insert-form
                jQuery("#insert-form").append("<hr>" + "<b>Data ke " + nextform + " :</b>" + "<br>" +
                    "<input type='text' name='id_mahasiswa[]' value='{{ request()->user()->id_mahasiswa }}' hidden>" +
                    "<div class='row'>" +
                    "<div class='col-md-6'>" +
                    "<label class='form-label' for='inputGroupSelect01'>Nama Alat</label>" +
                    "<select name='id_alat[]' class='form-control' id='laboratorium'>" +
                    "<option value=''>Pilih Nama Alat</option>" +
                    "@foreach ($list_alat as $alat)" +
                    "<option value='{{ $alat->id_alat }}'>{{ $alat->nama_alat }}</option>" +
                    "@endforeach" +
                    "</select>" +
                    "</div>" +
                    "<div class='col-md-6'>" +
                    "<label class='form-label'>Jumlah Alat</label>" +
                    "<input type='text' class='form-control' name='jumlah_alat[]' placeholder='.....' required />" +
                    "</div>" +
                    "</div>" +
                    "<div class='row'>" +
                    "<div class='col-md-6'>" +
                    "<label class='form-label'>Tanggal Peminjaman</label>" +
                    "<input type='date' class='form-control' name='tanggal_peminjaman[]' placeholder='.....' required />" +
                    "</div>" +
                    "<div class='col-md-6'>" +
                    "<label class='form-label'>Tanggal Selesai</label>" +
                    "<input type='date' class='form-control' name='tanggal_selesai[]' placeholder='.....' required />" +
                    "</div>" +
                    "</div>" +
                    "<div class='row'>" +
                    "<div class='col-md-6'>" +
                    "<label class='form-label' for='inputGroupSelect01'>Waktu Mulai</label>" +
                    "<select name='waktu_mulai[]' class='form-select' id='inputGroupSelect01' required>" +
                    "<option value=''>Options...</option>" +
                    "<option value='07.00'>07.00</option>" +
                    "<option value='08.00'>08.00</option>" +
                    "<option value='09.00'>09.00</option>" +
                    "<option value='10.00'>10.00</option>" +
                    "<option value='11.00'>11.00</option>" +
                    "<option value='12.00'>12.00</option>" +
                    "<option value='13.00'>13.00</option>" +
                    "<option value='14.00'>14.00</option>" +
                    "<option value='15.00'>15.00</option>" +
                    "<option value='16.00'>16.00</option>" +
                    "</select>" +
                    "</div>" +
                    "<div class='col-md-6'>" +
                    "<label class='form-label' for='inputGroupSelect01'>Waktu Selesai</label>" +
                    "<select name='waktu_selesai[]' class='form-select' id='inputGroupSelect01' required>" +
                    "<option value=''>Options...</option>" +
                    "<option value='07.59'>07.59</option>" +
                    "<option value='08.59'>08.59</option>" +
                    "<option value='09.59'>09.59</option>" +
                    "<option value='10.59'>10.59</option>" +
                    "<option value='11.59'>11.59</option>" +
                    "<option value='12.59'>12.59</option>" +
                    "<option value='13.59'>13.59</option>" +
                    "<option value='14.59'>14.59</option>" +
                    "<option value='15.59'>15.59</option>" +
                    "</select>" +
                    "</div>" +
                    "</div>" +
                    "<div class='row'>" +
                    "<div class='col-md-12'>" +
                    "<label class='form-label'>Deskripsi</label>" +
                    "<input type='text' class='form-control' name='deskripsi[]' placeholder='.....' />" +
                    "</div>" +
                    "</div>" +
                    "<br><br>");

                jQuery("#jumlah-form").val(
                nextform); // Ubah value textbox jumlah-form dengan variabel nextform
            });

            // Buat fungsi untuk mereset form ke semula
            jQuery("#btn-reset-form").click(function() {
                jQuery("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
                jQuery("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
            });
        });
    </script>
@endsection
