@extends('partials.template')
@if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 500px;">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@section('content')
    <div class="wrapper">
        <div class="image-content">
            <img src="{{ asset('storage/app/img/barang/' . $detail_barang->foto_barang) }}" class="card-img-top"
                alt="..." width="100%" height="400px" style="object-fit: contain">
        </div>
        <div class="content-description" style="text-align: center">
            <h4>Nama Barang :{{ $detail_barang['nama_barang'] }}</h4>
            <h6>Open Bid : {{ $detail_barang['harga_barang'] }}</h6>
            <h6>Durasi : {{ $detail_barang['durasi'] }}</h6>
            <p>
                {{ $detail_barang['tgl_publish'] }}
            </p>
            <p>
                NIK: {{ auth()->user()->nik }}
            </p>
        </div>
        <a href="#" data-toggle="modal" data-target="#bidModal">Bid Sekarang</a>
        <a href="/">Beranda</a>

    </div>
    @if ($bid_barang)
        @foreach ($bid_barang as $item)
            {{-- <h4>Nama Orang Yang Ngebid: {{ $item->user->name }}</h4> --}}
            <h4>Total Ngebid: {{ $item->harga_bid }}</h4>
        @endforeach
    @else
        <p>No bid data found.</p>
    @endif



    <div class="modal fade" id="bidModal" tabindex="-1" role="dialog" aria-labelledby="bidModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bidModalLabel">Bid Sekarang</h5>
                </div>
                <div class="modal-body">
                    <!-- Isi modal di sini -->
                    <div class="form-group">
                        <label for="bid_minimal">Bid Minimal</label>
                        <input type="text" class="form-control" id="bid_minimal" name="bid_minimal"
                            value="{{ $detail_barang['harga_barang'] }}" readonly>
                    </div>
                    <form action="{{ route('submit_bid', ['id' => $detail_barang->id]) }}" method="POST" id="bidForm">
                        @csrf
                        <input type="text" name="id_barang" value="{{ $detail_barang->id }}">
                        <input type="text" name="nik" value="{{ auth()->user()->nik }}">
                        <div class="form-group">
                            <label for="bid_minimal">Kelipatan</label>
                            <input type="text" class="form-control" id="kelipatan" name="kelipatan"
                                value="{{ $detail_barang['kelipatan'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="harga_bid">Nominal Bid:</label>
                            <input type="text" class="form-control" id="harga_bid" name="harga_bid" required>
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
            // Temukan elemen input harga_bid dan kelipatan
            const bidInput = document.getElementById('harga_bid');
            const kelipatanInput = document.getElementById('kelipatan');

            // Tambahkan event listener untuk memformat nilai saat input berubah
            bidInput.addEventListener('input', function() {
                // Dapatkan nilai input
                let inputVal = this.value;

                // Hapus semua titik dan koma
                inputVal = inputVal.replace(/[^\d]/g, '');

                // Format ulang nilai dengan titik sebagai pemisah ribuan
                this.value = formatRupiah(inputVal);
            });

            // Temukan formulir dengan ID 'bidForm'
            const bidForm = document.getElementById('bidForm');

            // Tambahkan event listener untuk meng-handle submit form
            bidForm.addEventListener('submit', function(event) {
                // Temukan harga_bid minimal dan harga_bid dari form
                const bidMinimal = parseFloat(document.getElementById('bid_minimal').value.replace(/\./g,
                    ''));
                const bidInput = parseFloat(document.getElementById('harga_bid').value.replace(/\./g, ''));

                // Temukan kelipatan
                const kelipatan = parseFloat(kelipatanInput.value.replace(/\./g, ''));

                // Validasi jika nilai harga_bid kurang dari harga_bid minimal
                if (bidInput <= bidMinimal || bidInput % kelipatan !== 0) {
                    // Mencegah pengiriman form jika nilai harga_bid kurang dari harga_bid minimal atau tidak sesuai kelipatan
                    event.preventDefault();
                    alert(
                        'Nominal Bid tidak boleh kurang dari Bid Minimal atau tidak sesuai dengan kelipatan yang ditentukan!'
                    );
                }
            });
        });
    </script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
