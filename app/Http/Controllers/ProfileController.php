<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        $user = User::all();

        return view('profiles.index', [
            'profiles' => $profiles,
            'user' => $user,
        ]);
        // return view('profiles.index', compact('profiles', 'user'));
    }

    public function create()
    {
        $users = User::get();
        return view('profiles.create', [
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'no_tlp' => 'required',
        ]);

        Profile::create([
            'user_id' => $request->user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
            'no_tlp' => $request->no_tlp,
        ]);
        return redirect()->route('profiles.index')->with('success', 'Simpan sukses!');
    }

    public function show($id)
    {
        //
    }

    public function edit(Profile $profile)
    {
        $users = User::get();

        return view('profiles.edit', [
            'users' => $users,
            'profile' => $profile,
        ]);
    }

    public function update(Request $request, Profile $profile)
    {
        $profile->update([
            'user_id' => $request->user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
            'no_tlp' => $request->no_tlp,
        ]);
        return redirect()->route('profiles.index')->with('success', 'Update Profile success');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return back()->with('danger', 'Data berhasil dihapus!');
    }
}
