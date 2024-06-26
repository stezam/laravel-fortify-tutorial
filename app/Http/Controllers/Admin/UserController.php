<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('Index method on User Controller');

        if (Gate::denies('logged-in')) {
            dd('no access allowed');
        }
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        // dd($request);
        // $validatedData = $request->validated();
        // $user = User::create($validatedData);

        $newUser = new CreateNewUser();
        // dd($request->only(['email']));
        $user = $newUser->create($request->only(['name', 'email', 'password', 'password_confirmation']));
        $user->roles()->sync($request->roles);
        // dd($request->only(['email']));

        Password::sendResetLink($request->only('email'));

        $request->session()->flash('success', 'User created successfully!');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('admin.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            $request->session()->flash('error', 'User cannot be updated!');
            return redirect()->route('admin.users.index');
        }

        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);
        $request->session()->flash('success', 'User updated successfully!');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        User::destroy($id);
        $request->session()->flash('success', 'User deleted successfully!');
        return redirect()->route('admin.users.index');
    }
}
