@extends('partials.template')
@section('content')
    @foreach ($notifikasi as $item)
        <div class="card">
            <div class="d-flex">
                <p>{{ $item->pesan }}</p>
                <p>{{ $item->waktu }}</p>
            </div>
        </div>
    @endforeach
@endsection
