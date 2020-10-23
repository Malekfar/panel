<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SetPermissionRequest;
use App\Http\Requests\User\SetRoleRequest;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        return view('panel.users.index');
    }

    public function managers()
    {
        return view('panel.users.managers.all');
    }

    public function permissions(User $user)
    {
        $permissions = Permission::all();
        return view('panel.users.managers.show', compact('user', 'permissions'));
    }

    public function setRoles(SetRoleRequest $request, User $user)
    {
        if ($request->role)
            $user->syncRoles($request->role);
        return redirect()->back()->with(['success' => "ذخیره سازی نقش با موفقیت انجام شد"]);
    }

    public function setPermissions(SetPermissionRequest $request, User $user)
    {
        $permissions = $request->input('permissions');
        $user->syncPermissions($permissions);
        return redirect()->back()->with(['success' => "ذخیره سازی نقش با موفقیت انجام شد"]);
    }

    public function create()
    {
        return view('panel.users.managers.create');
    }

    public function store(StoreRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 1,
        ]);
        return redirect()->to(route('panel.managers'))->with(['success' => "ذخیره سازی مدیر با موفقیت انجام شد"]);
    }
}
