@extends('templates.main')

@section('content')

<h1>Verify e-mail address</h1>
<div class="">  
    <p class="text-info">You must verify your email address to access this page!</p>
</div>
<form action="{{route('verification.send')}}" method="post">
    @csrf
    <button type="submit" class="btn btn-sm btn-primary">Resend verification email ...</button>
</form>

@endsection