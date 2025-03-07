<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function showLoginPage()
    {
        return view('auth.login', ['role' => 'user']);
    }

    public function showRegisterPage()
    {
        return view('auth.registration');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('phone', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/');
        }

        return back()->withErrors(['login' => 'Не правильний номер або пароль']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'phone' => 'required|unique:users|regex:/^\+?[0-9]{10,15}$/',
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            $user = User::create([
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Помилка при створенні користувача: ' . $e->getMessage());
        }

        Auth::login($user);

        return redirect()->route('user.show.home');
    }

    public function logout()
    {
        Auth::logout();

        session()->invalidate(); 
        session()->regenerateToken(); 
        
        return redirect()->route('user.show.login');
    }
}
