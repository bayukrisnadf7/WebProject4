@extends('layouts.template')
@section('content') 

<!-- DIV ATAS -->
<section class="section-padding" style="padding-left: 50px; padding-right: 50px;">
<div class="container-fluid" style="margin-top: 25px;">
    <div class="row">
        <div class="col-md-5 px-2">
            <div id="image-slider">
                <div class="main-image">
                    <!-- Gambar utama -->
                    <img src="/assets/img/img6.jpeg" alt="Gambar Utama" id="main-image">
                </div>
                <div class="thumbnail-images">
                    <!-- 4 gambar kecil -->
                    <img src="/assets/img/img6.jpeg" alt="Thumbnail 1" class="thumbnail" onclick="changeImage(this)">
                    <img src="/assets/img/about/img3.jpg" alt="Thumbnail 2" class="thumbnail" onclick="changeImage(this)">
                    <img src="/assets/img/about/about.jpg" alt="Thumbnail 3" class="thumbnail" onclick="changeImage(this)">
                    <img src="/assets/img/about/img1.jpg" alt="Thumbnail 4" class="thumbnail" onclick="changeImage(this)">
                    <img src="/assets/img/art/a1.jpg" alt="Thumbnail 4" class="thumbnail" onclick="changeImage(this)">
                </div>
            </div>
        </div>
        <div class="col-md-4 px-2">
            <!-- Konten deskripsi -->
            <div class="d-flex justify-content-between mb-4">
                <div>
                    <h1 class="h4">NIKE AIR JORDAN KW SUPER</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h6 class="text">Harga</h6>
                </div>
                <div class="col-md-9">
                    <h5 class="text" style="font-weight: bold;">Rp 341.000.000</h5>
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
                            <h6 class="text font-weight-normal">Pak Ramly</h6>
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
                            <h6 class="text-ibid-black1 font-weight-normal">13 Mei 2024 07:00 WIB</h6>
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
                            <h6 class="text-ibid-black1 font-weight-normal">Semarang</h6>
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
                            <h6 class="text" style="font-weight:bold;">Rp 100.000  </h6>
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
                            <h6 class="text-ibid-black1 font-weight-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia nisi in culpa dolores! Enim voluptas aperiam similique expedita fuga tenetur! Illo dignissimos voluptate corporis magnam laborum impedit repellendus incidunt accusamus.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 px-2">
            <div class="card-detail">
                <h1>PPPPPP</h1>
            </div>
        </div>
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


<link href="{{ asset('assets/css/detail.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.min.js"></script>
<script src="{{ asset('assets/js/detail.js') }}"></script>