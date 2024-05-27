@extends('layouts.template')
@section('content')
    <h2 style="text-align: center; margin-top: 105px; color:#35755D;">BUKTI PEMBAYARAN</h2>
    <div class="card container card-custom p-5" style="margin: auto; max-width: 1000px; margin-top: 20px">
        <div class="card">
            <div class="card-body" style="">
                <div class="image" style="display: flex; justify-content: center">
                    <img src="{{ asset('public/bukti_transfer/' . $buktiPembayaran->foto_transfer) }}" alt="Gambar Utama" >
                </div>
                <div class="button" style="display: flex; justify-content: center; margin-top: 20px; gap: 20px">
                    <form action="{{ route('pembayaran.diterima', $buktiPembayaran->id_pembayaran) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Terima</button>
                    </form>
                    <form action="{{ route('pembayaran.ditolak', $buktiPembayaran->id_pembayaran) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
