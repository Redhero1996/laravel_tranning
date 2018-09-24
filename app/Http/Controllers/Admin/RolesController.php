<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleFormRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
	public function index()
	{
		$roles = Role::all();
		return view('backend.roles.index', compact('roles'));	
	}

    public function create()
    {
    	return view('backend.roles.create');
    }

    public function store(RoleFormRequest $request)
    {
    	Role::create([
    		'name' => $request->name,
    	]);

    	return redirect()->route('admin.roles.index')->with('status', 'A new role has been created!');
    }
}
