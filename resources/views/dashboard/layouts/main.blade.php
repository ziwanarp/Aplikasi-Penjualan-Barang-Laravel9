<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Aplikasi Penjualan Barang</title>
    
    <link rel="stylesheet" href="{{ asset('/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="{{ asset('/assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('/assets/images/logo/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}"> --}}

</head>
<body>
@include('dashboard.layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
<div class="page-content">
    @yield('container')
</div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Ziwana Rizwan Pramudia</p>
                    </div>
                    <div class="float-end">
                        <p>Aplikasi Penjualan Barang</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <script src="{{ asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/js/app.js')}}"></script>
    
<!-- Need: Apexcharts -->
<script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/dashboard.js')}}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

{{-- sweet allerts --}}
{{-- <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/sweetalert2.js')}}"></script> --}}

</body>

</html>
