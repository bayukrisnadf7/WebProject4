@extends('partials.template')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 500px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 500px;">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Section: Design Block -->
    <div class="d-flex justify-content-center mt-5">
        <div class="card shadow-5-strong" style="width: 500px;">
            <div class="card-body">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="form-outline mb-2">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid
                                @enderror"
                                    id="email" autofocus required value="{{ old('email') }}" />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control" required />
                                    <button class="btn btn-secondary" type="button" id="togglePassword">
                                        <i id="passwordIcon" class="bi bi-eye-slash-fill"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mt-2 mb-3" style="width: 100px">
                                Login
                            </button>
                        </form>
                        <div class="d-block text-center">
                            Belum daftar ? <a href="/register">Daftar Sekarang!</a>
                        </div>
                        <div class="d-block text-center">
                            Lupa Password? ? <a href="/lupa-password">Gas Ganti</a>
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
    </script>
@endsection
