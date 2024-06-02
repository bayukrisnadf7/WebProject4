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
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 500px;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 500px;">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    @if ($barang->isEmpty())
                        <p style="text-align: center; font-weight: bold; font-size: 20px; color: grey; margin-top: 20px">Tidak
                            ada transaksi</p>
                    @else
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Pemilik Barang</th>
                                    <th>Nomer Telepon Pemilik</th>
                                    <th>Harga Pembelian</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>
                            @foreach ($barang as $item)
                                <tbody>
                                    <td>{{ $item->barang->nama_barang }}</td>
                                    <td>{{ $item->barang->user->nama }}</td>
                                    <td>{{ $item->barang->user->nohp }}</td>
                                    <td>{{ $item->harga_bid }}</td>
                                    <td>
                                        {{-- @if ($item->pembayaran->status_pembayaran == 'Diproses')
                                            Sudah Dibayar
                                        @else --}}
                                            <a href="/pembayaran/{{ $item->barang->id_barang }}"
                                                class="btn btn-primary">Bayar</a>
                                        {{-- @endif --}}
                                    </td>
                                </tbody>
                            @endforeach
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>



    <script>
        new DataTable('#example');
    </script>
@endsection
