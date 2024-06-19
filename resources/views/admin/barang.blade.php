@extends('layouts_admin.template')
@section('content')
    <div class="content">
        <div class="mb-5">
            <h4>Barang</h4>
        </div>
        <div class="bottom-data">
            <div class="col-12"> <!-- Menggunakan col-12 untuk konten tabel -->
                @if (session()->has('successPengajuan'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100$;">
                        {{ session('successPengajuan') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Kategori Barang</th>
                            <th>Kota</th>
                            <th>Provinsi</th>
                            <th>Harga Barang</th>
                            <th>Kelipatan</th>
                            <th>Tgl Publish</th>
                            <th>Tgl Expired</th>
                            <th>Foto Barang</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                            <tr>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->kategori_barang }}</td>
                                <td>{{ $item->kota }}</td>
                                <td>{{ $item->provinsi }}</td>
                                <td>{{ $item->harga_barang }}</td>
                                <td>{{ $item->kelipatan }}</td>
                                <td>{{ $item->tgl_publish }}</td>
                                <td>{{ $item->tgl_expired }}</td>
                                <td><img src="{{ asset($item->foto_barang) }}"
                                    alt="Foto" style="max-width: 100px; max-height: 100px;"></td>
                                <td>{{ $item->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
