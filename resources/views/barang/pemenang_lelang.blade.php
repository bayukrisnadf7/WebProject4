@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>


    <div class="container" style="margin-top: 120px">
        <h2 style="text-align: center; color: #35755D;">PILIH PEMENANG LELANG</h2>
        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Harga Lelang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($list_pelelang as $item)
                            <tbody>
                                <td>{{ $item->user->nama }}</td>
                                <td>{{ $item->harga_bid }}</td>
                                <td>
                                    <form
                                        action="{{ route('pemenang.lelang.barang', ['nik' => $item->nik, 'id_barang' => $item->id_barang]) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Pemenang</button>
                                    </form>
                                    <form
                                        action="{{ route('tolak.lelang.barang', ['nik' => $item->nik, 'id_barang' => $item->id_barang]) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Tolak</button>
                                    </form>
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
