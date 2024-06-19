@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>

    <div class="container" style="margin-top: 120px">

        <h2 style="text-align: center; color: #35755D;">RIWAYAT LELANG BARANG</h2>
        <div class="card mt-4">
            <div class="card-body">
                @if (session()->has('successPembayaran'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                        {{ session('successPembayaran') }}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                @endif
                @if ($barang->isEmpty())
                    <div class="empty"
                        style="  display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;">
                        <img src="assets/img/9276421.jpg" alt="" width="200px" height="200px">
                        <p style="font-weight: bold; font-size: 20px; color: grey;">Tidak
                            ada notifikasi</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori Barang</th>
                                    <th>Kota</th>
                                    <th>Provinsi</th>
                                    <th>Harga Barang</th>
                                    <th>Kelipatan</th>
                                    <th>Foto Barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: left;"> <!-- Pindahkan <tbody> ke luar dari loop -->
                                @foreach ($barang as $index => $item)
                                    <tr> <!-- Tambahkan tag <tr> di dalam loop -->
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->kategori_barang }}</td>
                                        <td>{{ $item->kota }}</td>
                                        <td>{{ $item->provinsi }}</td>
                                        <td>{{ $item->harga_barang }}</td>
                                        <td>{{ $item->kelipatan }}</td>
                                        <td>
                                            <img src="{{ asset($item->foto_barang) }}"
                                                alt="Foto Barang" style="max-width: 100px; max-height: 100px;">
                                        </td>
                                        <td>
                                            @php
                                                $pembayaranDiterima = false;
                                                $pembayaranDiproses = false;
                                                $pemenangDitemukan = false;

                                                foreach ($item->pembayaran as $pembayaran) {
                                                    if ($pembayaran->status_pembayaran == 'Diterima') {
                                                        $pembayaranDiterima = true;
                                                        break;
                                                    } elseif ($pembayaran->status_pembayaran == 'Diproses') {
                                                        $pembayaranDiproses = true;
                                                    }
                                                }

                                                foreach ($item->bids as $bid) {
                                                    if ($bid->status == 'Pemenang') {
                                                        $pemenangDitemukan = true;
                                                        break;
                                                    }
                                                }
                                            @endphp

                                            @if ($pembayaranDiterima)
                                                Transaksi Selesai
                                            @elseif ($pembayaranDiproses)
                                                <a href="/lihat_pembayaran/{{ $idPembayaranByBarang[$item->id_barang] }}"
                                                    class="btn btn-primary">Lihat Pembayaran</a>
                                            @elseif ($pemenangDitemukan)
                                                Tunggu Pembayaran
                                            @else
                                                <a href="/pilih_pemenang/{{ $item->id_barang }}"
                                                    class="btn btn-primary">Pilih Pemenang</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

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
