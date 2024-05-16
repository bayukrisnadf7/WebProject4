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
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label" style="font-weight: bold;">
                            E-mail
                        </label>
                        <input style="text-transform: none" required type="email" name="email" class="form-control" id="email">
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-1 custom-login2-button">Pulihkan</button>
                </form>
            </div>
        </div>
    </div>
