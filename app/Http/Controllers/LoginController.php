<?php

namespace App\Http\Controllers;

use App\Models\Santri;
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

    public function register(Request $request){
        if ($request->isMethod('get')) {
            return view('form.register');
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $data = array_replace($data, array('password' => bcrypt($data['password'])));
            Santri::create($data);
            return redirect('/login')->with('status', 'Registrasi berhasil, silahkan login');;
        }
    }
}