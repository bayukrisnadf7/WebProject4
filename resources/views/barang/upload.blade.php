    @include('partials.template')
    @if (session()->has('gagal'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 500px;">
            {{ session('gagal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <form class="mt-3" action="/upload_barang" method="POST" enctype="multipart/form-data">
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
                <select class="form-select" id="kategori_barang" name="kategori_barang" aria-describedby="kategoriHelp">
                    <option value="">Pilih Kategori</option>
                    <option value="1">Elektronik</option>
                    <option value="2">Aksesoris</option>
                    <option value="3">Gadget</option>
                    <option value="4">Hobi</option>
                </select>
                <div id="kategoriHelp" class="form-text">Pilih kategori barang sesuai dengan jenisnya.</div>
            </div>
            <div class="mb-3">
                <label for="harga_barang" class="form-label">Harga Barang</label>
                <input type="text" class="form-control @error('harga_barang') is-invalid
                    @enderror"
                    name="harga_barang" id="harga_barang" required>
                @error('harga_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelipatan" class="form-label">Kelipatan Bid</label>
                <select class="form-select @error('kelipatan') is-invalid @enderror" name="kelipatan" id="kelipatan" required>
                    <option value="">Pilih Harga Barang</option>
                    <option value="50000">50.000</option>
                    <option value="100000">100.000</option>
                </select>
                @error('kelipatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="tgl_publish" class="form-label">Tanggal Publish</label>
                <input type="text" class="form-control @error('tgl_publish') is-invalid @enderror" name="tgl_publish"
                    id="tgl_publish" readonly>
                @error('tgl_publish')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_expired" class="form-label">Tanggal Expired</label>
                <input type="text" class="form-control @error('tgl_expired') is-invalid @enderror" name="tgl_expired"
                    id="tgl_expired" readonly>
                @error('tgl_expired')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi (hari)</label>
                <input type="number" class="form-control" name="durasi" id="durasi" readonly>
            </div>
            <div class="mb-3" style="display: flex; flex-direction :column ">
                <label for="foto_barang" class="form-label">Gambar Barang</label>
                <div id="gambar-container"></div>
                <input type="file" class="form-control @error('foto_barang') is-invalid
                    @enderror mt-3"
                    name="foto_barang" id="foto_barang" accept="image/png, image/jpeg" required />
                @error('foto_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
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
            today.setDate(today.getDate() + 5); // Tambah 5 hari ke tanggal sekarang

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
