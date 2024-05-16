<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('admin/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <title>Seleksi Pengajuan</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-code-alt'></i>
            <div class="logo-name"><span>Asmr</span>Prog</div>
        </a>
        <ul class="side-menu">
            <li><a href="/halaman_admin"><i class='bx bxs-dashboard '></i>Dashboard</a></li>
            <li class="active"><a href="/pengajuan_lelang"><i class='bx bx-store-alt'></i>Pengajuan Lelang</a></li>
            <li class=""><a href="/pengajuan_barang"><i class='bx bx-analyse'></i>Pengajuan Barang</a></li>
            <li><a href="#"><i class='bx bx-message-square-dots'></i>Tickets</a></li>
            <li><a href="#"><i class='bx bx-group'></i>Users</a></li>
            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <img src="images/logo.png">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Pengajuan Lelang</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Analytics
                            </a></li>
                        /
                        <li><a href="#" class="active">Shop</a></li>
                    </ul>
                </div>
            </div>
            <div class="bottom-data">
                <div class="col-12"> <!-- Menggunakan col-12 untuk konten tabel -->
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th> <!-- Kolom aksi tambahan -->
                                <th>Email</th> <!-- Kolom aksi tambahan -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataUser as $item)
                                <tr>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->tempat_lahir }}</td>
                                    <td>{{ $item->tanggal_lahir }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                {{-- <h5 class="card-title mb-3">Detail Rekening</h5> --}}
                                <p class="card-text">
                                    <strong>Bank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    </strong>{{ $dataPengajuan->bank }}</p>
                                <p class="card-text"><strong>Nomor Rekening &nbsp;&nbsp;&nbsp;:
                                    </strong>{{ $dataPengajuan->no_rek }}</p>
                                <p class="card-text"><strong>Scan
                                        KTP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    </strong></p>
                                <img src="{{ asset('/img/public/scan_ktp/' . $dataPengajuan->scan_ktp) }}" class="img-fluid"
                                    alt="Scan KTP" width="400px">
                                <div class="mt-3" style="display: flex; gap: 20px;">
                                    <form action="{{ route('terima.pengajuan', $dataPengajuan->id_pengajuan) }}" method="POST">
                                        @csrf
                                        <button style="width: 120px" type="submit" class="btn btn-success mt-3">Terima</button>
                                    </form>
                                    <form action="{{ route('tolak.pengajuan', $dataPengajuan->id_pengajuan) }}" method="POST">
                                        @csrf
                                        <button style="width: 120px" type="submit" class="btn btn-danger mt-3">Tolak</button>
                                    </form>
                                    <a href="/pengajuan_lelang" class="btn btn-secondary mt-3" style="width: 120px;">Kembali</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        new DataTable('#example');
    </script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
