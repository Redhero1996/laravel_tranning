<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserEditFormRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	return view('backend.users.index', compact('users'));
    }

    public function edit($id)
    {
    	$user = User::whereId($id)->firstOrFail();
    	$roles = Role::all();
    	$selectedRoles = $user->roles()->pluck('name')->toArray();
    	return view('backend.users.edit', compact('user', 'roles', 'selectedRoles'));
    }

    public function update(UserEditFormRequest $request, $id)
    {
    	$user = User::whereId($id)->firstOrFail();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	if($request->password != '') {
    		$user->password = Hash::make($request->password);
    	}
    	$user->save();

    	$user->syncRoles($request->role);

    	return redirect()->route('admin.user.edit', $user->id)->with('status', 'The user have been updated');
    }
}
