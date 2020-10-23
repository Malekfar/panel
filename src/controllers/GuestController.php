<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function index()
    {
        return view('panel.users.index');
    }


    public function create()
    {
        return view('panel.users.create');
    }

    public function store(StoreRequest $request)
    {
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'level'     => 4,
        ]);
        return redirect()->to(route('panel.guest.index'))->with(['success' => "افزودن کاربر با موفقیت انجام شد"]);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
