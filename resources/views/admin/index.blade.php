@extends('layouts_admin.template')
@section('content')
    <div class="content-fluid">
        <div class="mb-5">
            <h4>Dashboard</h4>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card flex-fill border-0 custom-card-blue">
                    <div class="card-body position-relative">
                        <i class="fas fa-house fa-3x"></i>
                        <p class="card-title">
                            {{ $jumlah_barang }}
                        </p>
                        <h6 class="card-text">Jumlah Barang</h6>
                    </div>
                    <div class="custom-bg-primary"></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card flex-fill border-0 custom-card-green">
                    <div class="card-body">
                        <i class="fa-solid fa-book-open  fa-3x"></i>
                        <p class="card-title">
                            {{ $jumlah_user }}
                        </p>
                        <h6 class="card-text">Jumlah User</h6>
                    </div>
                    <div class="custom-bg-success"></div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card flex-fill border-0 custom-card-yellow">
                    <div class="card-body">
                        <i class="fa-solid fa-users fa-3x"></i>
                        <p class="card-title">
                            {{ $jumlah_pelelang }}
                        </p>
                        <h6 class="card-text">Jumlah Pelelang</h6>
                    </div>
                    <div class="custom-bg-warning"></div>
                </div>
            </div>
        </div>
        {{-- table content --}}
        <div class="card flex-fill card border-0 mt-2">
            <div class="card-header mt-2" style="background-color: #FFFFFF;">
                <h6>User</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead class="custom-header">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
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
    </div>
@endsection
