<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request){
        if(auth()->user()){
            return redirect('/');
        }else{
            return view('login');
        }
    }

    public function logout(Request $request){
        if(auth()->user()){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            return redirect('/login');
        }
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email|ends_with:@gmail.com',
            'password' => 'required|min:5|max:255'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/');
        }
    }
}
