<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>{{ config('app.name', 'User Management System')}}</title>

    <!-- JS -->
    <!-- <script src="{{asset('build/assets/app-e2f38b31.js')}}"></script> -->


    @vite(['resources/js/app.js', 'resources/css/app.scss','resources/css/custom-styles.css'])
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('build/assets/custom-styles.css')}}">

</head>

<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand" href="#">{{ config('app.name', 'User Management System')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                </ul>

                <div class="form-inlind my-2 my-lg-8">
                    @if (Route::has('login'))
                    <div class="">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}" class="">Log
                            in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="">Register</a>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="container">
        
        @yield('content')
    </main>
</body>

</html>