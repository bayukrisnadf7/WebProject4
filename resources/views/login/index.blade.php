@extends('layouts.template')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label" style="font-weight: bold;">
                            E-mail
                        </label>
                        <input style="text-transform: none" required type="email" name="email" class="form-control"
                            id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label" style="font-weight: bold;">
                            Password
                        </label>
                        <input required type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3" style="text-align: right;">
                        <a href="{{ route('forget.password.get') }}">Lupa kata sandi?</a>
                    </div>
                    <button class="btn btn-outline-success mt-1 custom-login2-button" type="submit">Masuk</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if (Session::has('errorLogin')) 
            $(document).ready(function() {
            toastr.options.timeOut = 5000;
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.error("{{ Session::get('errorLogin') }}");
        });
        @endif
    </script>
@endsection
