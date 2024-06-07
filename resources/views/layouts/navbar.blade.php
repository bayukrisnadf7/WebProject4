<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar"
                aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="icon-menu"></span>
                <span class="icon-menu"></span>
                <span class="icon-menu"></span>
            </button>
            <a href="/" class="navbar-brand"><img src="{{ asset('assets/img/logoa.png') }}" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
            <div class="search">
                <form action="{{ route('barang.search') }}" method="GET">
                    <input type="text" name="keyword" class="searchTerm" placeholder="Cari Barang Disini">
                </form>
            </div>
            <ul class="navbar-nav mr-auto w-100 justify-content-end" style="font-weight: bold;">
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/prosedur">
                        Prosedur
                    </a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @php
                                $name = auth()->user()->nama;
                                $words = explode(' ', $name);
                                $shortName = implode(' ', array_slice($words, 0, 2));
                            @endphp
                            {{ $shortName }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li><a class="dropdown-item" href="/riwayat_lelang">Riwayat Lelang</a></li>
                            <li><a class="dropdown-item" href="/notifikasi">Notifikasi</a></li>
                            <li><a class="dropdown-item" href="/transaksi">Transaksi</a></li>
                            @if (auth()->user()->status == 1)
                                <li><a class="dropdown-item" href="/pengajuan">Pengajuan Menjadi Lelang</a></li>
                            @endif
                            @if (auth()->user()->status == 2)
                                <li><a class="dropdown-item" href="/upload_barang">Pengajuan Barang</a></li>
                                <li><a class="dropdown-item" href="/riwayat_lelang_barang">Riwayat Lelang Barang</a></li>
                            @endif
                            <li>
                                <form action="/logout" method="post" id="logoutForm">
                                    @csrf
                                    <button type="button" class="dropdown-item" onclick="confirmLogout()">Logout</button>
                                </form>                                
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                    </li>
                    @else
                    <form class="form-inline my-2 my-lg-0 ml-4 custom-login-form">
                        <a href="/register" class="btn btn-outline-success my-2 my-sm-0 custom-daftar-button"
                            type="submit">Daftar</a>
                    </form>
                    <li class="nav-item mt-2">
                        <form class="form-inline my-2 my-lg-0 ml-auto custom-login-form">
                            <a href="/login" class="btn btn-outline-success my-2 my-sm-0 custom-login-button">Masuk</a>
                        </form>

                    </li>
                @endauth
               
            </ul>

        </div>
    </div>

    <!-- Mobile Menu Start -->
    <ul class="mobile-menu">
        <li>
            <a class="page-scrool" href="#header-wrap">Beranda</a>
        </li>
        <li>
            <a class="page-scrool" href="#about">Prosedur</a>
        </li>
        <li>
            <a class="page-scroll" href="#schedules">Masuk</a>
        </li>
        <li>
            <a class="page-scroll" href="#team">Daftar</a>
        </li>
    </ul>
    <!-- Mobile Menu End -->
</nav>
<!-- Navbar End -->
<script>
    function confirmLogout() {
        if (confirm('Apakah Anda yakin ingin logout?')) {
            document.getElementById('logoutForm').submit();
        }
    }
</script>

