<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Silelang</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Icon -->
    <link href="{{ asset('assets/fonts/line-icons.css') }}" rel="stylesheet">
    <!-- Slicknav -->
    <link href="{{ asset('assets/css/slicknav.css') }}" rel="stylesheet">
    <!-- Nivo Lightbox -->
    <link href="{{ asset('assets/css/nivo-lightbox.css') }}" rel="stylesheet">
    <!-- Animate -->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <!-- Main Style -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <!-- Style -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Trending -->
    <link href="{{ asset('assets/css/live.css') }}" rel="stylesheet">
    <!-- Kategori -->
    <link href="{{ asset('assets/css/kategori.css') }}" rel="stylesheet">
    <!-- Responsive Style -->
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>
    
<body>
    <header>
        
    @include('layouts.navbar')

    @yield('content')

    </header>

    @include('layouts.footer')

    <script src="{{ asset('assets/js/jquery-min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/nivo-lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/live.js') }}"></script>
    <script src="{{ asset('assets/js/kategori.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>