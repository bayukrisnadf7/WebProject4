<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <form class="form-inline my-2 my-lg-0" style="display: flex; gap: 20px">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            </form>
            <div class="navbar-nav ms-auto" style="gap : 20px">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome, {{ auth()->user()->nama }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Riwayat Lelang</a></li>
                            <li><a class="dropdown-item" href="/notifikasi">Notifikasi</a></li>
                            @if (auth()->user()->status == 1)
                                <li><a class="dropdown-item" href="/pengajuan">Pengajuan Menjadi Lelang</a></li>
                            @endif
                            @if (auth()->user()->status == 2)
                                <li><a class="dropdown-item" href="/upload_barang">Upload Barang</a></li>
                                <li><a class="dropdown-item" href="/riwayat_lelang">Riwayat </a></li>
                            @endif
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                @else
                    <a class="nav-link" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                @endauth

            </div>

        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
