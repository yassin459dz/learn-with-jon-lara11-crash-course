<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    //Register User
    public function register(Request $request) {
        $fields = $request->validate([
            'username'=> ['required'], ['max:255'],
            'email'=> ['required', 'email', 'max:255', 'unique:users'],
            'password'=> ['required', 'min:3', 'confirmed'],
        ]);
        $user =User::create($fields);
        Auth::login($user);
        return redirect()->route('home');
    }
    //Register User
    public function login(Request $request) {
        $fields = $request->validate([
            'email'=> ['required', 'email', 'max:255',],
            'password'=> ['required'],
        ]);
        if(Auth::attempt($fields, $request->remember)){
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed'=> 'Log failed'
            ]);
        }
    }

    public function logout(Request $request){
        //logout the user
        Auth::logout();
        //Regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //redirect to home
        return redirect('/');
    }
}
