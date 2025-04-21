<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
        return view('templates.login');
    }

    public function login(Request $request){
        $validation = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        };

        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);
        if (!$token) {
            return redirect()->back()->withErrors('Gagal! Email dan Password tidak sesuai');
        }

        session(['jwt'=>$token]);
        return redirect()->route('dashboard.index')->with('success', 'Login Berhasil');
    }

    public function logout(Request $request){
        if(!session('jwt'))return redirect()->route('auth.index')->with('success', 'Berhasil logout');

        $request->session()->flush();
        return redirect()->route('auth.index')->with('success', 'Berhasil logout');
    }
}
