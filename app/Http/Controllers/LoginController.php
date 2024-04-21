<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function index(){
        return view('auth.login');
    }

    public function loginproses(Request $request){

        $validator = Validator::make($request->all(), [
            'email'=>'required',
            'password'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    $infologin = [
        'email'     => $request->email,
        'password'  => $request->password,
    ];
    
    if(Auth::attempt($infologin)){
        if(Auth::user()->role == 'Admin'){
            return redirect()->route('admin-index');
        } else if (Auth::user()->role == 'Student'){
            return redirect()->route('for-index');
        }else if (Auth::user()->role == 'Prodi'){
            return redirect()->route('pol-index');
        }
    }else{
        return redirect('/starter')->with('failed','Email dan Password salah');
    }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerproses(Request $request){

        $validator = Validator::make($request->all(), [
            'id'=>'required|unique:users,id',
            'nama' => 'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $akuns = [
            'id'         => $request->id,
            'nama'       => $request->nama,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => 'Student'
        ];

        User::create($akuns);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    
    }
}

