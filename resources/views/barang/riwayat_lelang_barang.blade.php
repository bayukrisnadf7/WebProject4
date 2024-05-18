@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>

{{-- @foreach ($barang as $item)
<div class="card" style="width: 200px">
    <img src="{{ asset('storage/barang/'.$item->foto_barang) }}" class="card-img-top" alt="..." width="100%" height="200px" style="object-fit: cover">
    <div class="card-body">
        <h5 class="card-title">{{ $item->nama_barang }}</h5>
        <h5 class="card-title">{{ $item->harga_barang }}</h5>
        <p>{{ $item->tgl_publish }}</p>
        <p>{{ $item->tgl_expired }}</p>
        <a href="/detail_barang/{{ $item->id }}" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
@endforeach --}}
<div class="container" style="margin-top: 120px">
    <h2 style="text-align: center; color: #35755D;">RIWAYAT LELANG BARANG</h2>
    <div class="card mt-4">
        <div class="card-body">            
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
                    @foreach ($barang as $index => $item)
                    <tbody>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->kategori_barang }}</td>
                        <td>{{ $item->kota }}</td>
                        <td>{{ $item->provinsi }}</td>
                        <td>{{ $item->harga_barang }}</td>
                        <td>{{ $item->kelipatan }}</td>
                        <td>
                            <img src="{{ asset('img/public/storage/barang/' . $item->foto_barang) }}" alt="Foto Barang"
                                style="max-width: 100px; max-height: 100px;">
                        </td>
                        <td>
                            <a href="/pilih_pemenang/{{ $item->id_barang }}" class="btn btn-primary">Pilih Pemenang</a>
                        </td>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>



<script>
    new DataTable('#example');
</script>

@endsection