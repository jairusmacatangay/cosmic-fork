<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Lexend" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="row vh-100 m-0 p-0">

        {{-- Login Column --}}
        <div class="col-4">
            <div class="d-flex flex-column justify-content-between h-100">
                {{-- Header --}}
                <div class="mt-5 pt-5 text-center">
                    <h1 class="display-6 fw-bold m-0">Log in</h1>
                    <span>or <a href="#">create account</a></span>
                </div>

                {{-- Body --}}
                <div class="mx-auto w-50">
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Username">
                    </div>
        
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
        
                    <div class="d-grid mt-5 mb-3">
                        <button class="btn btn-primary d-grid">LOG IN</button>
                    </div>

                    <div class="text-center">
                        <a href="#" class="mx-auto">Forgot password?</a>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="text-center mb-5 pb-5">
                    <span class="m-0">&copy; 2023 All Rights Reserved</span>
                    <br>
                    <span><a href="#">Privacy</a> and <a href="#">Terms</a></span> 
                </div>
                
            </div>   
        </div>

        {{-- Brand Column --}}
        <div class="col-8" style="background-color: #ff6321;">
            <div class="d-flex flex-column justify-content-center h-100 w-50 mx-auto text-white">
                <h1 class="display-1 fw-bold">Cosmic Fork</h1>
                <p class="mt-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Tristique magna sit amet purus gravida quis. Risus sed 
                    vulputate odio ut enim blandit volutpat maecenas.
                </p>
            </div>
        </div>
        
    </div>
</body>
</html>
