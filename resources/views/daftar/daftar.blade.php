@extends('layouts.template')
@section('content')   

    <h2 style="text-align: center; margin-top: 105px; color:#35755D;">DAFTAR</h2>
    <h6 style="text-align: center; margin-bottom: 40px; font-weight: bold;">Ayo daftar dan coba lelang di SiLelang hari ini</h6>
    <div class="card container card-custom" style="margin: auto; max-width: 1000px;">
        <div class="card-body d-flex flex-column justify-content-between">
                <div class="mb-3">
                    <h5 style="font-weight: bold; color: #35755D;">Data Pribadi</h5>
                </div>
                <div class="mb-2 row">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        NIK
                    </label>
                    <div class="col-sm-10">
                        <input required type="text" name="nik" class="form-control" id="nik">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Nama Lengkap
                    </label>
                    <div class="col-sm-10">
                        <input required type="text" name="nama" class="form-control" id="nama">
                        <!-- <label for="text" style="color: #35755D;">*Nama harus sesuai dengan KTP</label> -->
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Jenis Kelamin
                    </label>
                    <div class="form-check form-check-inline">
                                <input class="form-check-input ml-3" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="pilihan1">
                                <label class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="pilihan2">
                                <label class="form-check-label">Perempuan</label>
                            </div>
                </div>
                <div class="mb-2 row">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Tempat Lahir
                    </label>
                    <div class="col-sm-10">
                        <input required type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Tanggal Lahir
                    </label>
                    <div class="col-sm-10">
                        <input required type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Alamat Sesuai KTP
                    </label>
                    <div class="col-sm-10">
                        <input required type="text" name="alamat" class="form-control" id="alamat">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        No. Handphone
                    </label>
                    <div class="col-sm-10">
                        <input required type="tel" pattern="[0-9]+" name="nohp" class="form-control" id="nohp">
                    </div>
                </div>
<!-- Dokumen -->
                <div class="mb-4">
                    <h5 style="font-weight: bold; color: #35755D; margin-top: 20px">Kelengkapan Dokumen</h5>
                </div>
                <div class="mb-2 row">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Foto KTP
                    </label>
                    <div class="col-sm-10">
                        <input required type="file" name="foto" class="form-control" id="foto" accept="image/*">
                        <!-- <label for="text" style="color: #35755D;">*Nama harus sesuai dengan KTP</label> -->
                    </div>
                </div>
                <div class="mb-4">
                    <h5 style="font-weight: bold; color: #35755D; margin-top: 20px">Data Akun</h5>
                </div>
                <div class="mb-2 row">
                    <label for="email" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        E-mail
                    </label>
                    <div class="col-sm-10">
                    <input required type="email" name="email" class="form-control" id="email" style="text-transform: none;">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="password" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Password
                    </label>
                    <div class="col-sm-10">
                        <input required type="password" pattern=".{8,}" name="password" class="form-control" id="password" placeholder="Password minimal 8 karakter">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="password2" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Ulangi Password
                    </label>
                    <div class="col-sm-10">
                        <input required type="password" pattern=".{8,}" name="password2" class="form-control" id="password2" placeholder="Ulangi penulisan konfirmasi password untuk memastikan tidak salah ketik">
                    </div>
                </div>
                <div class="mb-3 mt-2 form-check" style="text-align: right; font-weight: bold;">
                    <input class="form-check-input" type="checkbox" value="" id="agreeCheckbox">
                    <label class="form-check-label" for="agreeCheckbox">
                        Saya telah membaca, memahami, dan menyetujui <a href="#">syarat dan ketentuan</a>
                    </label>
                </div>
                <button class="btn btn-outline-success mt-1 custom-daftar2-button align-self-center" type="submit">KIRIM</button>
        </div>
    </div>
    
@endsection