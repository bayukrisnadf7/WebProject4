@extends('layouts.template')
@section('content')
    <h2 style="text-align: center; margin-top: 105px; color:#35755D;">PEMBAYARAN BARANG</h2>
    <div class="card container card-custom p-5" style="margin: auto; max-width: 1000px; margin-top: 20px">
        <div class="card">
            <div class="card-body">
                <div class="">
                    <p>{{ $barang->barang->nama_barang }}</p>
                    <p>{{ $barang->harga_bid }}</p>
                    @if ($pengajuan)
                        @foreach ($pengajuan as $item)
                            <p>Bank: {{ $item->bank }}</p>
                            <p>No Rek: {{ $item->no_rek }}</p>
                            <!-- Display other relevant fields from PengajuanLelang -->
                        @endforeach
                    @else
                        <p>Data Pengajuan tidak tersedia.</p>
                    @endif
                    <form action="/pembayaran/{{ $barang->id_barang }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 mt-5" style="display: flex; flex-direction :column ">
                            <label for="foto_transfer" class="form-label">Bukti Transfer</label>
                            <div id="gambar-container"></div>
                            <input type="file"
                                class="form-control @error('foto_transfer') is-invalid
                                @enderror mt-3"
                                name="foto_transfer" id="foto_transfer" accept="image/png, image/jpeg" required />
                            @error('foto_transfer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
