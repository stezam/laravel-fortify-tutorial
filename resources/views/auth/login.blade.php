@extends('templates.main')

@section('content')

<h1>Sign In</h1>
<div class="">
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{old('email')}}">
            @error('email')
            <span class="invalid-feedback">
                {{$message}}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password">
            @error('password')
            <span class="invalid-feedback">
                {{$message}}
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <div>
            <a href="{{route('password.request')}}">Forgot-Password</a>
        </div>

    </form>
</div>

@endsection