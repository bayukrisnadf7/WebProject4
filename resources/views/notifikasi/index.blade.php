@extends('partials.template')
@section('content')
    @foreach ($notifikasi as $item)
        <div class="card">
            <p>{{ $item->pesan }}</p>
        </div>
    @endforeach
@endsection
