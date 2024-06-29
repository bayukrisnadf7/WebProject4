@extends('layouts.template')

@section('content')
    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
    @endphp
    <!-- trending -->
    <section class="section-padding" style="padding-left: 50px; padding-right: 50px;">
        <div class="container" style="margin-top: 50px;">
            <h5 style="margin-bottom: 15px; position: relative; font-weight: bold; ">Kategori Otomotif</h5>
            @if ($barang->isEmpty())
                <p style="text-align: center; font-weight: bold; font-size: 20px; color: grey; margin-top: 40px">Barang tidak tersedia</p>
            @else
                <div class="row" id="product-list">
                    @foreach ($barang as $item)
                        <div class="col-lg-3 col-md-4 col-6 px-2 mb-4">
                            <div class="card-item">
                                <div class="kategoribarang-item">
                                    <div class="kategoribarang-image">
                                        <a href="/detail_barang/{{ $item->id_barang }}" class="detail-link">
                                            <img class="img-fluid"
                                                src="{{ asset($item->foto_barang) }}"
                                                alt="" />
                                        </a>
                                    </div>
                                    <div class="descr3">
                                        <h6 class="title4">
                                            <a href="/detail_barang/{{ $item->id_barang }}">
                                                {{ $item->nama_barang }}
                                            </a>
                                        </h6>
                                        <div class="meta-tags3">
                                            <p>2018 | 43 | JPN</p>
                                            <p style="color: #35755D; font-weight: bolder;">Rp {{ $item->harga_barang }}</p>
                                            <p><i class="fa-regular fa-calendar-days"></i>
                                                {{ Carbon::parse($item->tgl_publish)->translatedFormat('d F Y H:i') }} WIB
                                            </p>
                                            <p><i class="fa-solid fa-location-dot"></i> {{ $item->kota }}
                                                {{ $item->provinsi }}</p>
                                            <p style="margin-top: 5px;">Akan Dimulai</p>
                                            <div class="countdown-timer" id="countdown-timer-1" style="margin-top: -30px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.detail-link');
            links.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default link action
                    fetch('/check-auth')
                        .then(response => response.json())
                        .then(data => {
                            if (data.authenticated) {
                                window.location.href = link.href; // Redirect if authenticated
                            } else {
                                showAlert();
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });

        function showAlert() {
            if (confirm('Harap Login Terlebih Dahulu')) {
                window.location.href = '/login';
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.min.js"></script>


    <link href="{{ asset('assets/css/kategoribarang.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/kategoribarang.js') }}"></script>
@endsection
