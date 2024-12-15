<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if (Auth::check()) {
            $user = Auth::user(); // Mendapatkan pengguna yang sedang login
            if ($user->role == 1) { // Memeriksa apakah role pengguna adalah 1
                $users = User::all();
                return view('home', compact('users'));
            } else {
                return redirect('/todo'); // Mengarahkan ke /todo jika role bukan 1
            }
        }
        return redirect()->route('login'); // Mengarahkan ke login jika tidak terautentikasi
    }
}
