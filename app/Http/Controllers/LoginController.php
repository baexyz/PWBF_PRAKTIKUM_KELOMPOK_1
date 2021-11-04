<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        
        //mengecek jika user masih login
        if(auth()->check()) {
            return redirect('/dashboard/profile');
        }
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
            return redirect()->intended('/dashboard/profile');
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