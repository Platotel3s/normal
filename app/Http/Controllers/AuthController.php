<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function halamanRegis(){
        return view('auth.register');
    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|min:8|confirmed',
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect()->route('daftar.buku');
    }
    public function halamanLogin(){
        return view('auth.login');
    }
    public function login(Request $request){
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('daftar.buku');
        }
        return back()->with('error','Email atau password salah');
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('welcome');
    }
}
