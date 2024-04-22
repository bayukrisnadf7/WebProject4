@extends('partials.template')
@section('content')
    <div class="card p-2">
        <h4>{{ $detail_barang['nama_barang'] }}</h4>
        <h6>Author : {{ $detail_barang['harga_barang'] }}</h6>
        <p>
            {{ $detail_barang['tgl_publish'] }}
        </p>
        <a href="/">Back to Posts</a>
    </div>
@endsection
