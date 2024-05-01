@extends('partials.template')
@section('content')

@foreach ($riwayat_bid as $item)
<div class="card">
    <h4> ID BARANG : {{ $item->id_barang }}</h4>
    <h4> ID BARANG : {{ $item->harga_bid }}</h4>
</div>
    
@endforeach
@endsection