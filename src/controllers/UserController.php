<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function managers()
    {
        return view('panel.users.managers.all');
    }

    public function permissions(User $user)
    {
        return view('panel.users.managers.show', compact('user'));
    }

    public function setRoles(Request $request, User $user)
    {
        if($request->role)
            if(Role::find($request->role))
                $user->syncRoles($request->role);
        return redirect()->back()->with(['success' => "ذخیره سازی نقش با موفقیت انجام شد"]);;
    }

    public function setPermissions(Request $request, User $user)
    {
        $permissions = [];
        foreach ($request->input() as $permission => $key)
            if(Permission::find($permission))
                $permissions [] = $permission;
        $user->syncPermissions($permissions);
        return redirect()->back()->with(['success' => "ذخیره سازی نقش با موفقیت انجام شد"]);
    }

    public function create()
    {
        return view('panel.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email'  => 'required|email',
            'password'  => 'required|min:8',
        ], [
            'name.required'     => "نام الزامی میباشد",
            'email.required'    => "ایمیل الزامی میباشد",
            'password.required' => "رمزعبور الزامی میباشد",
            'password.min'      => "رمز عبور باید حداقل شامل ۸ کارکتر باشد",
            'email.email'       => "ایمیل باید به صورت صحیح وارد شود",
        ]);
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'level'     => 1,
        ]);
        return redirect()->to(route('panel.managers'))->with(['success' => "ذخیره سازی مدیر با موفقیت انجام شد"]);
    }
}
