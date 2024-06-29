@extends('layouts_admin.template')
@section('content')
    <div class="mb-5">
        <h4>Pengajuan Barang</h4>
    </div>
    <div class="bottom-data">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        {{-- <h5 class="card-title mb-3">Detail Rekening</h5> --}}
                        <p class="card-text">
                            <strong>Nama Barang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                            </strong>{{ $barang->nama_barang }}
                        </p>
                        <p class="card-text"><strong>Kategori Barang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                            </strong>{{ $barang->kategori_barang }}</p>
                        <p class="card-text"><strong>Kelipatan
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                            </strong>{{ $barang->kelipatan }}</p>
                        <p class="card-text"><strong>Tanggal Publish &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                            </strong>{{ $barang->tgl_publish }}</p>
                        <div class="d-flex" style="gap: 40px" style="flex-wrap: nowwrap; width: 400px">
                            <div class="wrapper" style="flex-direction: column">
                                <p class="card-text"><strong>Foto Barang
                                    </strong></p>
                                <img src="{{ asset($barang->foto_barang) }}" class="img-fluid" alt="Scan KTP"
                                    width="200px">
                            </div>
                            <div class="wrapper" style="flex-direction: column">
                                <p class="card-text"><strong>Foto Barang Depan
                                    </strong></p>
                                <img src="{{ asset($barang->foto_barang_depan) }}" class="img-fluid" alt="Scan KTP"
                                    width="200px">
                            </div>
                            <div class="wrapper" style="flex-direction: column">
                                <p class="card-text"><strong>Foto Barang Belakang
                                    </strong></p>
                                <img src="{{ asset($barang->foto_barang_belakang) }}" class="img-fluid" alt="Scan KTP"
                                    width="200px">
                            </div>
                            <div class="wrapper" style="flex-direction: column">
                                <p class="card-text"><strong>Foto Barang Kiri

                                    </strong></p>
                                <img src="{{ asset($barang->foto_barang_kiri) }}" class="img-fluid" alt="Scan KTP"
                                    width="200px">
                            </div>
                            <div class="wrapper" style="flex-direction: column">
                                <p class="card-text"><strong>Foto Barang Kanan
                                    </strong></p>
                                <img src="{{ asset($barang->foto_barang_kanan) }}" class="img-fluid" alt="Scan KTP"
                                    width="200px">
                            </div>
                        </div>
                        <div class="mt-3" style="display: flex; gap: 20px;">
                            <form action="{{ route('terima.pengajuan.barang', $barang->id_barang) }}" method="POST">
                                @csrf
                                <button style="width: 120px" type="submit" class="btn btn-success mt-3">Terima</button>
                            </form>
                            <form action="{{ route('tolak.pengajuan.barang', $barang->id_barang) }}" method="POST">
                                @csrf
                                <button style="width: 120px" type="submit" class="btn btn-danger mt-3">Tolak</button>
                            </form>
                            <a href="/pengajuan_barang" class="btn btn-secondary mt-3" style="width: 120px;">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
