@extends('partials.template')
@section('content')
    <div class="container mt-5">
        <h1>Data Barang</h1>
        <div class="row">
            @foreach($barang as $item)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div id="carousel{{ $item->id }}" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel{{ $item->id }}" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel{{ $item->id }}" data-slide-to="1"></li>
                                <li data-target="#carousel{{ $item->id }}" data-slide-to="2"></li>
                                <li data-target="#carousel{{ $item->id }}" data-slide-to="3"></li>
                                <li data-target="#carousel{{ $item->id }}" data-slide-to="4"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ Storage::url($item->nama_barang) }}" class="d-block w-100" alt="Foto 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ Storage::url($item->foto2) }}" class="d-block w-100" alt="Foto 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ Storage::url($item->foto3) }}" class="d-block w-100" alt="Foto 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ Storage::url($item->foto4) }}" class="d-block w-100" alt="Foto 4">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ Storage::url($item->foto5) }}" class="d-block w-100" alt="Foto 5">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel{{ $item->id }}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel{{ $item->id }}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $item->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection