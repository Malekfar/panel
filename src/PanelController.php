<?php

namespace Malekfar\Panel;

use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function index()
    {
        return view('panel.index');
    }

    public function showLoginForm()
    {
        return view('panel.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|exists:users,email',
            'password'  => 'required'
        ]);
        $user = User::whereEmail($request->email)->first();
        if(!Hash::check($request->password, $user->password))
            return redirect()->back()->withErrors(['email' => "نام کاربری یا رمز عبور صحیح نمیباشد"]);
        Auth::loginUsingId($user->id);
        return redirect()->to(route('panel.dashboard.index'));
    }
}
