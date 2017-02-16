<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;

class UsersController extends Controller
{

    public function index()
    {

        $users = User::paginate();
        return view('admin.users.index', compact('users'));

    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $user = new User($request->all());
        $user->save();
        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();
        return redirect()->route('admin.users.index');
    }

}
