<?php

namespace App\Http\Controllers;

use App\Models\register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginform()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
         $user = register::where('email', $request->email)->first();
          if ($user && Hash::check($request->password, $user->password)) {
           Session::put('user',$user->name);
           return redirect('/');
        }else{

        }
           return back()->with('error', 'Invalid email or password.');
    }
}
