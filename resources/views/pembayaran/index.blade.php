@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>


    <div class="container" style="margin-top: 120px">
        <h2 style="text-align: center; color: #35755D;">TRANSAKSI</h2>
        @if (session()->has('successBayar'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                {{ session('successBayar') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="errorAlert">
                {{ session('error') }}
            </div>
        @endif
        <div class="card mt-4">
            <div class="card-body">
                @if ($barang->isEmpty())
                <div class="empty" style="  display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;">
                    <img src="assets/img/9276421.jpg" alt="" width="200px" height="200px">
                    <p style="font-weight: bold; font-size: 20px; color: grey;">Tidak
                        ada transaksi</p>
                </div>
                @else
                    <div class="table-responsive">

                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align: left;">Nama Barang</th>
                                    <th style="text-align: left;">Pemilik Barang</th>
                                    <th style="text-align: left;">Nomer Telepon Pemilik</th>
                                    <th style="text-align: left;">Harga Pembelian</th>
                                    <th style="text-align: left;">Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $item)
                                    <tr>
                                        <td style="text-align: left;">{{ $item->barang->nama_barang }}</td>
                                        <td style="text-align: left;">{{ $item->barang->user->nama }}</td>
                                        <td style="text-align: left;">{{ $item->barang->user->nohp }}</td>
                                        <td style="text-align: left;">{{ $item->harga_bid }}</td>
                                        <td style="text-align: left;">
                                            @if ($item->pembayaran)
                                                @if ($item->pembayaran->status_pembayaran == 'Diterima')
                                                    Transaksi Selesai
                                                @elseif($item->pembayaran->status_pembayaran == 'Ditolak')
                                                    Transaksi Dibatalkan
                                                @elseif($item->pembayaran->status_pembayaran == 'Diproses')
                                                    Transaksi diproses
                                                @else
                                                    <a href="/pembayaran/{{ $item->barang->id_barang }}" class="btn btn-primary" style="width: 150px">Bayar</a>
                                                @endif
                                            @else
                                                <a href="/pembayaran/{{ $item->barang->id_barang }}" class="btn btn-primary" style="width: 150px">Bayar</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                @endif

            </div>
        </div>
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
