    @extends('layouts.template')
    <!-- Tambahkan link ke Dropzone.js -->

    @section('content')
        <h2 style="text-align: center; margin-top: 105px; color:#35755D;">PENGAJUAN BARANG</h2>

        <div class="card-body d-flex flex-column justify-content-between">
            <div class="container">
                <div class="card p-3">
                    @if (session()->has('successPengajuanBarang'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                            {{ session('successPengajuanBarang') }}
                        </div>
                    @endif
                    @if (session()->has('gagalPengajuanBarang'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorAlert">
                            {{ session('gagalPengajuanBarang') }}
                        </div>
                    @endif
                    <form class="mt-3" id="uploadBarang" action="/upload_barang" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text"
                                class="form-control @error('nama_barang') is-invalid                    
                            @enderror"
                                name="nama_barang" id="nama_barang" required>
                            @error('nama_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kategori_barang" class="form-label">Kategori Barang</label>
                            <select class="form-control" id="kategori_barang" name="kategori_barang"
                                aria-describedby="kategoriHelp">
                                <option value="">Pilih Kategori</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Aksesoris">Aksesoris</option>
                                <option value="Gadget">Gadget</option>
                                <option value="Hobi & Koleksi">Hobi & Koleksi</option>
                                <option value="Otomotif">Otomotif</option>
                            </select>
                            {{-- <div id="kategoriHelp" class="form-text">Pilih kategori barang sesuai dengan jenisnya.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="kota" class="form-label">Lokasi Barang</label>
                            <div class="d-flex" style="gap: 20px">
                                <input type="text"
                                    class="form-control @error('kota') is-invalid                    
                                @enderror"
                                    name="kota" id="kota" required placeholder="Kota">
                                @error('kota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <input type="text"
                                    class="form-control @error('provinsi') is-invalid                    
                                @enderror"
                                    name="provinsi" id="provinsi" required placeholder="Provinsi">
                                @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="harga_barang" class="form-label">Harga Barang</label>
                            <input type="text"
                                class="form-control @error('harga_barang') is-invalid
                            @enderror"
                                name="harga_barang" id="harga_barang" required>
                            @error('harga_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" required
                                style="min-height: 150px"></textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kelipatan" class="form-label">Kelipatan Harga</label>
                            <select class="form-control @error('kelipatan') is-invalid @enderror" name="kelipatan"
                                id="kelipatan" required>
                                <option value="">Pilih Kelipatan Harga</option>
                                <option value="50000">50.000</option>
                                <option value="100000">100.000</option>
                            </select>
                            @error('kelipatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3" style="display: none">
                            <label for="tgl_publish" class="form-label">Tanggal Publish</label>
                            <input type="text" class="form-control @error('tgl_publish') is-invalid @enderror"
                                name="tgl_publish" id="tgl_publish" readonly>
                            @error('tgl_publish')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3" style="display: none">
                            <label for="tgl_expired" class="form-label">Tanggal Expired</label>
                            <input type="text" class="form-control @error('tgl_expired') is-invalid @enderror"
                                name="tgl_expired" id="tgl_expired" readonly>
                            @error('tgl_expired')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3" style="display: flex; flex-direction :column ">
                            <label for="foto_barang" class="form-label">Gambar Barang</label>
                            <div id="gambar-container"></div>
                            <input type="file"
                                class="form-control @error('foto_barang') is-invalid
                            @enderror mt-3"
                                name="foto_barang" id="foto_barang" accept="image/png, image/jpeg" required />
                            @error('foto_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3" style="display: flex; flex-direction :column ">
                            <label for="foto_barang_depan" class="form-label">Gambar Barang Depan</label>
                            <div id="gambar-container-1"></div>
                            <input type="file"
                                class="form-control @error('foto_barang_depan') is-invalid
                            @enderror mt-3"
                                name="foto_barang_depan" id="foto_barang_depan" accept="image/png, image/jpeg"
                                required />
                            @error('foto_barang_depan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3" style="display: flex; flex-direction :column ">
                            <label for="foto_barang_belakang" class="form-label">Gambar Barang Belakang</label>
                            <div id="gambar-container-2"></div>
                            <input type="file"
                                class="form-control @error('foto_barang_belakang') is-invalid
                            @enderror mt-3"
                                name="foto_barang_belakang" id="foto_barang_belakang" accept="image/png, image/jpeg"
                                required />
                            @error('foto_barang_belakang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3" style="display: flex; flex-direction :column ">
                            <label for="foto_barang_kiri" class="form-label">Gambar Barang Kiri</label>
                            <div id="gambar-container-3"></div>
                            <input type="file"
                                class="form-control @error('foto_barang_kiri') is-invalid
                            @enderror mt-3"
                                name="foto_barang_kiri" id="foto_barang_kiri" accept="image/png, image/jpeg" required />
                            @error('foto_barang_kiri')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3" style="display: flex; flex-direction :column ">
                            <label for="foto_barang_kanan" class="form-label">Gambar Barang Kanan</label>
                            <div id="gambar-container-4"></div>
                            <input type="file"
                                class="form-control @error('foto_barang_kanan') is-invalid
                            @enderror mt-3"
                                name="foto_barang_kanan" id="foto_barang_kanan" accept="image/png, image/jpeg"
                                required />
                            @error('foto_barang_kanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3" style="display: none">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" name="status" id="status" value="Diproses">
                        </div>
                        <button type="submit" id="submitBtn" class="btn btn-primary">Ajukan Lelang Barang</button>
                    </form>
                </div>
            </div>
        </div>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
        <script>
            document.getElementById('submitBtn').addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah form dikirimkan secara otomatis
                if (confirm('Apakah data yang anda masukan sudah benar?')) {
                    document.getElementById('uploadBarang').submit(); // Mengirimkan form jika konfirmasi "Yes"
                }
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Ambil elemen input tanggal
                var inputTanggalPublish = document.getElementById("tgl_publish");
                var inputTanggalExpired = document.getElementById("tgl_expired");
                var inputDurasi = document.getElementById("durasi");

                // Tambahkan event listener untuk menghitung durasi saat nilai input berubah
                inputTanggalPublish.addEventListener("change", updateDurasi);
                inputTanggalExpired.addEventListener("change", updateDurasi);

                function updateDurasi() {
                    // Ambil nilai tanggal dari input
                    var tanggalPublish = new Date(inputTanggalPublish.value);
                    var tanggalExpired = new Date(inputTanggalExpired.value);

                    // Hitung selisih waktu dalam milidetik
                    var selisihWaktu = tanggalExpired - tanggalPublish;

                    // Konversi selisih waktu menjadi detik
                    var durasiDetik = Math.ceil(selisihWaktu / 1000);

                    // Masukkan durasi ke dalam input
                    inputDurasi.value = durasiDetik;
                }

                // Pemanggilan fungsi updateDurasi untuk menginisialisasi durasi saat halaman dimuat
                updateDurasi();

                // Fungsi untuk menampilkan waktu (jam, menit, detik) secara real-time
                function displayTime() {
                    var today = new Date();

                    var hours = ('0' + today.getHours()).slice(-2); // Tambahkan leading zero jika jam < 10
                    var minutes = ('0' + today.getMinutes()).slice(-2); // Tambahkan leading zero jika menit < 10
                    var seconds = ('0' + today.getSeconds()).slice(-2); // Tambahkan leading zero jika detik < 10

                    var timeString = hours + ':' + minutes + ':' + seconds;

                    // Menampilkan waktu di input
                    document.getElementById("jam_waktu").value = timeString;
                }

                // Panggil fungsi displayTime setiap detik
                setInterval(displayTime, 1000);

                // Panggil fungsi displayTime saat halaman dimuat
                displayTime();
            });
        </script>


        <script>
            // Fungsi untuk menambahkan titik sebagai pemisah ribuan
            function formatRupiah(angka) {
                var reverse = angka.toString().split('').reverse().join('');
                var ribuan = reverse.match(/\d{1,3}/g);
                var formatted = ribuan.join('.').split('').reverse().join('');
                return formatted;
            }

            document.addEventListener("DOMContentLoaded", function() {
                // Temukan elemen input bid
                const bidInput = document.getElementById('harga_barang');

                // Tambahkan event listener untuk memformat nilai saat input berubah
                bidInput.addEventListener('input', function() {
                    // Dapatkan nilai input
                    let inputVal = this.value;

                    // Hapus semua titik dan koma
                    inputVal = inputVal.replace(/[^\d]/g, '');

                    // Format ulang nilai dengan titik sebagai pemisah ribuan
                    this.value = formatRupiah(inputVal);
                });
            });
        </script>
        <script>
            document.getElementById('foto_barang').addEventListener('change', function() {
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
            document.getElementById('foto_barang_depan').addEventListener('change', function() {
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
                        document.getElementById('gambar-container-1').innerHTML = '';
                        document.getElementById('gambar-container-1').appendChild(newImgElement);
                    };
                };

                // Baca file sebagai URL data
                reader.readAsDataURL(file);
            });
        </script>
        <script>
            // Fungsi untuk menampilkan tanggal dan jam secara real-time dengan format yang spesifik
            function displayDateTime() {
                var today = new Date();

                var year = today.getFullYear();
                var month = ('0' + (today.getMonth() + 1)).slice(-2); // Tambahkan leading zero jika bulan < 10
                var day = ('0' + today.getDate()).slice(-2); // Tambahkan leading zero jika hari < 10
                var hours = ('0' + today.getHours()).slice(-2); // Tambahkan leading zero jika jam < 10
                var minutes = ('0' + today.getMinutes()).slice(-2); // Tambahkan leading zero jika menit < 10
                var seconds = ('0' + today.getSeconds()).slice(-2); // Tambahkan leading zero jika detik < 10

                var dateTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;

                // Menampilkan tanggal dan jam di input
                document.getElementById("tgl_publish").value = dateTime;
            }

            // Panggil fungsi displayDateTime setiap detik
            setInterval(displayDateTime, 1000);

            // Panggil fungsi displayDateTime agar tanggal dan jam ditampilkan saat halaman dimuat
            displayDateTime();
        </script>
        <script>
            document.getElementById('foto_barang_belakang').addEventListener('change', function() {
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
                        document.getElementById('gambar-container-2').innerHTML = '';
                        document.getElementById('gambar-container-2').appendChild(newImgElement);
                    };
                };

                // Baca file sebagai URL data
                reader.readAsDataURL(file);
            });
        </script>
        <script>
            document.getElementById('foto_barang_kiri').addEventListener('change', function() {
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
                        document.getElementById('gambar-container-3').innerHTML = '';
                        document.getElementById('gambar-container-3').appendChild(newImgElement);
                    };
                };

                // Baca file sebagai URL data
                reader.readAsDataURL(file);
            });
        </script>
        <script>
            document.getElementById('foto_barang_kanan').addEventListener('change', function() {
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
                        document.getElementById('gambar-container-4').innerHTML = '';
                        document.getElementById('gambar-container-4').appendChild(newImgElement);
                    };
                };

                // Baca file sebagai URL data
                reader.readAsDataURL(file);
            });
        </script>
        <script>
            // Fungsi untuk menampilkan tanggal dan jam secara real-time dengan format yang spesifik
            function displayDateTime() {
                var today = new Date();

                var year = today.getFullYear();
                var month = ('0' + (today.getMonth() + 1)).slice(-2); // Tambahkan leading zero jika bulan < 10
                var day = ('0' + today.getDate()).slice(-2); // Tambahkan leading zero jika hari < 10
                var hours = ('0' + today.getHours()).slice(-2); // Tambahkan leading zero jika jam < 10
                var minutes = ('0' + today.getMinutes()).slice(-2); // Tambahkan leading zero jika menit < 10
                var seconds = ('0' + today.getSeconds()).slice(-2); // Tambahkan leading zero jika detik < 10

                var dateTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;

                // Menampilkan tanggal dan jam di input
                document.getElementById("tgl_publish").value = dateTime;
            }

            // Panggil fungsi displayDateTime setiap detik
            setInterval(displayDateTime, 1000);

            // Panggil fungsi displayDateTime agar tanggal dan jam ditampilkan saat halaman dimuat
            displayDateTime();
        </script>
        <script>
            // Fungsi untuk menampilkan tanggal dan jam secara real-time dengan format yang spesifik
            function displayDateTime() {
                var today = new Date();

                var year = today.getFullYear();
                var month = ('0' + (today.getMonth() + 1)).slice(-2); // Tambahkan leading zero jika bulan < 10
                var day = ('0' + today.getDate()).slice(-2); // Tambahkan leading zero jika hari < 10
                var hours = ('0' + today.getHours()).slice(-2); // Tambahkan leading zero jika jam < 10
                var minutes = ('0' + today.getMinutes()).slice(-2); // Tambahkan leading zero jika menit < 10
                var seconds = ('0' + today.getSeconds()).slice(-2); // Tambahkan leading zero jika detik < 10

                var dateTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;

                // Menampilkan tanggal dan jam di input
                document.getElementById("tgl_publish").value = dateTime;
            }

            // Panggil fungsi displayDateTime setiap detik
            setInterval(displayDateTime, 1000);

            // Panggil fungsi displayDateTime agar tanggal dan jam ditampilkan saat halaman dimuat
            displayDateTime();
        </script>
        <script>
            // Fungsi untuk menampilkan tanggal dan jam secara real-time dengan format yang spesifik
            function displayDateTime() {
                var today = new Date();

                var year = today.getFullYear();
                var month = ('0' + (today.getMonth() + 1)).slice(-2); // Tambahkan leading zero jika bulan < 10
                var day = ('0' + today.getDate()).slice(-2); // Tambahkan leading zero jika hari < 10
                var hours = ('0' + today.getHours()).slice(-2); // Tambahkan leading zero jika jam < 10
                var minutes = ('0' + today.getMinutes()).slice(-2); // Tambahkan leading zero jika menit < 10
                var seconds = ('0' + today.getSeconds()).slice(-2); // Tambahkan leading zero jika detik < 10

                var dateTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;

                // Menampilkan tanggal dan jam di input
                document.getElementById("tgl_publish").value = dateTime;
            }

            // Panggil fungsi displayDateTime setiap detik
            setInterval(displayDateTime, 1000);

            // Panggil fungsi displayDateTime agar tanggal dan jam ditampilkan saat halaman dimuat
            displayDateTime();
        </script>
        <script>
            // Fungsi untuk mendapatkan tanggal dan waktu 5 hari berikutnya secara real-time dengan format yang spesifik
            function getNextFiveDays() {
                var today = new Date();
                today.setDate(today.getDate() + 1); // Tambah 5 hari ke tanggal sekarang

                var year = today.getFullYear();
                var month = ('0' + (today.getMonth() + 1)).slice(-2); // Tambahkan leading zero jika bulan < 10
                var day = ('0' + today.getDate()).slice(-2); // Tambahkan leading zero jika hari < 10
                var hours = ('0' + today.getHours()).slice(-2); // Tambahkan leading zero jika jam < 10
                var minutes = ('0' + today.getMinutes()).slice(-2); // Tambahkan leading zero jika menit < 10
                var seconds = ('0' + today.getSeconds()).slice(-2); // Tambahkan leading zero jika detik < 10

                var dateTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;

                // Menampilkan tanggal dan waktu di input
                document.getElementById("tgl_expired").value = dateTime;
            }

            // Panggil fungsi getNextFiveDays setiap detik
            setInterval(getNextFiveDays, 1000);

            // Panggil fungsi getNextFiveDays saat halaman dimuat
            getNextFiveDays();
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
