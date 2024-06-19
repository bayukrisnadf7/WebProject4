@extends('layouts_admin.template')
@section('content')
    <div class="mb-5">
        <h4>Pengajuan Lelang</h4>
    </div>
    <div class="bottom-data">
        <div class="col-12"> <!-- Menggunakan col-12 untuk konten tabel -->
            {{-- <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Foto KTP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataUser as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td><img src="{{ asset('/public/ktp/'.$item->foto) }}"
                                alt="Foto" style="max-width: 300px; max-height: 300px;"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        {{-- <h5 class="card-title mb-3">Detail Rekening</h5> --}}
                        <p class="card-text">
                            <strong>Bank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                            </strong>{{ $dataPengajuan->bank }}</p>
                        <p class="card-text"><strong>Nomor Rekening &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                            </strong>{{ $dataPengajuan->no_rek }}</p>
                        <p class="card-text"><strong>Foto
                                Muka&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                            </strong></p>
                        <img src="{{ asset('/img/public/foto_muka/' . $dataPengajuan->foto_muka) }}" class="img-fluid"
                            alt="Scan KTP" width="400px">
                        <div class="mt-3" style="display: flex; gap: 20px;">
                            <form action="{{ route('terima.pengajuan', $dataPengajuan->id_pengajuan) }}" method="POST">
                                @csrf
                                <button style="width: 120px" type="submit" class="btn btn-success mt-3">Terima</button>
                            </form>
                            <form action="{{ route('tolak.pengajuan', $dataPengajuan->id_pengajuan) }}" method="POST">
                                @csrf
                                <button style="width: 120px" type="submit" class="btn btn-danger mt-3">Tolak</button>
                            </form>
                            <a href="/pengajuan_lelang" class="btn btn-secondary mt-3" style="width: 120px;">Kembali</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
