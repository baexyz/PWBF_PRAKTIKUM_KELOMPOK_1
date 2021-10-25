<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('form.login');
    }

    public function login(Request $request){
        //dd($request->all());
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed');
    }

    public function logout(Request $request){
        Auth::logout();    
        $request->session()->invalidate();    
        $request->session()->regenerateToken();    
        return redirect('/');
    }
}
