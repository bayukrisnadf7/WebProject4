@extends('layouts_admin.template')
@section('content')
    <div class="content">
        <div class="mb-5">
            <h4>Pengajuan Barang</h4>
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
                            <th>Tanggal Publish</th>
                            <th>Tanggal Expired</th>
                            <th>Status</th>
                            <th>NIK</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan_barang as $item)
                            <tr>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->kategori_barang }}</td>
                                <td>{{ $item->tgl_publish }}</td>
                                <td>{{ $item->tgl_expired }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="/seleksi_pengajuan_barang/{{ $item->id_barang }}">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
