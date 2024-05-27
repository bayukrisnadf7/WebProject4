@extends('layouts.template')
@section('content')
    @foreach ($riwayat_lelang as $item)
        <div class="card" style="width:18rem; margin-top: 150px">
          <div class="card-body">
            <h5 class="card-title">{{ $item->barang->nama_barang }}</h5>
            <h6 class="card-subtitle mb-2 text-muted ">{{ $item->harga_bid }}</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            b5
          </div>
        </div>
    @endforeach
@endsection