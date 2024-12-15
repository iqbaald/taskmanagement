<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view("sesi/index");
    }

    function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);

        Session::flash('email',$request->email);
        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('todo')->with('success','Selamat datang '. $request->email .' di J-Tools');
        } else {
            return redirect('sesi')->withErrors('Email salah');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('success','Anda telah logout dari J-Tools');
    }

    function register()
    {
        return view('sesi/register');
    }

    function create(Request $request){
        // validate data
        Session::flash('email',$request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email yang anda masukkan sudah digunakan',
            'password.requred' => 'Passowrd wajib diisi',
            'password.min' => 'Jumlah karakter password minimal 8 karakter',
        ]);

        // input to database
        $data= [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($data);

        // auth process and login
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)) {
            return redirect('todo')->with('success','Hai '. $request->name .'👋,Selamat datang di J-Tools');
        } else {
            return redirect('sesi')->withErrors('Username dan Password yang anda masukkan salah');
        }
    }
}
