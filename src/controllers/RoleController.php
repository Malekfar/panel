<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        return view('panel.roles.index');
    }

    public function show(Role $role)
    {
        $permissions = Permission::all();
        return view('panel.roles.show', compact('role', 'permissions'));
    }

    public function update(StoreRequest $request, Role $role)
    {
        $permissions = $request->input('permissions');
        $role->update([
            'name' => $request->title
        ]);
        $role->syncPermissions($permissions);
        return redirect()->back()->with(['success' => "عملیات با موفقیت انجام شد"]);
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('panel.roles.create', compact('permissions'));
    }

    public function store(StoreRequest $request)
    {
        $permissions = $request->input('permissions');
        $role = Role::create([
            'name'        => $request->title,
            'guard_name'  => "web",
        ]);
        $role->syncPermissions($permissions);
        return redirect()->route('roles.index')->with(['success' => "عملیات با موفقیت انجام شد"]);
    }
}
