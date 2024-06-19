<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <script src="admin/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="admin/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" href="{{ asset('admin/style.css') }}">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="fixed-sidebar">
            <!-- ======== Content For Sidebar ========-->
            <div class="d-flex flex-column h-100">
                <div class="sidebar-logo text-center">
                    <a href="#"> SiLelang</a>
                </div>
                <ul class="sidebar-nav flex-grow-1">
                    <li class="sidebar-item">
                        <a href="/halaman_admin" class="sidebar-link">
                            <i class="fa-solid fa-gauge pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/user" class="sidebar-link">
                            <i class="fa-solid fa-user-tie pe-2"></i>
                            User
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/barang" class="sidebar-link">
                            <i class="fa-solid fa-user-graduate pe-2"></i>
                            Barang
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/pengajuan_barang" class="sidebar-link">
                            <i class="fa-solid fa-chalkboard pe-2"></i>
                            Pengajuan Barang
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/pengajuan_lelang" class="sidebar-link">
                            <i class="fa-solid fa-book pe-2"></i>
                            Pengajuan Lelang
                        </a>
                    </li>
                </ul>
                <ul class="sidebar-nav">
                    <li class="sidebar-item mt-auto">
                        <form action="/logout" method="POST" id="logoutForm" class="w-100" style="margin-top: 400px">
                            @csrf
                            <a href="#" class="sidebar-link" onclick="confirmLogout(); return false;">
                                <i class="fa-solid fa-book pe-2"></i>
                                Logout
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="main">
            <main class="content px-3 py-2 mt-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script>
        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                document.getElementById('logoutForm').submit();
            }
        }

        // Initialize DataTable
        new DataTable('#example');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>
