<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{

    public function index()
    {
        $profil = User::all();
        return view('admin.profil.index', compact('profil'));
    }


    public function edit($id)
    {
        $profil = User::all();
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $admin = User::find($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            // 'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $admin->name = $validatedData['name'];
        $admin->email = $validatedData['email'];
        $admin->no_telepon = $validatedData['no_telepon'];
        $admin->alamat = $validatedData['alamat'];
        $admin->facebook = $validatedData['facebook'];
        $admin->twitter = $validatedData['twitter'];
        $admin->instagram = $validatedData['instagram'];

        // if ($request->hasFile('foto_profil')) {
        //     $profil = $request->file('foto_profil');
        //     $fotoname = $profil->getClientOriginalName();
        //     $profil->move(public_path('uploads/profil'), $fotoname);
        //     Storage::delete($admin->foto_profil);
        //     $admin->foto_profil = $fotoname;
        // }
        $admin->save();
        return redirect()->route('profil.index')->with('success', 'Profile berhasil diperbarui');
    }

}
