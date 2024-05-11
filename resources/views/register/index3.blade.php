@extends('layouts.tem')
@section('content')
    <!-- Section: Design Block -->
    <div class="d-flex justify-content-center mt-5">
        <div class="card shadow-5-strong" style="width: 800px;">
            <div class="card-body">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10">
                        <h2 class="fw-bold mb-3 text-center">Register</h2>
                        <form action="/register" method="POST">
                            @csrf
                            <div class="form-outline mb-2">
                                <label class="form-label" for="name">Nama Lengkap</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name" required
                                    value="{{ old('name') }}" />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-outline mb-2">
                                <label class="form-label" for="nik">NIK</label>
                                <input type="text" name="nik"
                                    class="form-control @error('nik') is-invalid
                                @enderror"
                                    id="nik" required value="{{ old('nik') }}" />
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-outline mb-2">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid
                                @enderror"
                                    id="email" required value="{{ old('email') }}" />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-outline mb-2">
                                <label class="form-label" for="alamat">Alamat</label>
                                <input type="text" name="alamat"
                                    class="form-control @error('alamat') is-invalid
                                @enderror"
                                    id="alamat" required value="{{ old('alamat') }}" />
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-outline mb-2">
                                <label class="form-label" for="no_hp">No Hp</label>
                                <input type="number" name="no_hp"
                                    class="form-control @error('no_hp') is-invalid
                                @enderror"
                                    id="no_hp" required value="{{ old('no_hp') }}" />
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-outline mb-2" style="display: none">
                                <label class="form-label" for="status">No Hp</label>
                                <input type="text" name="status"
                                    class="form-control @error('status') is-invalid
                                @enderror"
                                    id="status" required value="1" />
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password" />
                                    <span class="input-group-text" id="togglePassword">
                                        <i class="bi bi-eye-slash-fill"></i>
                                    </span>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-3" style="width: 100px">
                                Register
                            </button>
                        </form>
                        <div class="d-block text-center">
                            Punya akun ? <a href="/login">Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const togglePasswordIcon = document.getElementById('togglePassword');

            togglePasswordIcon.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Ubah ikon mata tergantung pada tipe input
                if (type === 'password') {
                    togglePasswordIcon.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
                } else {
                    togglePasswordIcon.innerHTML = '<i class="bi bi-eye-fill"></i>';
                }
            });
        });

        function confirmRegistration() {
            if (confirm('Apakah data yang Anda masukkan sudah benar?')) {
                document.getElementById('registerForm').submit();
            }
        }
    </script>
@endsection
