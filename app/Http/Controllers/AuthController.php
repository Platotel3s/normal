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
            'fotoProfil'=>'required|mimes:jpe,png,jpg|max:2048',
        ]);
        $fotoProfilPath=null;
        if($request->hasFile('fotoProfil')){
            $ext=$request->file('fotoProfil')->getOriginalExtension();
            $namaFileFotoProfil=now()->format('YmdHis').'.'.$ext;
            $fotoProfilPath=$request->file('fotoProfil')->storeAs('fotoProfil_users',$namaFileFotoProfil,'public');
        }
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'fotoProfil'=>$fotoProfilPath,
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
    public function halUpdateProfile(){
        return view('layouts.updateProfile');
    }
    public function updateProfile(Request $request){
        $user=auth()->user();
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'password'=>'nullable|string|min:8|confirmed',
            'fotoProfil'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
        ];
        if($request->filled('password')){
            $data['password']=bcrypt($request->password);
        }
        if($request->hasFile('fotoProfil')){
            $ext=$request->file('fotoProfil')->getOriginalExtension();
            $namaFileFotoProfilBaru=now()->format('YmdHis').'.'.$ext;
            $fotoProfilPath=$request->file('fotoProfil')->storeAs('fotoProfil_users',$namaFileFotoProfilBaru,'public');
            $data['fotoProfil']=$fotoProfilPath;
        }
        $user->update($data);
        return redirect()->back()->with('success','Berhasil memperbarui profil');
    }
}
