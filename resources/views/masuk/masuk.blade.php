@extends('layouts.template')
@section('content')   

<div class="container" style="margin-top: 150px;">
        <div class="row align-items-start">
            <div class="col-md-5 offset-md-1" style="margin-right: 200px; margin-left: -3px;">
                <img src="/assets/img/vektor.jpg" alt="gambar" style="max-width: 100%;">
            </div>
            <div class="col-md-4">
                <div class="mb-4">
                    <h2>Masuk</h2>
                    <h6>Silahkan mengisi data Anda yang telah terdaftar</h6>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label" style="font-weight: bold;">
                        E-mail
                    </label>
                    <input required type="email" name="email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" style="font-weight: bold;">
                        Password
                    </label>
                    <input required type="password" name="password" class="form-control" id="password">
                </div>
                <div class="mb-3" style="text-align: right;">
                    <a href="/lupa_sandi">Lupa kata sandi?</a>
                </div>
                <button class="btn btn-outline-success mt-1 custom-login2-button" type="submit">Masuk</button>
            </div>
        </div>
    </div>

@endsection