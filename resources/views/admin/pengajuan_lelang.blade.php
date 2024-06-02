<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="admin/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <title>Pengajuan Lelang</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo" style="margin-top: 5px; display: flex; justify-content: center">
            {{-- <i class='bx bx-code-alt'></i> --}}
            {{-- <img src="assets/img/logoa.png" alt=""> --}}
            <div class="logo-name"><span>Si</span>Lelang</div>
        </a>
        <ul class="side-menu">
            <li class=""><a href="/halaman_admin"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li class="active"><a href="/pengajuan_lelang"><i class='bx bx-store-alt'></i>Pengajuan Lelang</a></li>
            <li class=""><a href="/pengajuan_barang"><i class='bx bx-analyse'></i>Pengajuan Barang</a></li>
            {{-- <li><a href="#"><i class='bx bx-message-square-dots'></i>Tickets</a></li>
            <li><a href="#"><i class='bx bx-group'></i>Users</a></li>
            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li> --}}
        </ul>
        <ul class="side-menu" style="position: absolute; bottom: 0;">
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
                    @if (session()->has('successPengajuan'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert"
                            style="width: 100$;">
                            {{ session('successPengajuan') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Ajukan</th> <!-- Kolom aksi tambahan -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPengajuan as $item)
                                <tr>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->user->nama }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-warning"
                                                href="/seleksi_pengajuan/{{ $item->id_pengajuan }}">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </main>

    </div>
    <script>
        new DataTable('#example');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>
