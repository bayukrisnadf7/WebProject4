<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="icon-menu"></span>
                <span class="icon-menu"></span>
                <span class="icon-menu"></span>
            </button>
            <a href="{{ url('/nopang')}}" class="navbar-brand"><img src="assets/img/logoa.png" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Cari Barang Disini">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>           
            <ul class="navbar-nav mr-auto w-100 justify-content-end" style="font-weight: bold;">
                <li class="nav-item">
                    <a href="/nopang" class="nav-link">
                    Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">
                    Prosedur
                    </a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 ml-4 custom-login-form">
                    <a href="{{ url('/daftar')}}" class="btn btn-outline-success my-2 my-sm-0 custom-daftar-button" type="submit">Daftar</a>
                </form>
                <form class="form-inline my-2 my-lg-0 ml-auto custom-login-form">
                    <a href="{{ url('/masuk') }}" class="btn btn-outline-success my-2 my-sm-0 custom-login-button">Masuk</a>
                </form>
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
