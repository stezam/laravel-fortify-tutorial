@extends('templates.main')
@section('title', 'Laravel Fortify Tutorial | Index' )

@section('content')


<div class="row">
    <div class="col-12 d-flex flex-row justify-content-between align-items-center">
        <h1 class="">Users</h1>
        <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-success float-end" role="button">Add User</a>
    </div>
</div>

<div class="card">


        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-sm btn-primary"
                            role="button">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger"
                            onclick="event.preventDefault();
                                                                            document.getElementById('delete-user-form-{{$user->id}}').submit()">
                            Delete
                        </button>
                        <form id="delete-user-form-{{$user->id}}" action="{{route('admin.users.destroy', $user->id)}}"
                            method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
  

</div>


@endsection