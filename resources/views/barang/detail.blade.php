@extends('layouts.template')
@if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 500px;">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@php
use Carbon\Carbon;
Carbon::setLocale('id');
@endphp
@section('content')
    <section class="section-padding" style="padding-left: 50px; padding-right: 50px;">
        <div class="container-fluid" style="margin-top: 55px;">
            <div class="row">
                <div class="col-md-5 px-2">
                    <div id="image-slider">
                        <div class="main-image">
                            <!-- Gambar utama -->
                            <img src="{{ asset('img/public/storage/barang/' . $detail_barang->foto_barang) }}" alt="Gambar Utama"
                            id="main-image">
                        </div>
                        <div class="thumbnail-images">
                            <!-- 4 gambar kecil -->
                            <img src="{{ asset('img/public/storage/barang/' . $detail_barang->foto_barang) }}" alt="Thumbnail 1" class="thumbnail"
                                onclick="changeImage(this)">
                                <img src="{{ asset('img/public/storage/barang/' . $detail_barang->foto_barang_depan) }}"
                                alt="Thumbnail 1" class="thumbnail" onclick="changeImage(this)">
                            <img src="{{ asset('img/public/storage/barang/' . $detail_barang->foto_barang_belakang) }}"
                                alt="Thumbnail 2" class="thumbnail" onclick="changeImage(this)">
                            <img src="{{ asset('img/public/storage/barang/' . $detail_barang->foto_barang_kiri) }}"
                                alt="Thumbnail 3" class="thumbnail" onclick="changeImage(this)">
                            <img src="{{ asset('img/public/storage/barang/' . $detail_barang->foto_barang_kanan) }}"
                                alt="Thumbnail 4" class="thumbnail" onclick="changeImage(this)">
                        </div>
                    </div>
                </div>
                <div class="col-md-7 px-2">
                    <!-- Konten deskripsi -->
                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            <h1 class="h4">{{ $detail_barang->nama_barang }}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="text-desc">Harga</h6>
                        </div>
                        <div class="col-md-9">
                            <h5 class="text" style="font-weight: bold;">Rp {{ $detail_barang->harga_barang }}</h5>
                        </div>
                    </div>
                    <div>
                        <div class="dropdown-divider"></div>
                        <!-- Informasi tambahan -->
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text">Penjual</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <h6 class="text font-weight-normal">{{ $namaPemilik }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <!-- Informasi batas akhir penawaran -->
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-ibid-black1">Batas Akhir Penawaran</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <h6 class="text-ibid-black1 font-weight-normal">
                                        {{ Carbon::parse($detail_barang->tgl_expired)->translatedFormat('d F Y H:i') }} WIB
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <!-- Informasi lokasi barang -->
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-ibid-black1">Lokasi Barang</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <h6 class="text-ibid-black1 font-weight-normal">{{ $detail_barang->kota }} {{  $detail_barang->provinsi }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <!-- Informasi kelipatan -->
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-ibid-black1">Kelipatan</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <h6 class="text" style="font-weight:bold;">
                                        Rp {{ number_format($detail_barang->kelipatan, 0, ',', '.') }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                       
                        <div class="dropdown-divider"></div>
                        <!-- Deskripsi -->
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-ibid-black1">Deskripsi</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <h6 class="text-ibid-black1 font-weight-normal">{{ $detail_barang->deskripsi}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <!-- Informasi kelipatan -->
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-ibid-black1">Lelang Tertinggi</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <h6 class="text" style="font-weight:bold;">
                                        Rp {{ $lelang_tertinggi->harga_bid ?? '-' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" style="width: 100%" class="btn btn-primary mt-4" data-toggle="modal" data-target="#bidModal">
                                IKUT LELANG
                            </button>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <!-- <button class="btn mt-4 ikutilelang-button align-self-center" style="border-radius: 11px;">Ikut Lelang</button> -->
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!-- <div class="col-md-3 px-2">
                        <div class="card-detail">
                            <h1>PPPPPP</h1>
                        </div>
                    </div> -->
            </div>
        </div>
    </section>

    <!-- trending -->
    <section id="trending-slider" class="section-padding"
        style="padding-left: 50px; padding-right: 50px; margin-top: 15px;">
        <div class="container-fluid" style="overflow: hidden;">
            <h5 style="margin-bottom: 15px; position: relative; font-weight: bold;">Produk Terkait
                <div class="navigation" style="position: absolute; top: 0; right: 0; margin-right: -20px;">
                    <button class="prev-btn"><i class="fa-solid fa-arrow-left"></i></button>
                    <button class="next-btn"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </h5>
            <div class="slider">
                <div class="slidee">
                    <div class="card-item">
                        <div class="trending-item">
                            <div class="trending-image">
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/about/about.jpg" alt="" />
                                </a>
                            </div>
                            <div class="descr">
                                <h6 class="title2">
                                    <a href="/detail_lelang">
                                        Nike Air Jordan KW Super
                                    </a>
                                </h6>
                                <div class="meta-tags">
                                    <p>2018 | 43 | JPN</p>
                                    <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                                    <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                                    <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slidee">
                    <div class="card-item">
                        <div class="trending-item">
                            <div class="trending-image">
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/about/img3.jpg" alt="" />
                                </a>
                            </div>
                            <div class="descr">
                                <h6 class="title2">
                                    <a href="/detail_lelang">
                                        Nike Air Jordan KW Super
                                    </a>
                                </h6>
                                <div class="meta-tags">
                                    <p>2018 | 43 | JPN</p>
                                    <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                                    <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                                    <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slidee">
                    <div class="card-item">
                        <div class="trending-item">
                            <div class="trending-image">
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/about/img2.jpg" alt="" />
                                </a>
                            </div>
                            <div class="descr">
                                <h6 class="title2">
                                    <a href="/detail_lelang">
                                        Nike Air Jordan KW Super
                                    </a>
                                </h6>
                                <div class="meta-tags">
                                    <p>2018 | 43 | JPN</p>
                                    <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                                    <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                                    <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slidee">
                    <div class="card-item">
                        <div class="trending-item">
                            <div class="trending-image">
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/about/img1.jpg" alt="" />
                                </a>
                            </div>
                            <div class="descr">
                                <h6 class="title2">
                                    <a href="/detail_lelang">
                                        Nike Air Jordan KW Super
                                    </a>
                                </h6>
                                <div class="meta-tags">
                                    <p>2018 | 43 | JPN</p>
                                    <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                                    <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                                    <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slidee">
                    <div class="card-item">
                        <div class="trending-item">
                            <div class="trending-image">
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/blog/img-1.jpg" alt="" />
                                </a>
                            </div>
                            <div class="descr">
                                <h6 class="title2">
                                    <a href="/detail_lelang">
                                        Nike Air Jordan KW Super
                                    </a>
                                </h6>
                                <div class="meta-tags">
                                    <p>2018 | 43 | JPN</p>
                                    <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                                    <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                                    <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slidee">
                    <div class="card-item">
                        <div class="trending-item">
                            <div class="trending-image">
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/about/about.jpg" alt="" />
                                </a>
                            </div>
                            <div class="descr">
                                <h6 class="title2">
                                    <a href="/detail_lelang">
                                        Nike Air Jordan KW Super
                                    </a>
                                </h6>
                                <div class="meta-tags">
                                    <p>2018 | 43 | JPN</p>
                                    <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                                    <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                                    <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slidee">
                    <div class="card-item">
                        <div class="trending-item">
                            <div class="trending-image">
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/about/about.jpg" alt="" />
                                </a>
                            </div>
                            <div class="descr">
                                <h6 class="title2">
                                    <a href="/detail_lelang">
                                        Nike Air Jordan KW Super
                                    </a>
                                </h6>
                                <div class="meta-tags">
                                    <p>2018 | 43 | JPN</p>
                                    <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                                    <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                                    <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navigation" style="text-align: center; margin-top: 15px;">
                <!-- <button class="prev-btn" style="margin-right: 5px;"><i class="fa-solid fa-arrow-left"></i></button>
                    <button class="next-btn"><i class="fa-solid fa-arrow-right"></i></button> -->
            </div>
        </div>
    </section>


    


    <div class="modal fade" id="bidModal" tabindex="-1" role="dialog" aria-labelledby="bidModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bidModalLabel">Lelang {{ $detail_barang->nama_barang }}</h5>
                </div>
                <div class="modal-body">
                    <!-- Isi modal di sini -->
                    <div class="form-group">
                        <label for="bid_minimal">Harga Barang</label>
                        <input type="text" class="form-control" id="bid_minimal" name="bid_minimal"
                            value="{{ $detail_barang['harga_barang'] }}" readonly>
                    </div>
                    <form action="{{ route('submit_bid', ['id_barang' => $detail_barang->id_barang]) }}" method="POST"
                        id="bidForm">
                        @csrf
                        <input type="hidden" name="id_barang" value="{{ $detail_barang->id_barang }}">
                        <input type="hidden" name="status" value="Diproses">
                        <input type="hidden" name="nik" value="{{ auth()->user()->nik }}">
                        <div class="form-group">
                            <label for="bid_minimal">Kelipatan</label>
                            <input type="text" class="form-control" id="kelipatan" name="kelipatan"
                                value="{{ $detail_barang['kelipatan'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="harga_bid">Nominal Bid:</label>
                            <input type="text" class="form-control" id="harga_bid" name="harga_bid" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Ikuti Lelang</button>
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
                        'Nominal Lelang tidak boleh kurang dari Harga Barang atau tidak sesuai dengan kelipatan yang ditentukan!'
                    );
                }
            });
        });
    </script>

<link href="{{ asset('assets/css/detail.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.min.js"></script>
<script src="{{ asset('assets/js/detail.js') }}"></script>
@endsection
