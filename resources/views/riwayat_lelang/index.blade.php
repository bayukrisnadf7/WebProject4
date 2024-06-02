@extends('layouts.template')
@section('content')
    <h2 style="text-align: center; margin-top: 105px; color:#35755D;">RIWAYAT LELANG</h2>
    <div class="card container card-custom p-5" style="margin: auto; max-width: 1000px; margin-top: 20px">
        @if ($riwayat_lelang->isEmpty())
            <p style="text-align: center; font-weight: bold; font-size: 20px; color: grey; margin-top: 175px">Riwayat lelang
                tidak
                ada</p>
        @else
            @foreach ($riwayat_lelang as $item)
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4"> <!-- Menggunakan 4 kolom untuk gambar -->
                                <img class="img-fluid"
                                    src="{{ asset('img/public/storage/barang/' . $item->barang->foto_barang) }}"
                                    alt="" />
                            </div>
                            <div class="col-md-8"> <!-- Menggunakan 8 kolom untuk data $item -->
                                <h5 class="card-title">{{ $item->barang->nama_barang }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $item->harga_bid }}</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the
                                    card's content.</p>
                                    @if ($item->status == 'Diproses')
                                        <p class="card-text">Menunggu pengumuman</p>
                                    @elseif ($item->status == 'Kalah')
                                        <p class="card-text">Kalah dalam lelang</p>
                                    @elseif ($item->status == 'Pemenang')
                                        <p class="card-text">Menang dalam lelang</p>
                                    @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    @endif
@endsection
