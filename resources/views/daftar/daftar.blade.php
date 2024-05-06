@extends('layouts.template')
@section('content')   

    <h2 style="text-align: center; margin-top: 105px; color:#35755D;">DAFTAR</h2>
    <h6 style="text-align: center; margin-bottom: 40px; font-weight: bold;">Ayo daftar dan coba lelang di SiLelang hari ini</h6>
    <div class="card container card-custom" style="margin: auto; max-width: 1000px;">
        <div class="card-body d-flex flex-column justify-content-between">
                <div class="mb-4">
                    <h5 style="font-weight: bold; color: #35755D;">Data Pribadi</h5>
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
                        NIK
                    </label>
                    <div class="col-sm-10">
                        <input required type="text" name="nik" class="form-control" id="nik">
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
                        <input required type="text" name="nohp" class="form-control" id="nohp">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="email" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        E-mail
                    </label>
                    <div class="col-sm-10">
                    <input required type="email" name="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="password" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Password
                    </label>
                    <div class="col-sm-10">
                        <input required type="password" name="password" class="form-control" id="password">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="password2" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Ulangi Password
                    </label>
                    <div class="col-sm-10">
                        <input required type="password" name="password2" class="form-control" id="password2">
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