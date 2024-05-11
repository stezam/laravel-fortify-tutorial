@extends('templates.main')
@section('title', 'Laravel Fortify Tutorial | Create' )
@section('content')

<div class="row">
    <div class="col-12 d-flex flex-row justify-content-between align-items-center">
        <h1 class="">Create User</h1>
        <a href="{{route('admin.users.index')}}" class="btn btn-sm btn-success float-end" role="button">Cancel</a>
    </div>
</div>

<div class="card">

    <form action="{{route('admin.users.store')}}" method="POST">
        @include('admin.users.partials._form',['create' => true])
    </form>
</div>

@endsection