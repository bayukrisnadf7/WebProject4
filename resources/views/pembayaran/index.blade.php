@extends('layouts.template')
@section('content')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script> --}}
    <h2 style="text-align: center; margin-top: 105px; color:#35755D;">RIWAYAT TRANSAKSI</h2>
    <div class="container" style="margin-top: 20px;">
        <div class="card container card-custom p-5" style="margin: auto; max-width: 1000px; margin-top: 20px">
            @if ($barang->isEmpty())
                <div class="empty" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <img src="assets/img/9276421.jpg" alt="" width="200px" height="200px">
                    <p style="font-weight: bold; font-size: 20px; color: grey;">Tidak ada transaksi</p>
                </div>
            @else
                @foreach ($barang as $item)
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"> <!-- Menggunakan 4 kolom untuk gambar -->
                                    <img class="img-fluid"
                                        src="{{ asset($item->barang->foto_barang) }}"
                                        alt="" />
                                </div>
                                <div class="col-md-8"> <!-- Menggunakan 8 kolom untuk data $item -->
                                    <h5 class="card-title">{{ $item->barang->nama_barang }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $item->harga_bid }}</h6>
                                    <p class="card-text">Pemilik Barang: {{ $item->barang->user->nama }}</p>
                                    <p class="card-text">Nomer Telepon Pemilik: {{ $item->barang->user->nohp }}</p>
                                    <p class="card-text">Harga Pembelian: {{ $item->harga_bid }}</p>
                                    @if ($item->pembayaran)
                                        @if ($item->pembayaran->status_pembayaran == 'Diterima')
                                            <p class="card-text">Status Pembayaran: Transaksi Selesai</p>
                                        @elseif($item->pembayaran->status_pembayaran == 'Ditolak')
                                            <p class="card-text">Status Pembayaran: Transaksi Dibatalkan</p>
                                        @elseif($item->pembayaran->status_pembayaran == 'Diproses')
                                            <p class="card-text">Status Pembayaran: Transaksi Diproses</p>
                                        @else
                                            <a href="/pembayaran/{{ $item->barang->id_barang }}" class="btn btn-primary" style="width: 150px">Bayar</a>
                                        @endif
                                    @else
                                        <a href="/pembayaran/{{ $item->barang->id_barang }}" class="btn btn-primary" style="width: 150px">Bayar</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>    
    <script>
        new DataTable('#example');
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
