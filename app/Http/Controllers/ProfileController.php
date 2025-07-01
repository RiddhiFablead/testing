<?php

namespace App\Http\Controllers;

use App\Models\register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

   //show user
    public function showUsers()
    {
        $users = register::all();
        return view('users', compact('users'));
    }
    //edit user
     public function editUser($id) {
        $user = register::findOrFail($id);
        return view('edit-user', compact('user'));
    }
     public function updateUser(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = register::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('users.index')->with('status', 'User updated successfully.');
    }

    //Delete user
    public function destroy($id)
{
    $user = register::findOrFail($id);
    $user->delete();
    return redirect()->route('users.index')->with('status', 'User deleted successfully');
}
    //add user
    public function createUser()
    {
        return view('create-user'); 
    }
    public function storeUser(Request $request)
    {
        $request->validate([
          'name' => 'required|string|max:255',
        'email' => 'required|email|unique:register,email',
        'password' => 'required|string|min:6|confirmed',
        ]);
        $user=new register();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
         return redirect()->route('users.index')->with('status', 'User added successfully.');
    }
    
}
