<?php

namespace App\Http\Controllers;

use App\Models\register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $name = Session::get('user');
        $email = Session::get('email');

        return view('profile', compact('name', 'email'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = register::where('email', Session::get('email'))->first();

        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();

         
            Session::put('user', $user->name);
            Session::put('email', $user->email);

            return redirect()->route('profile.show')->with('status', 'Profile updated successfully');
        } else {
            return redirect()->route('profile.show')->with('status', 'User not found');
        }
    }
}
