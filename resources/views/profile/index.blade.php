@extends('layouts.template')
@section('content')
    <h2 style="text-align: center; margin-top: 105px; color:#35755D;">PROFILE</h2>
    {{-- <h6 style="text-align: center; margin-bottom: 40px; font-weight: bold;">Ayo daftar dan coba lelang di SiLelang hari ini
    </h6> --}}
    <div class="card container card-custom" style="margin: auto; max-width: 1000px;">
        @if (session()->has('successUpdate'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                {{ session('successUpdate') }}
                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
            </div>
        @endif

        @if (session()->has('registError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert">
                {{ session('registError') }}
                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
            </div>
        @endif
        <div class="card-body d-flex flex-column justify-content-between">
            <form id="userDataForm" action="/profile_data_pribadi" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3" style="display: flex; justify-content: space-between; align-items: center;">
                    <h5 style="font-weight: bold; color: #35755D; margin: 0;">Data Pribadi</h5>
                    <button id="editButton" type="button"
                        style="background-color: #35755D; color: white; border: none; padding: 5px 10px; border-radius: 25px; width: 80px">Edit</button>
                </div>
                <div class="mb-2 row" style="display: none">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        NIK
                    </label>
                    <div class="col-sm-10">
                        <input required type="text" name="nik"
                            class="form-control @error('nik') is-invalid @enderror" id="nik"
                            value="{{ auth()->user()->nik }}" readonly>
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Nama Lengkap
                    </label>
                    <div class="col-sm-10">
                        <input required type="text" name="nama"
                            class="form-control @error('nama') is-invalid @enderror" id="nama"
                            value="{{ auth()->user()->nama }}" readonly>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Jenis Kelamin
                    </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input ml-3 @error('jenis_kelamin') is-invalid @enderror" type="radio"
                            name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki"
                            @if (old('jenis_kelamin', auth()->user()->jenis_kelamin) == 'Laki-laki') checked @endif readonly>
                        <label class="form-check-label" for="jenis_kelamin1">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                            name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan"
                            @if (old('jenis_kelamin', auth()->user()->jenis_kelamin) == 'Perempuan') checked @endif readonly>
                        <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                    </div>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2 row">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Tempat Lahir
                    </label>
                    <div class="col-sm-10">
                        <input required type="text" name="tempat_lahir"
                            class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                            value="{{ auth()->user()->tempat_lahir }}" readonly>
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Tanggal Lahir
                    </label>
                    <div class="col-sm-10">
                        <input required type="date" name="tanggal_lahir"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                            value="{{ auth()->user()->tanggal_lahir }}" readonly>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Alamat Sesuai KTP
                    </label>
                    <div class="col-sm-10">
                        <input required type="text" name="alamat"
                            class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            value="{{ auth()->user()->alamat }}" readonly>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="text" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        No. Handphone
                    </label>
                    <div class="col-sm-10">
                        <input required type="tel" pattern="[0-9]+" name="nohp"
                            class="form-control @error('nohp') is-invalid @enderror" id="nohp"
                            value="{{ auth()->user()->nohp }}" readonly>
                        @error('nohp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 mt-4" style="display: flex; justify-content: flex-end; gap: 15px; align-items: center;">
                    <button id="backButton" type="button"
                        style="background-color: #403575; color: white; border: none; padding: 5px 10px; border-radius: 25px; display: none; width: 80px">Kembali</button>
                    <button id="saveButton"
                        style="background-color: #35755D; color: white; border: none; padding: 5px 10px; border-radius: 25px; display: none; width: 80px">Simpan</button>
                </div>
            </form>
            <form id="userDataForm2" action="{{ route('profile.updateAccount') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-4" style="display: flex; justify-content: space-between; align-items: center;">
                    <h5 style="font-weight: bold; color: #35755D; margin: 0;">Data Akun</h5>
                    <button id="editButton2" type="button"
                        style="background-color: #35755D; color: white; border: none; padding: 5px 10px; border-radius: 25px; width: 80px">Edit</button>
                </div>
                <div class="mb-2 row">
                    <label for="email" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        E-mail
                    </label>
                    <div class="col-sm-10">
                        <input required type="email" name="email" style="text-transform: none"
                            class="form-control @error('email') is-invalid @enderror" id="email"
                            value="{{ auth()->user()->email }}" readonly>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="password" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Password
                    </label>
                    <div class="col-sm-10">
                        <input type="password" pattern=".{8,}" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="password" readonly
                            placeholder="Password minimal 8 karakter" value="{{ auth()->user()->password }}">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="mb-2 row">
                    <label for="password2" class="col-sm-2 col-form-label" style="font-weight: bold;">
                        Ulangi Password
                    </label>
                    <div class="col-sm-10">
                        <input type="password" pattern=".{8,}" name="password2"
                            class="form-control @error('password2') is-invalid @enderror" id="password2"
                            placeholder="Ulangi penulisan konfirmasi password untuk memastikan tidak salah ketik" readonly>
                        @error('password2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}
                <div class="mb-3 mt-4" style="display: flex; justify-content: flex-end; gap: 15px; align-items: center;">
                    <button id="backButton2" type="button"
                        style="background-color: #403575; color: white; border: none; padding: 5px 10px; border-radius: 25px; display: none; width: 80px">Kembali</button>
                    <button id="saveButton2"
                        style="background-color: #35755D; color: white; border: none; padding: 5px 10px; border-radius: 25px; display: none; width: 80px">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('foto').addEventListener('change', function() {
            var file = this.files[0]; // Ambil file yang dipilih

            // Buat objek FileReader
            var reader = new FileReader();

            // Saat file selesai dibaca
            reader.onload = function(e) {
                var img = new Image();
                img.src = e.target.result; // Set sumber gambar

                // Saat gambar selesai dimuat
                img.onload = function() {
                    var canvas = document.createElement('canvas');
                    var ctx = canvas.getContext('2d');
                    // Tentukan ukuran gambar yang diinginkan
                    var maxWidth = 300; // Misalnya, maksimum lebar 300 piksel
                    var maxHeight = 300; // Misalnya, maksimum tinggi 300 piksel

                    // Periksa apakah gambar perlu diubah ukurannya
                    var width = img.width;
                    var height = img.height;

                    if (width > maxWidth || height > maxHeight) {
                        // Hitung rasio lebar dan tinggi gambar
                        var ratio = Math.min(maxWidth / width, maxHeight / height);

                        // Ubah ukuran gambar sesuai dengan rasio yang dihitung
                        canvas.width = width * ratio;
                        canvas.height = height * ratio;
                    } else {
                        // Gunakan ukuran gambar asli jika tidak perlu diubah
                        canvas.width = width;
                        canvas.height = height;
                    }

                    // Gambar ulang gambar ke dalam canvas dengan ukuran yang sesuai
                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                    // Dapatkan URL data gambar yang baru
                    var newImageDataUrl = canvas.toDataURL('image/jpeg'); // Ubah ke format JPEG

                    // Buat elemen gambar baru dengan gambar yang lebih kecil
                    var newImgElement = document.createElement('img');
                    newImgElement.src = newImageDataUrl;

                    // Tambahkan gambar ke dalam container
                    document.getElementById('gambar-container').innerHTML = '';
                    document.getElementById('gambar-container').appendChild(newImgElement);
                };
            };

            // Baca file sebagai URL data
            reader.readAsDataURL(file);
        });
    </script>
    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            document.querySelectorAll('#userDataForm input').forEach(input => {
                input.removeAttribute('readonly');
            });
            document.querySelectorAll('#userDataForm input[type="radio"]').forEach(input => {
                input.removeAttribute('readonly');
            });
            document.getElementById('saveButton').style.display = 'inline-block';
            document.getElementById('backButton').style.display = 'inline-block';
            document.getElementById('editButton').style.display = 'none';
        });

        document.getElementById('backButton').addEventListener('click', function() {
            document.querySelectorAll('#userDataForm input').forEach(input => {
                input.setAttribute('readonly', true);
            });
            document.querySelectorAll('#userDataForm input[type="radio"]').forEach(input => {
                input.setAttribute('readonly', true);
            });
            document.getElementById('saveButton').style.display = 'none';
            document.getElementById('backButton').style.display = 'none';
            document.getElementById('editButton').style.display = 'inline-block';
        });

        document.getElementById('saveButton').addEventListener('click', function(event) {
            const confirmation = confirm('Apakah data yang anda masukan sudah benar?');
            if (!confirmation) {
                event.preventDefault();
            }
        });
    </script>

    <script>
        document.getElementById('editButton2').addEventListener('click', function() {
            document.querySelectorAll('#userDataForm2 input').forEach(input => {
                input.removeAttribute('readonly');
            });
            document.getElementById('saveButton2').style.display = 'inline-block';
            document.getElementById('backButton2').style.display = 'inline-block';
            document.getElementById('editButton2').style.display = 'none';
        });

        document.getElementById('backButton2').addEventListener('click', function() {
            document.querySelectorAll('#userDataForm2 input').forEach(input => {
                input.setAttribute('readonly', true);
            });
            document.getElementById('saveButton2').style.display = 'none';
            document.getElementById('backButton2').style.display = 'none';
            document.getElementById('editButton2').style.display = 'inline-block';
        });

        document.getElementById('saveButton2').addEventListener('click', function(event) {
            const confirmation = confirm('Apakah data yang anda masukan sudah benar?');
            if (!confirmation) {
                event.preventDefault();
            }
        });
    </script>
    <script>
        // Fade out the success alert after 5 seconds
        setTimeout(function() {
            $('#successAlert').fadeOut('slow');
        }, 4000);

        // Fade out the error alert after 5 seconds
        setTimeout(function() {
            $('#errorAlert').fadeOut('slow');
        }, 4000);
    </script>
@endsection
