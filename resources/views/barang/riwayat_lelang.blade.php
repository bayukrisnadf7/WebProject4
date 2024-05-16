@extends('partials.template')
@section('content')

@foreach ($barang as $item)
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
@endforeach
@endsection