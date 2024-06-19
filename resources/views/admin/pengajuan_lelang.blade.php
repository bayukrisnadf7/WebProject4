@extends('layouts_admin.template')
@section('content')
    <div class="content">
        <div class="mb-5">
            <h4>Pengajuan Lelang</h4>
        </div>
        <div class="bottom-data">
            <div class="col-12"> <!-- Menggunakan col-12 untuk konten tabel -->
                @if (session()->has('successPengajuan'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                        style="width: 100$;">
                        {{ session('successPengajuan') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Ajukan</th> <!-- Kolom aksi tambahan -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPengajuan as $item)
                            <tr>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->user->nama }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-warning"
                                            href="/seleksi_pengajuan/{{ $item->id_pengajuan }}">
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
