@extends('layouts.template')
@section('content')
    @foreach ($notifikasi as $item)
        <div class="card" style="margin-top: 300px">
            <div class="d-flex">
                <p>{{ $item->pesan }}</p>
                {{-- <p>{{ $item->waktu }}</p> --}}
            </div>
        </div>
    @endforeach
@endsection
