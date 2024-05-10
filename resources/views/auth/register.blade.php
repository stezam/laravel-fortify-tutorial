@extends('templates.main')

@section('content')

<h1>Register</h1>
<div class="">
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
            @error('name')
            <span class="invalid-feedback">
                {{$message}}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
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

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password Confirm</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
            <span class="invalid-class">
                {{$message}}
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection