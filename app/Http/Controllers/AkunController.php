<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function index(){
        $akuns = User::get();

        return view('akun.index', compact('akuns'));
    }

    public function profile(){
        $akuns = User::get();

        return view('user.index', compact('akuns'));
    }

    public function create(){
        return view('akun.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|int|unique:users',
            'nama' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'role' => 'required|string',
        ])->validate();

        $akuns['id']        = $request->id;
        $akuns['nama']      = $request->nama;
        $akuns['email']     = $request->email;
        $akuns['password']  = $request->password;
        $akuns['role']      = $request->role;

        User::create($akuns);

        return redirect()->route('admin-index');
    }

    public function edit($id){
        $akuns = User::find($id);

        if(!$akuns) {
            return redirect()->back()->with('error', 'User tidak ada');
        }

        $akuns = User::where('id', $id)->get();
        return view('akun.edit', compact('akuns'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'role' => 'required|string'
        ])->validate();
    
        $akuns = User::find($id);
    
        $akuns->role = $request->role;
    
        $akuns->save();
    
        return redirect()->route('admin-index');
    }

    public function delete(Request $request, $id){

    $authenticatedUserId = auth()->id();

    $akun = User::find($id);

    if ($akun && $akun->id === $authenticatedUserId) {
        return redirect()->back()->with('error', 'You cannot delete your own account.');
    }

    if ($akun) {
        $akun->delete();
    }

    return redirect()->route('admin-index');

    }

    public function profedit($id){
        $akuns = User::find($id);

        if(!$akuns) {
            return redirect()->back()->with('error', 'User tidak ada');
        }

        $akuns = User::where('id', $id)->get();
        return view('user.edit', compact('akuns'));
    }

    public function profupdate(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'id' => 'required|int|unique:users',
            'nama' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'nullable',
        ])->validate();
    
        $akuns = User::find($id);
    
        $akuns->id         = $request->id;
        $akuns->nama       = $request->nama;
        $akuns->email      = $request->email;
        if($request->password){
            $data['password'] = Hash::make($request->password);
        }
    
        $akuns->save();
    
        return redirect()->route('profile');
    }

    public function profdelete(Request $request, $id){


    $akun = User::find($id);

    if ($akun) {
        $akun->delete();
    }

    return redirect()->route('profile');

    }
}
