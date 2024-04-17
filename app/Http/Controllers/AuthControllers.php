<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Console\TableCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthControllers extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $validatedData = $request->validate([
            'namaUser' => 'required|string|max:255',
            'emailUser' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
 
        $user->name = $validatedData['namaUser'];
        $user->email = $validatedData['emailUser'];
        $user->password = Hash::make($validatedData['password']);
 
        $user->save();
 
        return back()->with('success', 'Register successfully');
    }
 
    public function login()
    {
        return view('login');
    }
 
    public function loginPost(Request $request)
    {
        $credetials = [
            'emailUser' => $request->email,
            'password' => $request->password,
        ];
 
        if (Auth::attempt($credetials)) {
            return redirect('/home')->with('success', 'Login Success');
        }
 
        return back()->with('error', 'Error Email or Password');
    }
 
    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('login');
    }
}