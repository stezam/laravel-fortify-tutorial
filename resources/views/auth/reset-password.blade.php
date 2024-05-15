@extends('templates.main')

@section('content')

<h1>Password Reset</h1>
<div class="">
    <form action="{{url('reset-password')}}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{$request->token}}">

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$request->email}}">
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