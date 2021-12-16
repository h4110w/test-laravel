<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        $users = User::get();
        return view('users.create', [
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('users.index')->with('success', 'Simpan sukses!');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $user = User::get();

        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => $request->password
        ]);
        return redirect()->route('users.index')->with('success', 'Update User success');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('danger', 'Data berhasil dihapus!');
    }
}
