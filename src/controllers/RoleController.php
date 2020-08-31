<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
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
        return view('panel.roles.show', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $permissions = [];
        foreach ($request->input() as $permission => $key)
            if(Permission::find($permission))
                $permissions [] = $permission;
        $role->syncPermissions($permissions);
        return redirect()->back()->with(['success' => "عملیات با موفقیت انجام شد"]);
    }

    public function create()
    {
        return view('panel.roles.create');
    }

    public function store(Request $request)
    {
        $permissions = [];
        $role = Role::create([
            'name'        => $request->title,
            'guard_name'  => "web",
        ]);
        if($request->has('permissions') && is_array($request->input('permissions')))
            foreach ($request->input('permissions') as $permission => $key)
                if(Permission::find($permission))
                    $permissions [] = $permission;
        $role->syncPermissions($permissions);
        return redirect()->route('roles.index')->with(['success' => "عملیات با موفقیت انجام شد"]);
    }
}
