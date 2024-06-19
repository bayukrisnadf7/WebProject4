@extends('layouts.template')
@section('content')
    <h2 style="text-align: center; margin-top: 105px; color:#35755D;">PEMBAYARAN BARANG</h2>
    <div class="card container card-custom p-5" style="margin: auto; max-width: 1000px; margin-top: 20px">
        <div class="card">
            <div class="card-body">
                <div class="">
                    <p> Nama barang : {{ $barang->barang->nama_barang }}</p>
                    <p> Harga barang : {{ $barang->harga_bid }}</p>
                    @if ($pengajuan)
                        @foreach ($pengajuan as $item)
                            <p>Bank : {{ $item->bank }}</p>
                            <p>No rekening : {{ $item->no_rek }}</p>
                            @php
                                $countdownKey = 'targetTime_' . $barang->id_barang;
                                $storedTargetTime = isset($_COOKIE[$countdownKey])
                                    ? $_COOKIE[$countdownKey]
                                    : (new \DateTime())->modify('+1 day')->format('Y-m-d H:i:s');
                                echo '<p id="countdown_' . $barang->id_barang . '">Sisa waktu pembayaran: </p>';
                            @endphp
                        @endforeach
                    @else
                        <p>Data Pengajuan tidak tersedia.</p>
                    @endif
                    <form id="pembayaranForm" action="/pembayaran/{{ $barang->id_barang }} " method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 mt-3" style="display: flex; flex-direction :column ">
                            <label for="foto_transfer" class="form-label">Bukti Transfer</label>
                            <div id="gambar-container"></div>
                            <input type="file"
                                class="form-control @error('foto_transfer') is-invalid
                                @enderror mt-3"
                                name="foto_transfer" id="foto_transfer" accept="image/png, image/jpeg" required />
                            @error('foto_transfer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <p style="color: red">*pembayaran hanya dilakukan sekali, harap masukan bukti transfer yang
                                benar!</p>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Bayar Sekarang</button>
                    </form>
                    <script>
                        function startCountdown(id_barang) {
                            let countdownKey = 'targetTime_' + id_barang;
                            let storedTargetTime = getCookie(countdownKey);
                            let targetTime;
                            if (storedTargetTime) {
                                targetTime = new Date(storedTargetTime);
                            } else {
                                targetTime = new Date();
                                targetTime.setDate(targetTime.getDate() + 1);
                                setCookie(countdownKey, targetTime, 1); // Set cookie with expiry in 1 day
                            }

                            let timerInterval = setInterval(function() {
                                let now = new Date().getTime();
                                let distance = targetTime - now;
                                let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                let countdownElement = document.getElementById("countdown_" + id_barang);
                                countdownElement.textContent = "Sisa waktu pembayaran: " + days + "d " + hours + "h " + minutes +
                                    "m " + seconds + "s ";

                                if (distance <= 0) {
                                    clearInterval(timerInterval);
                                    countdownElement.textContent = "Anda Telah telat Membayar!";
                                    deleteCookie(countdownKey); // Remove the stored target time
                                }
                            }, 1000);
                        }

                        function setCookie(name, value, days) {
                            let expires = "";
                            if (days) {
                                let date = new Date();
                                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                                expires = "; expires=" + date.toUTCString();
                            }
                            document.cookie = name + "=" + value + expires + "; path=/";
                        }

                        function getCookie(name) {
                            let nameEQ = name + "=";
                            let ca = document.cookie.split(';');
                            for (let i = 0; i < ca.length; i++) {
                                let c = ca[i];
                                while (c.charAt(0) === ' ') {
                                    c = c.substring(1, c.length);
                                }
                                if (c.indexOf(nameEQ) === 0) {
                                    return c.substring(nameEQ.length, c.length);
                                }
                            }
                            return null;
                        }

                        function deleteCookie(name) {
                            document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                        }

                        // Call the function to start the countdown timer
                        startCountdown({{ $barang->id_barang }});
                    </script>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('submitBtn').addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah form dikirimkan secara otomatis
                if (confirm('Apakah data yang anda masukan sudah benar?')) {
                    document.getElementById('pembayaranForm').submit(); // Mengirimkan form jika konfirmasi "Yes"
                }
            });
        </script>
    @endsection
