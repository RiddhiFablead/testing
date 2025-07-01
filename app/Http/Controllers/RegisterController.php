<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register; 
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showregister()
    {
        return view('register');
    }
    public function register(Request $request)
    {
     
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:register',
            'password' => 'required|string|min:6',
        ]);

       
        register::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

      
        return redirect('/register')->with('message', 'Registration successful!');
    }

}
