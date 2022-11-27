<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Forbidden</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/error.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
</head>

<body>
    {{-- <div id="error"> --}}
        


    <div class="col-md-4 col-12 offset-md-4 mt-5">
        <div class="text-center">
            <img class="img-error" src="{{  asset('assets/images/samples/error-403.svg') }}" alt="Not Found">
            <h1 class="error-title mt-2">Forbidden</h1>
            <p class="fs-5 text-gray-600 mt-2">You are unauthorized to see this page.</p>
            <a href="/" class="btn btn-lg btn-outline-primary mt-2">Go Home</a>
        </div>
    </div>



    {{-- </div> --}}
</body>

</html>
