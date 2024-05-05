@extends('partials.template')
@section('content')
@if (session()->has('gagal'))
<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 500px;">
    {{ session('gagal') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="d-flex justify-content-center mt-5">
        <div class="card shadow-5-strong" style="width: 500px;">
            <div class="card-body">
                <h3 style="text-align: center; margin-bottom: 20px">Pengajuan Lelang</h3>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <form action="/pengajuan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-outline mb-2">
                                <label class="form-label" for="bank">Nama Bank</label>
                                <select name="bank" class="form-select" id="bank" required>
                                    <option value="">Pilih Bank</option>
                                    <option value="BRI">Bank Rakyat Indonesia (BRI)</option>
                                    <option value="BCA">Bank Central Asia (BCA)</option>
                                    <option value="Mandiri">Bank Mandiri</option>
                                    <option value="BNI">Bank Negara Indonesia (BNI)</option>
                                    <option value="CIMB">CIMB Niaga</option>
                                </select>
                            </div>                     
                            <div class="form-outline mb-2">
                                <label class="form-label" for="no_rek">No Rekening</label>
                                <input type="text" name="no_rek"
                                    class="form-control @error('no_rek') is-invalid
                                @enderror"
                                    id="no_rek" required value="{{ old('no_rek') }}" />
                                @error('no_rek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3" style="display: flex; flex-direction :column ">
                                <label for="scan_ktp" class="form-label">Scan KTP</label>
                                <div id="gambar-container"></div>
                                <input type="file" class="form-control @error('scan_ktp') is-invalid
                                    @enderror mt-3"
                                    name="scan_ktp" id="scan_ktp" accept="image/png, image/jpeg" required />
                                @error('scan_ktp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3" style="display: none">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" name="status" id="status" value="Diproses">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-2 mb-3" style="width: 100px">
                                Daftar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('scan_ktp').addEventListener('change', function() {
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
@endsection
