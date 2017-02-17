<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    public function index(Request $request)
    {
        $users = User::name($request->get('name'))
                        ->rol($request->get('rol'))
                        ->paginate();
        return view('admin.users.index', compact('users','request'));

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

    public function destroy($id, Request $request)
    {

        $user = User::findOrFail($id);

        $user->delete();

        $message = $user->fullName . ' ha sido eliminado de nuestros registros';

        if ($request->ajax()) {
            return response()->json([
                'id'        =>  $user->id,
                'message'   =>  $message
            ]);
        }

        Session::flash('message', $message);

        return redirect()->route('admin.users.index');

    }

}
