@extends('layouts_admin.template')
@section('content')
    <div class="content">
        <div class="mb-5">
            <h4>User</h4>
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
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Nomer Handphone</th>
                            <th>Foto</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->tempat_lahir }}</td>
                                <td>{{ $item->tanggal_lahir }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->nohp }}</td>
                                <td><img src="{{ asset('/public/ktp/'.$item->foto) }}"
                                    alt="Foto" style="max-width: 100px; max-height: 100px;"></td>
                                <td>{{ $item->email }}</td>
                                    @if ($item->status == 1)
                                        <td>User</td>
                                    @elseif($item->status == 2)
                                        <td>Pelelang</td>
                                    @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
