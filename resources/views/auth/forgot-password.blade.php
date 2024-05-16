@extends('templates.main')

@section('content')

<h1>Sign In</h1>
<div class="">
    <form action="{{route('password.email')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Reset Password</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{old('email')}}">
            @error('email')
            <span class="invalid-feedback">
                {{$message}}
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Reset Password</button>


    </form>
</div>

@endsection