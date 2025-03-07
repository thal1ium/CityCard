<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    public function loginPage() {
        return view('auth.login', ['role' => 'admin']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('login', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/dashboard');
        }

        return back()->withErrors(['login' => 'Не правильний номер або пароль']);
    }

    public function logout()
    {
        Auth::logout();

        session()->invalidate(); 
        
        session()->regenerateToken(); 

        return redirect()->route('admin.show.login');
    }
}
