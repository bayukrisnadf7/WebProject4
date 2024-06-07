@extends('layouts.template')
@php
    use Carbon\Carbon;
    Carbon::setLocale('id');
@endphp
@section('content')
    <h2 style="text-align: center; margin-top: 105px; color:#35755D;">NOTIFIKASI</h2>
    <div class="card container card-custom p-5" style="margin: auto; max-width: 1000px; margin-top: 20px">
        @if ($notifikasi->isEmpty())
            <div class="empty"
                style="  display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;">
                <img src="assets/img/9276421.jpg" alt="" width="200px" height="200px">
                <p style="font-weight: bold; font-size: 20px; color: grey;">Tidak
                    ada notifikasi</p>
            </div>

            
        @else
            @foreach ($notifikasi as $item)
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between" style="gap: 20px">
                            <p class="mb-0">{{ $item->pesan }}</p>
                            {{ Carbon::parse($item->waktu)->translatedFormat('d F Y H:i') }} WIB
                            {{-- Uncomment the line below if you want to display the notification time --}}
                            {{-- <p class="mb-0">{{ $item->waktu }}</p> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
@endsection
