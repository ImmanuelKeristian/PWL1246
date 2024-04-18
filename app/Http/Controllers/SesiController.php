<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index(){
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=> 'Email kosong',
            'password.required'=> 'Password kosong',
        ]);

    $infologin = [
        'email'=>$request->email,
        'password'=>$request->password,
    ];
    
    if(Auth::attempt($infologin)){
        if(Auth::user()->role == 'admin'){
            return redirect('admin');
        } else if (Auth::user()->role == 'student'){
            return redirect('admin/student');
        }else if (Auth::user()->role == 'program'){
            return redirect('admin/program');
        }
    }else{
        return redirect('')->withErrors('Email dan Password salah')->withInput();
    }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}

