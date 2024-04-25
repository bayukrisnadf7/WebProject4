@extends('partials.template')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 500px;">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/philip-strong-iOBTE2xsYko-unsplash.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/philip-strong-iOBTE2xsYko-unsplash.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/philip-strong-iOBTE2xsYko-unsplash.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- <h1>{{ auth()->user()->name }}</h1> --}}
    <div class="container mt-5" style="display: flex; justify-content: center">
        <div class="wrapper">
            @foreach ($barang as $item)
                <div class="card" style="width: 15rem;">
                    <img src="{{ asset('storage/img/barang/' . $item->foto_barang) }}" class="card-img-top" alt="..." width="100%" height="200px" style="object-fit: cover">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_barang }}</h5>
                        <h5 class="card-title">{{ $item->harga_barang }}</h5>
                        <p>{{ $item->tgl_publish }}</p>
                        <p>{{ $item->tgl_expired }}</p>
                        <a href="/detail_barang/{{ $item->id }}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
