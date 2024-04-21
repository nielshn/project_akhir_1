<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UpdatePasswordController extends Controller
{
    public function edit()
    {
        return view('auth.forgot-password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            $user = auth()->user();

            if ($user->isAdmin()) {
                $user->updatePassword($request->password);
                return back()->with('message', 'Your password has been updated successfully');
            } else {
                return back()->withErrors(['Unauthorized access']);
            }
        }

        throw ValidationException::withMessages([
            'current_password' => 'Your current password does not match with our record.'
        ]);
    }
}
