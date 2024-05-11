<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>@yield('title', config('app.name', 'User Management System'))</title>

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
                        <a class="nav-link " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users.index')}}">Users</a>
                    </li>
                </ul>

                <div class="form-inlind my-2 my-lg-8">
                    @if (Route::has('login'))
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @auth
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link">Home</a>                               
                        </li>
                        <li class="nav-item">
                            <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form action="{{route('logout')}}" method="post" id="logout-form" style="display:none">
                            @csrf
                        </form>
                        </ul>

                        @else
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            @endif
                        </li>
                        </ul>   

                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="container">
        @include('partials.alerts')
        @yield('content')
    </main>
</body>

</html>