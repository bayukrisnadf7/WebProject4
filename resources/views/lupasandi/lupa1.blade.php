@extends('layouts.template')
@section('content') 

<div class="container" style="margin-top: 150px;">
    <div class="row align-items-start">
        <div class="col-md-5 offset-md-1" style="margin-right: 200px; margin-left: -3px;">
            <img src="/assets/img/vectorlupa.jpg" alt="gambar" style="max-width: 100%;">
        </div>
        <div class="col-md-4">
            <div class="mb-4">
                <h2>Lupa Kata Sandi</h2>
                <h6>Silakan masukkan alamat email untuk mendapat tautan pengaturan ulang kata sandi.</h6>
            </div>
        <div class="mb-3">
            <label for="email" class="form-label" style="font-weight: bold;">
                E-mail
            </label>
            <input required type="email" name="email" class="form-control" id="email">
        </div>
            <a href="lupasandi2.html" class="btn btn-outline-success mt-1 custom-login2-button" type="submit">Pulihkan Akun</a>
        </div>
    </div>
</div>