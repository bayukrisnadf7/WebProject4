@extends('partials.template')
@section('content')
    <div class="wrapper">
        <div class="image-content">
            <img src="{{ asset('storage/img/barang/' . $detail_barang->foto_barang) }}" class="card-img-top" alt="..."
                width="100%" height="400px" style="object-fit: contain">
        </div>
        <div class="content-description" style="text-align: center">
            <h4>Nama Barang :{{ $detail_barang['nama_barang'] }}</h4>
            <h6>Open Bid : {{ $detail_barang['harga_barang'] }}</h6>
            <h6>Durasi : {{ $detail_barang['durasi'] }}</h6>
            <p>
                {{ $detail_barang['tgl_publish'] }}
            </p>
        </div>
        <a href="#" data-toggle="modal" data-target="#bidModal">Bid Sekarang</a>
        <a href="/">Beranda</a>
    </div>

    <div class="modal fade" id="bidModal" tabindex="-1" role="dialog" aria-labelledby="bidModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bidModalLabel">Bid Sekarang</h5>
                </div>
                <div class="modal-body">
                    <!-- Isi modal di sini -->
                    <form action="/submit_bid" method="POST" id="bidForm">
                        @csrf
                        <div class="form-group">
                            <label for="bid_minimal">Bid Minimal</label>
                            <input type="number" class="form-control" id="bid_minimal" name="bid_minimal" value="{{ $detail_barang['harga_barang'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="bid">Nominal Bid:</label>
                            <input type="number" class="form-control" id="bid" name="bid" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit Bid</button>
                    </form>                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
            const bidInput = document.getElementById('bid');
    
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
        document.addEventListener("DOMContentLoaded", function() {
            // Temukan formulir dengan ID 'bidForm' saat halaman dimuat
            const bidForm = document.getElementById('bidForm');
    
            // Tambahkan event listener untuk meng-handle submit form
            bidForm.addEventListener('submit', function(event) {
                // Temukan bid minimal dan bid dari form
                const bidMinimal = parseFloat(document.getElementById('bid_minimal').value);
                const bidInput = parseFloat(document.getElementById('bid').value);
    
                // Validasi jika nilai bid kurang dari bid minimal
                if (bidInput < bidMinimal) {
                    // Mencegah pengiriman form jika nilai bid kurang dari bid minimal
                    event.preventDefault();
                    alert('Nominal Bid tidak boleh kurang dari Bid Minimal!');
                }
            });
        });
    </script>
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
