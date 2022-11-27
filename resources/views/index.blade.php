<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi Penjualan Barang</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h1 class="auth-title text-dark"><a href="/register" >Log in.</a></h1>
            <p class="auth-subtitle mb-5">Login menggunakan data email dan password.</p>

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
              </div>
            @endif

            <form action="/login" method="post">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>                      
                @enderror
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Log in</button>
            </form>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
                <img src="{{ asset('assets/images/bglogin.jpg') }}" alt="">
        </div>
    </div>
</div>

    </div>
</body>

</html>
