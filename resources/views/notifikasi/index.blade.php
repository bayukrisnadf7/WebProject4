@extends('partials.template')
@section('content')
@foreach ($notifikasi as $item)
    <div class="card">
        <div class="d-flex">
            <p>{{ $item->pesan }}</p>
            <p></p>
            <p>{{ $item->waktu }}</p>
        </div>
    </div>
@endforeach
<div class="list-group">
    @foreach ($notifikasi as $item)
            <a href="/detailnotif" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $item->id }}</h5>
                    <small>{{ $item->selisih_hari}} days ago</small>
                </div>
                <p class="mb-1">{{ $item->pesan }}</p>
                <small>{{ $item->nik }}</small>
            </a>
    @endforeach
</div>
@endsection